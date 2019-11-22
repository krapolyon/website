<?php
class ContratsFanfaron extends AppModel {

	var $name = 'ContratsFanfaron';
	var $validate = array(
		'contrat_id' => array('numeric'),
		'fanfaron_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Contrat' => array('className' => 'Contrat',
								'foreignKey' => 'contrat_id',
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