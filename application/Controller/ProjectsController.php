<?php

App::uses('AppController', 'Controller');

class ProjectsController extends AppController {
    public function index() {
        $projects = $this->Project->getAll();
        $this->set('projects', $projects);
    }

    public function manage($id = null) {
        $project = $this->Project->getById($id);
        $this->set('project', $project);
    }
}


