<?php

class Model_Users extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';

	public function getUsers()
	{
		$usersModel = new self();	
		$select = $usersModel->select();
		$select->order(array('id'));		
		
		return $usersModel->fetchAll($select);
	}
	
	
	public function createUser($userData)
	{
		$table = new Model_Users();
		
		Zend_Debug::dump($userData);
		
		$data = array(
		    'username'		=> $userData['username'],
		    'password'		=> $userData['password'],
		    'role'			=> $userData['role'],
			'salt'			=> $userData['salt'],
			'date_created'	=> $userData['date_created']
		);
		 
		$table->insert($data);
	}
}

