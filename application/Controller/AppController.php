<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        // Configurações de autenticação
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'projects',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
            	'Http'
            )
        )
    );

    /**
     * Controle dos templates
     */
    public function beforeFilter() {
        $this->layout = 'default';
        $isLogged = $this->Auth->user();
        if ($isLogged) {
        	$this->layout = 'logged';
        } 
    }
}
