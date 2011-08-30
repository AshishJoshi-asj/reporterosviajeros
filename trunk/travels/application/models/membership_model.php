<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		//$this->db->select('id');
		$query = $this->db->get('membership');
				
		//$ret = null;
		
		if($query->num_rows == 1)
		{
			//$row = $query->row();			
			//$ret = $row->id;
			
			return $query->row();
		}
		
		//return $ret;		
	}
	
	function create_member()
	{
		
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$this->db->insert('membership', $new_member_insert_data);
		
		$userId = mysql_insert_id();
				
		return $userId;
	}
}