<?php

class Model_DiaryChapter extends Zend_Db_Table_Abstract
{
	protected $_name = 'diarychapter2';

	public function getAll()
	{
		$diaryModel = new self();	
		$select = $diaryModel->select();
		
		return $diaryModel->fetchAll($select);
	}
	
	public function getDID($id)
	{
		
		$table = new self();
		
		$rows = $table->fetchAll($table->select()->where('did = ?', $id));
		
		//Zend_Debug::dump($rows->toArray());
		
		return $rows;
	}	
	
	
	public function insertarDiarioCapitulo($capituloDatos)
	{			
		Zend_Debug::dump($capituloDatos);
		$diaryModel = new self();

	
		$data = array(
			'did'			=> $capituloDatos["did"],
			'title'			=> $capituloDatos["title"],
			'date'			=> $capituloDatos["date"],
		    'creationdate'	=> $capituloDatos["createdate"], //new Zend_Db_Expr('CURDATE()'), //'2007-03-22',
			'updatedate'	=> $capituloDatos["updatedate"],
    		'content'		=> $capituloDatos["description"],
    		
		);
		
		
		Zend_Debug::dump($data);
		
		
 
		$diaryModel->insert($data);
	}
	
}