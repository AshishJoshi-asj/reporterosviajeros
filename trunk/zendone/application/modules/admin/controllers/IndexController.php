<?php

class Diarios_IndexController extends Zend_Controller_Action
{

    public function init()
    {
	
    }
	

    public function indexAction()
    {
	   	$diaryModel = new Model_Diary();
        $this->view->users = $diaryModel->getAll();
        
        $this->view->numDiarios = count($this->view->users);
        
        $this->_helper->layout()->setLayout('layout_diarios');
        
        //$createSnippet = $this->view->render('/default/index/_sidebar.phtml');
        //$this->view->layout()->sideCol = $createSnippet ;

	}
    

}

