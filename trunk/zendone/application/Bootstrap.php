<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
		//print "_initAutoload - app<br>";
		
		$autoLoader = Zend_Loader_Autoloader::getInstance();
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
									'basePath' => APPLICATION_PATH,
									'namespace' => '',
									'resourceTypes' => array (
											'form' => array(
												'path'		=> 'forms/',
												'namespace' => 'Form_'),
											'model' => array(
												'path' => 'models/',
												'namespace' => 'Model_')
											)
									));									
		return $resourceLoader;
	}
	
	protected function _initAutoloadModule()
	{
		//print "_initAutoloadModule - app<br>";
		
		$modules = array(
	        'default',
	        'login',
	        'diarios',
	    );
	
	    foreach ($modules as $module) 
	    {
	        $autoloader = new Zend_Application_Module_Autoloader(array(
	            'namespace' => ucfirst($module).'_',
	            'basePath'  => APPLICATION_PATH . '/modules/' . strtolower($module),
	        ));
	    }
	    
	    
	   
	    
   
	
	    return $autoloader;
	}
	
	
	
	protected function _initView()
	{
		//print "_initView - app<br>";
		
		// Initialize view
		$view = new Zend_View();
		$view->doctype('XHTML1_STRICT');
		$view->headTitle('Zend CMS - Probando cosillas')
			 ->setSeparator(' :: ' );
		$view->skin = 'blues';
		
		// Add it to the ViewRenderer
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
		$viewRenderer->setView($view);
		
		// Return it, so that is can be stored by the bootstrap
		return $view;
	}
	
	protected function _initNavigation()
	{
		//print "_initNavigation - app<br>";
		
  		$this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();		
        
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
		$container = new Zend_Navigation($config);
		
		$view->navigation($container);
	}
	
	protected function _initSidebar()
    {
    	//print "_initSidebar - app<br>";
    	
        $this->bootstrap('View');
        $view = $this->getResource('View');
 
        $view->placeholder('subNav');
    }
    
    
    protected function _initControllers()
    {
    	//print "_initControllers - app<br>";
    	
    	/*
    	$front = Zend_Controller_Front::getInstance();
    	$front->setControllerDirectory(array(
    		'default' => APPLICATION_PATH . '/modules/controllers',
    		'login' => APPLICATION_PATH . '/modules/login/Controllers',
    	));
    	*/    	
    }

}

