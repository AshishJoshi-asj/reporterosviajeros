<?php

class diario_model extends CI_Model
{
	function crearDiario()
	{
		log_message('debug', $this->session->userdata('username'));
		log_message('debug', $this->session->userdata('userid'));
		log_message('debug', $this->session->userdata('is_logged_in'));
		
		$format = 'DATE_RFC822';
		$time = time();		
		
		$date = date("Y-m-d");
			
		$newDiaryData = array(
			'authorid' => $this->session->userdata('userID'),
			'created' => $date,
			'description' => $this->input->post('descripcion'),
			'title' => $this->input->post('titulo')
		);
					
		$insert = $this->db->insert('diary', $newDiaryData);
		
		$diaryId = -1;
		$diaryId = mysql_insert_id();
		
		return $diaryId;
	}
	
	function getAllDiarios($userid)
	{
		$this->db->where('authorid',$userid);
		$query = $this->db->get('diary');
		
		return $query->result();
	}
	
	function getDiario($pais)
	{
		//$this->db->select(
	}
	

}
