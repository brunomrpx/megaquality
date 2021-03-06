<?php
App::uses('AppController', 'Controller');
/**
 * Stages Controller
 *
 * @property Stage $Stage
 * @property PaginatorComponent $Paginator
 */
class StagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Stage->recursive = 0;
		$this->set('stages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stage->exists($id)) {
			throw new NotFoundException(__('Invalid stage'));
		}
		$options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
		$this->set('stage', $this->Stage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stage->create();
			if ($this->Stage->save($this->request->data)) {
				$this->Session->setFlash(__('The stage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
			}
		}
		$auditings = $this->Stage->Auditing->find('list');
		$checklists = $this->Stage->Checklist->find('list');
		$this->set(compact('auditings', 'checklists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Stage->exists($id)) {
			throw new NotFoundException(__('Invalid stage'));
		}

        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $name = $data['editedContent'];
            $stage = array(
                'Stage' => array(
                    'id' => $id,
                    'name' => $name
                )
            );

            echo $this->Stage->save($stage) ? true : false;
            die();
        }

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stage->save($this->request->data)) {
				$this->Session->setFlash(__('The stage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stage.' . $this->Stage->primaryKey => $id));
			$this->request->data = $this->Stage->find('first', $options);
		}
		$auditings = $this->Stage->Auditing->find('list');
		$checklists = $this->Stage->Checklist->find('list');
		$this->set(compact('auditings', 'checklists'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Stage->id = $id;
		if (!$this->Stage->exists()) {
			throw new NotFoundException(__('Invalid stage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Stage->delete()) {
			$this->Session->setFlash(__('The stage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
