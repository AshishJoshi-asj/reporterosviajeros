<?php

class BugController extends Zend_Controller_Action
{

    public function init()
    {
       	$uri = $this->_request->getPathInfo();    	
		$activeNav = $this->view->navigation()->findByUri($uri);
		$activeNav->active = true;
		$activeNav->setClass("active");
    }


    public function indexAction()
    {
        // action body
    	        
    }

    public function createAction()
    {
        // action body
    }
    
    public function submitAction()
    {
    	$frm = new Form_Formulario();
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
    	
    	$this->view->layout()->subNav = $this->view->render('index/_sidebar.phtml');
 
    }


}





