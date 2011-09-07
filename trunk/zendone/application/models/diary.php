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
	

}

