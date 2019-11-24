<?php
class FanfaronsInstrument extends AppModel {

	var $name = 'FanfaronsInstrument';
	var $validate = array(
		'instrument_id' => array(
			'rule' => 'numeric',
			'message' => 'Ce champ est obligatoire'
		),
		'fanfaron_id' => array(
			'rule' => 'numeric',
			'message' => 'Ce champ est obligatoire'
		),
	);
	
	var $belongsTo = array(
			'Instrument' => array('className' => 'Instrument',
								'foreignKey' => 'instrument_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Fanfaron' => array('className' => 'Fanfaron',
								'foreignKey' => 'fanfaron_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
		);

}
?>