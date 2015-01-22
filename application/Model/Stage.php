<?php
App::uses('AppModel', 'Model');
/**
 * Stage Model
 *
 * @property Auditing $Auditing
 * @property Checklist $Checklist
 */
class Stage extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'AuditingTemplate' => array(
			'className' => 'AuditingTemplate',
			'joinTable' => 'auditings_template_stages',
			'foreignKey' => 'stage_id',
			'associationForeignKey' => 'auditing_template_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Checklist' => array(
			'className' => 'Checklist',
			'joinTable' => 'stages_checklists',
			'foreignKey' => 'stage_id',
			'associationForeignKey' => 'checklist_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
