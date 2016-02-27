<?php
App::uses('AppModel', 'Model');

class Suggestion extends AppModel {

	public $displayField = 'title';

	public $belongsTo = array(
		'ClassName' => array(
			'className' => 'ClassName',
			'foreignKey' => 'class_name_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
