<?php

App::uses('AppController', 'Controller');

class TemplatesController extends AppController {

    public $uses = array(
            'TemplateBuilder',
            'AuditingTemplate'
        );

    public function index() {
       $templates = $this->AuditingTemplate->find('all', array('recursive' => 4));       
       $this->set('templates', $templates);
    }
    
    public function edit($id = null) {
    	if (!isset($id)) {
    		return $this->redirect(array('action' => 'index'));
    	}
    	
    	$auditingTemplate = $this->AuditingTemplate->find('first', array('conditions' => array('AuditingTemplate.id' => $id)));
    	    	
    	$this->set('auditingTemplate', $auditingTemplate);
    }
    
    public function insert() {
        if ($this->request->is('post')) {
            $templateName = $this->request->data['Template']['Name'];
            try {
            	$this->TemplateBuilder->insertTemplate($templateName);
                $this->Session->setFlash('Template inserido com sucesso.', 'Messages/success');
            } catch(Exception $exception) {
                $this->Session->setFlash(sprintf('Erro ao inserir template. %s', $exception->getMessage()), 'Messages/error');
                return $this->redirect(array('action' => 'insert'));                
            } 
            
            return $this->redirect(array('action' => 'index'));
        }
        $templates = $this->TemplateBuilder->getTemplateList();
        $this->set('templates', $templates);
    }
}
