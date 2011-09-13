<?php

class Model_Diary extends Zend_Db_Table_Abstract
{
	protected $_name = 'diary';

	public function getAll()
	{
		$diaryModel = new self();	
		$select = $diaryModel->select();
		
		return $diaryModel->fetchAll($select);
	}
	
	
	public function get($id)
	{
		
		$table = new self();
		
		$row = $table->fetchRow($table->select()->where('id = ?', $id));
		
		//Zend_Debug::dump($row->description);
		
		return $row;
	}
	
	
	public function insertDiario($diario)
	{
			
		//Zend_Debug::dump($diario);
		$diaryModel = new self();

	

		$data = array(
			'authorid'		=> 5,
		    'created'       => $diario["created"], //new Zend_Db_Expr('CURDATE()'), //'2007-03-22',
    		'description'	=> $diario["description"],
    		'title'			=> $diario["title"],
		);
 
		$diaryModel->insert($data);
	}
	


	

}

