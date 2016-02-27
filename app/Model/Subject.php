<?php
App::uses('AppModel', 'Model');
/**
 * Subject Model
 *
 * @property Class $Class
 * @property Mark $Mark
 * @property Routine $Routine
 */
class Subject extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Mark' => array(
			'className' => 'Mark',
			'foreignKey' => 'subject_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Routine' => array(
			'className' => 'Routine',
			'foreignKey' => 'subject_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
