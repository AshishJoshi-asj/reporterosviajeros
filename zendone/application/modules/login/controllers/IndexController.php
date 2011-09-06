<?php


class Login_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$frm = new Form_Login();
    	$frm->setAction('submit');
    	$frm->setMethod('post');
    	
    	if ($this->getRequest()->isPost())
    	{
    		if ($frm->isValid($_POST))
    		{
    			$data = $frm->getValues();
    		}
    	}
    
    	
    	$this->view->form = $frm;
		
	}
}

