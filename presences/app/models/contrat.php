<?php
class Contrat extends AppModel {

	var $name = 'Contrat';
	var $actsAs = array('DateFormatter');
	var $validate = array(
		'title' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		),
		'lieu' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		),
		'date_debut' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Fanfaron' => array('className' => 'Fanfaron',
						'joinTable' => 'contrats_fanfarons',
						'foreignKey' => 'contrat_id',
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

}
?>