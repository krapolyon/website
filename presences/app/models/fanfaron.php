<?php
class Fanfaron extends AppModel {

	var $name = 'Fanfaron';
	var $validate = array(
		'name' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		),
		'instrument_id' => array(
			'rule' => 'numeric',
			'message' => 'Ce champ est obligatoire'
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Email invalide'
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Contrat' => array('className' => 'Contrat',
						'joinTable' => 'contrats_fanfarons',
						'foreignKey' => 'fanfaron_id',
						'associationForeignKey' => 'contrat_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			),
			'AutreInstrument' => array('className' => 'Instrument',
						'joinTable' => 'fanfarons_instruments',
						'foreignKey' => 'fanfaron_id',
						'associationForeignKey' => 'instrument_id',
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
	
	var $belongsTo = array(
			'Instrument' => array('className' => 'Instrument',
								'foreignKey' => 'instrument_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
		);

	var $hasMany = array(
			'FanfaronsInstrument' => array('className' => 'FanfaronsInstrument',
								'foreignKey' => 'id',
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