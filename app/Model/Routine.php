<?php
App::uses('AppModel', 'Model');
/**
 * Routine Model
 *
 * @property Class $Class
 * @property Subject $Subject
 * @property Teacher $Teacher
 */
class Routine extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ClassName' => array(
			'className' => 'ClassName',
			'foreignKey' => 'class_name_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Teacher' => array(
			'className' => 'Teacher',
			'foreignKey' => 'teacher_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
