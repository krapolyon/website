<?php
class Group extends AppModel {

	var $name = 'Group';
	var $useTable = 'groups';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Caractères alphanumériques seulement',
		)
	);
	
	var $hasAndBelongsToMany = array(
			 'User' => array('className' => 'User',  
                         'joinTable' => 'groups_users',  
                         'foreignKey' => 'group_id',  
                         'associationForeignKey' => 'user_id',  
                         'unique' => true  
             ),
             'Permission' => array('className' => 'Permission',
                        'joinTable' => 'groups_permissions',
                        'foreignKey' => 'group_id',
                        'associationForeignKey' => 'permission_id',
                        'unique' => true
             )
    );  
}
?>