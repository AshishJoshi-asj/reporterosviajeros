<?php

class Model_Membership extends Zend_Db_Table_Abstract
{
	protected $_name = 'membership';

	public function fetchMembers()
	{
		$select = $this->select();
		return $this->fetchAll($select);
	}
}

