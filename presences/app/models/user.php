<?php
class User extends AppModel {

	var $name = 'User';
	var $useTable = 'users';
	var $validate = array(
		'username' => array(
			'rule' => 'alphanumeric',
			'message' => 'Caractères alphanumériques seulement',
		),
		'password' => array(
			'rule' => 'alphanumeric',
			'message' => 'Caractères alphanumériques seulement',
		),
		'email' => array(
			'rule' => 'email',
			'message' => 'Email invalide'
		),
		'name' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		),
		'firstname' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Ce champ est obligatoire'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $hasAndBelongsToMany = array(
             'Group' => array('className' => 'Group',  
                         'joinTable' => 'groups_users',  
                         'foreignKey' => 'user_id',  
                         'associationForeignKey' => 'group_id',  
                         'unique' => true  
             )  
     );  
}
?>