<?php

App::uses('AppModel', 'Model');

class Project extends AppModel {
    public $useTable = false;
    public $projects = array(
        0 => array(
            'id' => 1,
            'name' => 'Projeto 1',
            'team' => 'Equipe 1',
            'status' => 'Em andamento'
        ),
        1 => array(
            'id' => 2,
            'name' => 'Projeto 2',
            'team' => 'Equipe 2',
            'status' => 'Em andamento'
        ),
    );
    public function getAll() {
        return $this->projects; 
    }
    public function getById($id = null) {
        if (!is_null($id)) {
            foreach ($this->projects as $project) {
                if ($project['id'] == $id) {
                    return $project;
                }
            }
        }
    }
}
