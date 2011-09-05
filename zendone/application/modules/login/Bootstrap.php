<?php

class Login_Bootstrap extends Zend_Application_Module_Bootstrap
{
	public function _initAutoload()
	{
		
	    // Each module needs to be registered...
	    /* 
	    $modules = array(
	        'Admin',
	        'Default',
	        'Support',
	    );
	
	    foreach ($modules as $module) 
	    {
	        $autoloader = new Zend_Application_Module_Autoloader(array(
	            'namespace' => ucfirst($module),
	            'basePath'  => APPLICATION_PATH . '/modules/' . strtolower($module),
	        ));
	    }
	    
   
	
	    return $autoloader;
		*/	    
	}
}