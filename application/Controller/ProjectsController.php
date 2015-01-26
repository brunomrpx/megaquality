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
	
	public $API = null;
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Project->cookies = $this->Auth->user('cookie');
    	$this->Project->API = $this->API;
	}
	
    public function index() {    	    	    	    	 
        $projects = $this->Project->getAll();
        
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
