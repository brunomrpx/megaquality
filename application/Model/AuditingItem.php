<?php

App::uses('AppModel', 'Model');

class AuditingItem extends AppModel {
	public $useTable = "auditings_items";
	
	public $belongsTo = array(			
			'Auditing', 'Item'
	);
}
