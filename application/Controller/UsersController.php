<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $components = array (
			'API' 
	);
	
    public function beforeRender() {
        if ($this->User->isLogged()) {
            return $this->redirect(
                array(
                    'controller' => 'projects',
                    'action' => 'index'
                )
            );
        }
    }

    public function login() {    	    	
        if ($this->request->is('post')) {        	        	        	        	
            if ($this->Auth->login()) {
               return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Session->setFlash('Usuário ou senha inválidos.', 'Messages/error');
        }
        
        $this->set('apiURL', $this->API->getURL('LOGIN'));
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
