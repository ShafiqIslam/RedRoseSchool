<?php
App::uses('AppModel', 'Model');
/**
 * OnlineApplication Model
 *
 * @property ClassName $ClassName
 */
class OnlineApplication extends AppModel {


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
}
