<?php

App::uses('AppController', 'Controller');

class TemplatesController extends AppController {

    public $uses = array(
            'TemplateBuilder',
            'AuditingTemplate'
        );

    public function index() {
       $templates = $this->AuditingTemplate->find('all');
       $this->set('templates', $templates);
    }
    
    public function insert() {
        if ($this->request->is('post')) {
            $templateName = $this->request->data['Template']['Name'];
            if ($this->TemplateBuilder->insertTemplate($templateName)) {
                $this->Session->setFlash('Template inserido com sucesso.', 'Messages/success');
            } else {
                $this->Session->setFlash('Erro ao inserir template. Tente novamente.', 'Messages/error');
            } 
            
            return $this->redirect(array('action' => 'index'));
        }
        $templates = $this->TemplateBuilder->getTemplateList();
        $this->set('templates', $templates);
    }
}
