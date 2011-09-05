<?php


class AboutController extends Zend_Controller_Action
{

    public function init()
    {
    	/*
		$uri = $this->_request->getPathInfo();    	
		$activeNav = $this->view->navigation()->findByUri($uri);
		$activeNav->active = true;
		$activeNav->setClass("active");

		$options = array(  
  				'layout'   => 'internas',  
				);  
		Zend_Layout::startMvc($options);
		*/
    	
		
    }
	

	public function indexAction()
	{
		$this->view->nickname = "waterazu";
				
	}
    
   
	public function aboutAction()
	{
		
	}
	
	

	
	public function sitemapAction()
	{
		$this->view->layout()->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		echo $this->view->navigation()->sitemap();
		
	}    


}

