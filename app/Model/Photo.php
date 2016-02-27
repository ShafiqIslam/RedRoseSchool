<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 */
class Photo extends AppModel {
	public $hasOne = array(
		'SliderImage' => array(
			'className' => 'SliderImage',
			'foreignKey' => 'photo_id',
			'conditions' => '',
			'fields' => '',
			'dependent' => true,
			'order' => ''
		)
	);
}
