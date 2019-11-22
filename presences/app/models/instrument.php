<?php
class Instrument extends AppModel {

	var $name = 'Instrument';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Fanfaron' => array('className' => 'Fanfaron',
						'joinTable' => 'fanfarons_instruments',
						'foreignKey' => 'instrument_id',
						'associationForeignKey' => 'fanfaron_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);
	
	var $hasMany = array(
			'Fanfaron' => array('className' => 'Fanfaron',
								'foreignKey' => 'instrument_id',
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
?>