<?php

App::uses('AppModel', 'Model');

class Auditing extends AppModel {
	public $hasMany = array('AuditingItem');
}
