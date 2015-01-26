<?php

App::uses ( 'AppModel', 'Model' );

/**
 * Item Model
 *
 * @property Checklist $Checklist
 */
class Item extends AppModel {
	
	// The Associations below have been created with all possible keys, those that are not needed can be removed
	
	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array (
			'Checklist' => array (
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
					'finderQuery' => '' 
			),
			'Auditing' => array (
					'className' => 'Auditing',
					'joinTable' => 'auditings_items',
					'foreignKey' => 'item_id',
					'associationForeignKey' => 'auditing_id',
					'unique' => 'keepExisting' 
			) 
	);
	
	public function getByAuditingTemplateId($auditingTemplateId = null) {		
		$items = $this->find('list', array (
				'joins' => array (
						array (
								'table' => 'checklists_items',
								'alias' => 'ChecklistsItems',
								'type' => 'INNER',
								'conditions' => array (
										'ChecklistsItems.item_id = Item.id' 
								) 
						),
						array (
								'table' => 'checklists',
								'alias' => 'Checklist',
								'type' => 'INNER',
								'conditions' => array (
										'ChecklistsItems.checklist_id = Checklist.id' 
								) 
						),
						array (
								'table' => 'stages_checklists',
								'alias' => 'StagesChecklists',
								'type' => 'INNER',
								'conditions' => array (
										'StagesChecklists.checklist_id = Checklist.id' 
								) 
						),
						array (
								'table' => 'stages',
								'alias' => 'Stage',
								'type' => 'INNER',
								'conditions' => array (
										'StagesChecklists.stage_id = Stage.id' 
								) 
						),
						array (
								'table' => 'auditings_template_stages',
								'alias' => 'AuditingsTemplateStages',
								'type' => 'INNER',
								'conditions' => array (
										'AuditingsTemplateStages.stage_id = Stage.id' 
								) 
						),
						array (
								'table' => 'auditings_template',
								'alias' => 'AuditingTemplate',
								'type' => 'INNER',
								'conditions' => array (
										'AuditingsTemplateStages.auditing_template_id = AuditingTemplate.id' 
								) 
						) 
				),
				'conditions' => array (
						'AuditingTemplate.id' => $auditingTemplateId 
				) 
		) );
		
		return $items;
	}
}
