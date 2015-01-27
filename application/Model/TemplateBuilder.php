<?php

App::uses('AppModel', 'Model');

class TemplateBuilder extends AppModel {

        public $useTable = false;
        private $auditingTemplate = null;
        private $checklist = null;
        private $stage = null;
        private $item = null;

        public function __construct() {
            $this->auditingTemplate = ClassRegistry::init('AuditingTemplate');
            $this->checklist = ClassRegistry::init('Checklist');
            $this->stage = ClassRegistry::init('Stage');
            $this->item = ClassRegistry::init('Item');
            $this->dataSource = $this->item->getdatasource();
        }

        private function load($path) {
            $fileObject = new SplFileObject($path);
            $yamlString = "";
            while(!$fileObject->eof()) {
                $yamlString .= $fileObject->fgets();
            }

            return yaml_parse($yamlString);
        }

        public function getTemplateList() {
            $templateList = array();
            $path = sprintf('%sAuditing_Templates/', APP);
            $directoryIterator = new DirectoryIterator($path);
            while ($directoryIterator->valid()) {
                if ($directoryIterator->getExtension() === "yaml") {
                    $basename = $directoryIterator->getBasename('.yaml');
                    $templateList[$basename] = $basename;
                }
                $directoryIterator->next();
            }
            
            return $templateList;
        }

        public function insertTemplate($name) {
            $templatePath = sprintf('%sAuditing_Templates/%s.yaml', APP, $name);
            $templateArray = $this->load($templatePath);
            
            if (!is_array($templateArray)) {
            	throw new Exception('Conteudo invalido.');
            }            
                        
            $insertedTemplate = $this->auditingTemplate->find(
            	'first', 
            	array(
            		'conditions' => array(
            			'AuditingTemplate.name' => $templateArray['name']
            		)
            	)
            );
			
            if ($insertedTemplate) {
            	throw new Exception('O template já existe.');	
            }                        
            
            $inserted = false;
            $this->dataSource->begin();
            
            try {
                $this->auditingTemplate->set('name', $templateArray['name']);
                $this->auditingTemplate->save();
            
                foreach ($templateArray['stages'] as $stageValue) {
                    $this->stage->saveAll(
                        array(
                            'Stage' => array('name' => $stageValue['name']),
                            'AuditingTemplate' => array('id' => $this->auditingTemplate->getInsertID())
                        )
                    );
                    foreach ($stageValue['checklist'] as $checklistValue) {
                        $this->checklist->saveAll(array(
                            'Checklist' => array(
                                    'name' => $checklistValue['name']
                                ),
                            'Stage' => array(
                                    'id' => $this->stage->getInsertID()
                                ),
                        ));
                        foreach ($checklistValue['items'] as $itemValue) {
                            $this->item->saveAll(array(
                                'Checklist' => array('id' => $this->checklist->getInsertID()),
                                'Item' => array('description' => $itemValue)
                            ));
                            $this->item->create();
                        }
                
                    }
                }
                $this->dataSource->commit();
                $inserted = true;
            } catch (Exception $exception) {
                $this->dataSource->rollback();
            } finally {
                return $inserted;
            }
        }
}
