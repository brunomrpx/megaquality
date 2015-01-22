<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('HttpSocket', 'Network/Http');

class HttpAuthenticate extends BaseAuthenticate {
	public function authenticate(CakeRequest $request, CakeResponse $response) {
		$httpSocket = new HttpSocket();
		$httpSocketResponse = $httpSocket->post(
				'url',
				array(
					'email' => 'email',
					'password' => 'password'
				)
		);			

		if ($httpSocketResponse->isOk()) {
			return array('User' => array('name' => 'Administrator'));
		}							
		
		return false;
	}		
}