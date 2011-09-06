<?php

class Model_Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';

	public function getUsers()
	{
		$usersModel = new self();	
		$select = $usersModel->select();
		$select->order(array('last_name', 'first_name'));		
		
		return $usersModel->fetchAll($select);
	}
}

