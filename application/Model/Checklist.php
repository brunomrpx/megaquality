<?php
App::uses('AppModel', 'Model');
/**
 * Checklist Model
 *
 * @property Item $Item
 * @property Stage $Stage
 */
class Checklist extends AppModel {

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
        'Item' => array(
            'className' => 'Item',
            'joinTable' => 'checklists_items',
            'foreignKey' => 'checklist_id',
            'associationForeignKey' => 'item_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Stage' => array(
            'className' => 'Stage',
            'joinTable' => 'stages_checklists',
            'foreignKey' => 'checklist_id',
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

    public function getIdsSelectedItems() {
        $selectedItems = $this->query(
            'SELECT `checklists_items`.`item_id`
             FROM `checklists_items`
             WHERE `checklists_items`.`checklist_id` = :checklist_id',
             array('checklist_id' => $this->field('id'))
        );

        return $selectedItems;
    }

}
