<?php

App::uses('Component', 'Controller');
App::uses('HttpSocket', 'Network/Http');

class ProjectComponent extends Component {	
           
    private $httpSocket = null;       	 
    private $auditing = null;
	public $cookies = null;	
	public $API = null;
    
    public function __construct(ComponentCollection $collection, $settings = array()) {
    	$this->httpSocket = new HttpSocket();
    	$this->auditing = ClassRegistry::init('Auditing');    	
    }
    
    private function format($responseData = null) {
    	if (isset($responseData)) {
    		$responseData = json_decode($responseData, true);    		
    		if (array_key_exists('projects', $responseData)) {    			    			
    			$projects = $responseData['projects'];    		
    			foreach ($projects as &$project) {    				    			
    				$project = $this->formatFields($project);
    			}
    			    			
    			return $projects;
    		} else {
    			$project = $responseData['project'];
    			$project = $this->formatFields($project);
    			
    			return $project;
    		}
    	}
    }

    private function formatFields($project = null) {
    	if (!is_null($project)) {    		
	    	$project['title'] = utf8_decode($project['title']);
	    	$project['managed'] = $this->exists($project['id']);        	
    	}    	
    	
    	return $project;
    }
    
    public function exists($id = null) {
    	$project = $this->auditing->find(
    			'first',
    			array(
    					'fields' => "Auditing.project_id",
    					'conditions' => array('project_id' => $id)
    			 ));
    	
    	return !empty($project);
    }
    
    public function getAll() {    	
    	$httpSocketResponse = $this->httpSocket->get(
    			$this->API->getURL('GET_ACTIVE_PROJECTS'),
    			array(),
    			array('cookies' => $this->cookies)
    	);        
    	
    	return $this->format($httpSocketResponse->body());    	
    }
    
    public function getById($id = null) {    
		$httpSocketResponse = $this->httpSocket->get(
				$this->API->getURL('GET_PROJECT_BY_ID', array('id' => $id)),
				array(),
				array('cookies' => $this->cookies)
		);
		
		return $this->format($httpSocketResponse->body());
    }
}
