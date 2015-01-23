<?php

App::uses('AppModel', 'Model');
App::uses('HttpSocket', 'Network/Http');

class Project extends AppModel {
	
    public $useTable = false;    
    
    public function getAll($cookies = null) {
    	$httpSocket = new HttpSocket();    	
    	$httpSocketResponse = $httpSocket->get(
    			'url',
    			array(),
    			array('cookies' => $cookies)
    	);
    	
    	return json_decode($httpSocketResponse->body())->projects;    	
    }
    
    public function getById($id = null) {
        if (!is_null($id)) {
            foreach ($this->projects as $project) {
                if ($project['id'] == $id) {
                    return $project;
                }
            }
        }
    }
}
