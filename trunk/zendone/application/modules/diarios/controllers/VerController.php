<?php

class Diarios_VerController extends Zend_Controller_Action
{

    public function init()
    {
    	/*
		$uri = $this->_request->getPathInfo();    	
		$activeNav = $this->view->navigation()->findByUri($uri);
		$activeNav->active = true;
		$activeNav->setClass("active");
		*/	
    }
	

    public function indexAction()
    {
   	   	$reqParams = $this->getRequest()->getParams();
    	
    	$diaryModel = new Model_Diary();
    	$chapterModel = new Model_DiaryChapter();
    	

    	//Zend_Debug::dump($reqParams['id']);
    	
    	$this->view->diario		= $diaryModel->get($reqParams['id']);
    	$this->view->capitulos	= $chapterModel->getDID($reqParams['id']);
    	
        
    	//Zend_Debug::dump($this->view->diario);
    	//Zend_Debug::dump($this->view->capitulos);
    	
/*        
        
        $this->view->addScriptPath(APPLICATION_PATH . '/modules/default/views/scripts/index');
        $createSnippet = $this->view->render('_sidebar.phtml');
        $this->view->layout()->sideCol = $createSnippet ;
*/        

	}
}

