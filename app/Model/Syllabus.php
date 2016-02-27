<?php
App::uses('AppModel', 'Model');

class Syllabus extends AppModel {

	public $useTable = 'syllabuses';

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
