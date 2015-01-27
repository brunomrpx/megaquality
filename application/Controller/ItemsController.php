<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session');
    public $uses = array('Item', 'AuditingItem');

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Item->recursive = 0;
        $this->Paginator->settings['limit'] = 5;
        $this->set('items', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Item->exists($id)) {
            throw new NotFoundException(__('Invalid item'));
        }
        $options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
        $this->set('item', $this->Item->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash('Item inserido com sucesso.', 'Messages/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao salvar item. Tente novamente.', 'Messages/error');
            }
        }
    }
    
    public function update_status($id = null) {    	    	    	    	
    	if ($this->request->is('ajax')) {
    		$status = $this->request->data['status'];
    		
    		$status = $status == "true" ? "1" : "0"; 
    		
    		$auditingItemData = $this->AuditingItem->find('first', array('conditions' => array('item_id' => $id)));
    		$auditingItemData['AuditingItem']['status'] = $status;
    		 
    		 if ($this->AuditingItem->saveAll($auditingItemData)) {
    		 	echo "true";
    		 } else {
    		 	echo "false";
    		 }
    		
    		exit();
    	}
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {    	    	    	    	
        if (!$this->Item->exists($id)) {
            throw new NotFoundException(__('Invalid item'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Item->save($this->request->data)) {
                $this->Session->setFlash('Item alterado com sucesso.', 'Messages/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao editar item. Tente novamente.', 'Messages/error');
            }
        } else {
            $options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
            $this->request->data = $this->Item->find('first', $options);
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Item->id = $id;
        if (!$this->Item->exists()) {
            throw new NotFoundException(__('Invalid item'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Item->delete()) {
            $this->Session->setFlash('Item deletado com sucesso.', 'Messages/success');
        } else {
            $this->Session->setFlash('Erro ao deletar item. Tente novamente.', 'Messages/error');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
