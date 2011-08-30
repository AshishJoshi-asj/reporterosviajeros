<?php

class modelo_lugares extends CI_Model
{
	function getRubros()
	{
		$this->db->select('name');
		$query = $this->db->get('rubros');
		
		return $query->result_array();
	}
}