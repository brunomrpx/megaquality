<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Checklist $Checklist
 */
class Item extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Checklist' => array(
			'className' => 'Checklist',
			'joinTable' => 'checklists_items',
			'foreignKey' => 'item_id',
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
