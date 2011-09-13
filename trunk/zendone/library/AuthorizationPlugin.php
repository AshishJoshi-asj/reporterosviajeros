<?php
/*
 * AuthorizationPlugin.php
 * Extención de la clase Zend_Controller_Plugin_Abstract
*/
class Custom_AuthorizationPlugin extends Zend_Controller_Plugin_Abstract
{
	private $_auth;
	private $_acl;
 
	public function __construct(Zend_Auth $auth, Zend_Acl $acl)
	{
        	$this->_auth = $auth;
        	$this->_acl = $acl;
	}
 
	public function preDispatch ( Zend_Controller_Request_Abstract $request )
	{
		// revisa que exista una identidad
		// obtengo la identidad y el "role" del usuario, sino tiene le pone 'guest'
		$role = $this->_auth->hasIdentity() ? $this->_auth->getInstance()->getIdentity()->role : 'guest';
 
		// toma el nombre del recurso actual
		if( $this->_acl->has( $this->getRequest()->getActionName() ) )
			$resource = $this->getRequest()->getActionName();
		elseif( $this->_acl->has( $this->getRequest()->getControllerName() ) )
			$resource = $this->getRequest()->getControllerName();
		elseif( $this->_acl->has( $this->getRequest()->getModuleName() ) )
			$resource = $this->getRequest()->getModuleName();
 
		// Si, la persona no pasa la prueba de autorización y su "role" es 'guest'
		// entonces no ha echo "login" y lo dirigo al controlador "login" del modulo "auth"
		if ( !$this->_acl->isAllowed($role, $resource) && $role == 'guest' )
		{
			$request->setModuleName('auth');
			$request->setControllerName('index');
		}
		// Ahora si la persona tiene un "role" distinto de 'guest' y aun así no pasa
		// la prueba de identificación lo mando a una página de error.
		elseif (!$this->_acl->isAllowed($role, $resource) )
		{
			$request->setModuleName('auth');
			$request->setControllerName('error');
		}
 
	}
}