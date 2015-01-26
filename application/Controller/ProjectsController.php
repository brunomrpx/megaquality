<?php

App::uses('AppController', 'Controller');

class ProjectsController extends AppController {
	
	public $uses = array(		
		'AuditingTemplate',
		'Auditing',
		'Item'
	);
	
	public $components = array(
		'API',
		'Project'
	);
	
	private function insertURL(&$project) {
		$url = $project['managed'] ? 'manage' : 'new_auditing';
		$project['url'] = array('action' => $url, $project['id']);			
	}
	
    public function index() {    	    	    	    	 
        $projects = $this->Project->getAll();        
        array_walk($projects, array($this, 'insertURL'));                
        
        $this->set('projects', $projects);
    }
    
    public function new_auditing($id = null) {
    	if ($this->request->is('post')) {
    		$templateAuditingId = $this->data['AuditingTemplate']['Id'];
    		$items = $this->Item->getByTemplateAuditingId($templateAuditingId);
    	
    		$itemsToInsert = array();
    		foreach ($items as $item) {
    			$itemsToInsert[] = array(
    					'item_id' => $item,
    					'status' => '0'
    			);
    		}
    	
    		$data = array(
    				'Auditing' => array(
    						'project_id' => $id,
    						'auditing_template_id' => $templateAuditingId
    				),
    				'AuditingsItems' => $itemsToInsert
    		);
    	
    		$this->Auditing->bindModel(array('hasMany' => array('AuditingsItems')));
    		if ($this->Auditing->saveAll($data)) {
    			$this->Session->setFlash('Template para auditoria configura com sucesso.', 'Messages/success');
    		}
    	}
    	
    	$project = $this->Project->getById($id);
    	$templates = $this->AuditingTemplate->find('list');
    	 
    	$this->set('project', $project);
    	$this->set('templates', $templates);    	 
    }

    public function manage($id = null) {
    	$projects = $this->Auditing->find(
    		'list',
    		array(
	    		'fields' => array(
	    			'Auditing.project_id'		
	    		)
    		)
    	);
    	
    	if (!in_array($id, $projects)) {
    	} else {
    	
    	}
    }
}
