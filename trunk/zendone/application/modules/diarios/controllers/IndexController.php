<?php

class Diarios_IndexController extends Zend_Controller_Action
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
    	$request = $this->getRequest()->getParam("username");
    	
    	Zend_Debug::dump($request);
    	
    	$diaryModel = new Model_Diary();
    	$chapterModel = new Model_DiaryChapter();
        $this->view->diarios = $diaryModel->getAll();
        
        
        
        $this->view->numDiarios = count($this->view->diarios);
        $this->view->numCapitulos = count($chapterModel->getAll()); 
        
        $this->view->addScriptPath(APPLICATION_PATH . '/modules/default/views/scripts/index');
        
        $createSnippet = $this->view->render('_sidebar.phtml');
        $this->view->layout()->sideCol = $createSnippet ;

	}
	
	public function editarAction()
	{
		$diaryID = $this->_getParam("id");
		$this->view->diarioid = $diaryID;
		
		$frm = new Form_DiarioEditar();
		$frm->setAction('/diarios/index/editar/'.$diaryID);
    	$frm->setMethod('post');
		
		$did = new Zend_Form_Element_Hidden('did');
		$did->setLabel('did');
		$did->setValue($this->view->diarioid);
		$frm->addElement($did);
    	
		
    	if ($this->getRequest()->isPost())
    	{
    		if ($frm->isValid($_POST))
    		{
    			$data = $frm->getValues();
    			$data['createdate'] = date( 'Y-m-d');
    			$data['updatedate'] = date( 'Y-m-d');
    			//Zend_Debug::dump($data);
    			
    			$this->insertarDiarioCapitulo($data);
    		}
    	}	
    
    	$this->view->editardiario_form = $frm;
    	$this->view->addScriptPath(APPLICATION_PATH."/modules/default/");
    	$this->view->layout()->sideCol = $this->view->render('/views/scripts/index/_sidebar.phtml');
	}
	
	
	public function escribirdiarioAction()
	{
		$frm = new Form_DiarioCrear();
    	$frm->setAction('/diarios/index/escribirdiario');
    	$frm->setMethod('post');
    	
    	if ($this->getRequest()->isPost())
    	{
    		if ($frm->isValid($_POST))
    		{
    			$data = $frm->getValues();
    			$data['created'] = date( 'Y-m-d H:i:s');
    			//Zend_Debug::dump($data['titulo']);
    			$this->insertarNuevoDiario($data);
    		}
    	}	
    
    	$this->view->nuevodiario_form = $frm;
    	$this->view->addScriptPath(APPLICATION_PATH."/modules/default/");
    	$this->view->layout()->sideCol = $this->view->render('/views/scripts/index/_sidebar.phtml');
	}
	
	private function insertarNuevoDiario($data)
	{
		$diaryModel = new Model_Diary();
        $this->view->users = $diaryModel->insertDiario($data);
		
		//$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
		//$redirector->gotoUrl('/diarios/index/index');
		//redirect("diarios/index/index");		
	}
	
	private function insertarDiarioCapitulo($data)
	{
		$diaryModel = new Model_DiaryChapter();
        $this->view->users = $diaryModel->insertarDiarioCapitulo($data);
		
		//$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
		//$redirector->gotoUrl('/diarios/index/index');
		//redirect("diarios/index/index");		
	}
	


}

