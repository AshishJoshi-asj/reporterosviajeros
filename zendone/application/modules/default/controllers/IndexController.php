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
        // action body
        $this->view->content = "Cadena de texto";       
        $membershipModel = new Model_Membership();
        $this->view->members = $membershipModel->fetchMembers();
        
        
        $createSnippet = $this->view->render('index/_sidebar.phtml');
        
        
        
        $this->view->layout()->subNav = $createSnippet ;
        
        //Zend_Debug::dump($createSnippet);
        

	}
    
	public function aboutAction()
	{
		$layout = $this->_helper->layout();
		$layout->setLayout('yaml_01');
		//$this->view->layout()->subNav = $this->view->render('index/_sidebar.phtml');
	}
	
	public function contactAction()
	{
		$this->view->layout()->subNav = $this->view->render('index/_sidebar.phtml');
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

