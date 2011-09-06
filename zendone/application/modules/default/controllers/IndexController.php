<?php

class IndexController extends Zend_Controller_Action
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
        
        $usersModel = new Model_Users();
        $this->view->users = $usersModel->getUsers();
        
        
        $createSnippet = $this->view->render('index/_sidebar.phtml');
        $this->view->layout()->sideCol = $createSnippet ;

	}
    
	public function aboutAction()
	{
		$this->view->layout()->sideCol = $this->view->render('index/_sidebar.phtml');
	}
	
	public function contactAction()
	{
		$this->view->layout()->sideCol = $this->view->render('index/_sidebar.phtml');
	}
	public function sitemapAction()
	{
		$this->view->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		echo $this->view->navigation()->sitemap();
		
	}
	
	public function preDispatch()
    {
        //$this->view->render('index/_sidebar.phtml');
    }


}

