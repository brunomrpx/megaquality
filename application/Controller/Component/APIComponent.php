<?php

App::uses('Component', 'Controller');

class APIComponent extends Component {		
	private $baseURL = 'http://api/';
	private $services = array(					
		'GET_ACTIVE_PROJECTS' => 'projects',			
		'GET_PROJECT_BY_ID' => 'projects/#id#',
		'LOGIN' => 'login',
	);			
	
	public function getURL($service = null, Array $parameteres = null) {
		$servicePath = $this->services[$service];
		
		if (!is_null($parameteres)) {
			foreach ($parameteres as $name => $value) {
				$servicePath = str_replace(sprintf("#%s#", $name), $value, $servicePath);
			}									
		}
		
		$fullURL = $this->getFullURL($servicePath);

		return $fullURL;
	}
	
	public function getFullURL($path = null) {		
		if (!is_null($path)) {
			return $this->baseURL . $path;
		}
		
		return $this->baseURL;		
	} 	
}