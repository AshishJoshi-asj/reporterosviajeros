<?php
class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract 
{
    public function loggedInAs ()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) 
        {
        	//Zend_Debug::dump($auth->getIdentity());
            $username = $auth->getIdentity()->username;
            $logoutUrl = $this->view->url(array('module' => 'auth', 'controller'=>'login', 'action'=>'logout'), null, true);
            return 'Welcome ' . $username .  '. <a href="'.$logoutUrl.'">Logout</a>';
        } 

        $request = Zend_Controller_Front::getInstance()->getRequest();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        if($controller == 'auth' && $action == 'index') {
            return '';
        }
        
        $loginUrl = $this->view->url(array('controller'=>'login', 'action'=>'index', 'module'=>'auth'));
        return '<a href="'.$loginUrl.'">Login</a>';
    }
}