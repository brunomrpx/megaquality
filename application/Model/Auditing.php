<?php

App::uses('AppModel', 'Model');

class Auditing extends AppModel {
	public $hasAndBelongsToMany = array(			
			'Item' => array(
					'className' => 'Item',
					'joinTable' => 'auditings_items',
					'foreignKey' => 'auditing_id',
					'associationForeignKey' => 'item_id',
					'unique' => 'keepExisting'
			)
	);
}
