<?php

class Custom_Acl extends Zend_Acl
{
	public function __construct()
	{
		// Roles
		$this->addRole(new Zend_Acl_Role('guest') );
		$this->addRole(new Zend_Acl_Role('user'), 'guest' );
		$this->addRole(new Zend_Acl_Role('admin'));
 
		// Recursos de lo general a lo particular
		$this->add(new Zend_Acl_Resource('default'));
		$this->add(new Zend_Acl_Resource('post'), 'default');
		$this->add(new Zend_Acl_Resource('auth'));
		$this->add(new Zend_Acl_Resource('admin'));
 
		// Asignar permisos
		// guest
		$this->allow('guest', array('default', 'auth') );
		$this->deny('guest', array('post', 'admin') );
		// user
		$this->allow('user', array('post') );
		// admin
		$this->allow('admin');
    }	
}