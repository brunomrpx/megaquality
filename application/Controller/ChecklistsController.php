<?php
App::uses('AppController', 'Controller');
/**
 * Checklists Controller
 *
 * @property Checklist $Checklist
 * @property PaginatorComponent $Paginator
 */
class ChecklistsController extends AppController {

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
        $this->Checklist->recursive = 0;
        $this->Paginator->settings['limit'] = 5;
        $this->set('checklists', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Checklist->exists($id)) {
            throw new NotFoundException(__('Invalid checklist'));
        }
        $options = array('conditions' => array('Checklist.' . $this->Checklist->primaryKey => $id));
        $this->set('checklist', $this->Checklist->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Checklist->create();
            if ($this->Checklist->save($this->request->data)) {
                $this->Session->setFlash('Checklist salvo com sucesso.', 'Messages/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao salvar Checklist. Tente novamente.', 'Messages/error');
            }
        }
        $items = $this->Checklist->Item->find('list', array(
            'fields' => array('Item.id', 'Item.description')
        ));
        $this->set('items', $items);
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Checklist->exists($id)) {
            throw new NotFoundException(__('Invalid checklist'));
        }

        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $name = $data['editedContent'];
            $checklist = array(
                'Checklist' => array(
                    'id' => $id,
                    'name' => $name
                )
            );

            echo $this->Checklist->save($checklist) ? true : false;
            die();
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Checklist->save($this->request->data)) {
                $this->Session->setFlash('Checklist salvo com sucesso.', 'Messages/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao salvar Checklist. Tente novamente.', 'Messages/error');
            }
        } else {
            $options = array('conditions' => array('Checklist.' . $this->Checklist->primaryKey => $id));
            $checklist = $this->Checklist->find('first', $options);
            $this->request->data = $checklist;

            $items = $this->Checklist->Item->find('list', array(
                'fields' => array('Item.id', 'Item.description')
            ));

            $selectedItems = $this->Checklist->Item->find(
                'list',
                array(
                    'conditions' => array('checklists.id' => $checklist['Checklist']['id']),
                    'fields' => array('Item.id'),
                    'joins' => array(
                        array(
                            'table' => 'checklists_items',
                            'alias' => 'ChecklistItem',
                            'type' => 'INNER',
                            'conditions' => array(
                                'Item.id = ChecklistItem.item_id'
                            )
                        ),
                        array(
                            'table' => 'checklists',
                            'type' => 'INNER',
                            'conditions' => array(
                                'checklists.id = ChecklistItem.checklist_id'
                            )
                        )
                    )
                )
            );

            $this->set('items', $items);
            $this->set('selectedItems', array_keys($selectedItems));
            $this->set('checklist', $checklist);
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
        $this->Checklist->id = $id;
        if (!$this->Checklist->exists()) {
            throw new NotFoundException(__('Invalid checklist'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Checklist->delete()) {
            $this->Session->setFlash('Checklist deletado com sucesso.', 'Messages/success');
        } else {
            $this->Session->setFlash('Erro ao deletar Checklist. Tente novamente.', 'Messages/error');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
