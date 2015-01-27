<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Checklist $Checklist
 */
class AuditingTemplate extends AppModel {


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    public $useTable = 'auditings_template';
    public $actAs = array('Containable');
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
    public $hasAndBelongsToMany = array(
        'Stage' => array(
            'className' => 'Stage',
            'joinTable' => 'auditings_template_stages',
            'foreignKey' => 'auditing_template_id',
            'associationForeignKey' => 'stage_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );
    
    public function beforeFind($query) {
        $query['recursive'] = 5;
        return $query;
    }
}
