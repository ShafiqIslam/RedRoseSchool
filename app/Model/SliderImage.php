<?php
App::uses('AppModel', 'Model');
/**
 * SliderImage Model
 *
 */
class SliderImage extends AppModel {
	public $belongsTo = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'photo_id',
			'conditions' => '',
			'fields' => '',
			'dependent' => true,
			'order' => ''
		)
	);
}
