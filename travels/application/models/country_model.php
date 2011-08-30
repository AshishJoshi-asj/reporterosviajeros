<?php

class Country_model extends CI_Model
{
	function getCountries()
	{
		$query = $this->db->get("countries");
		
		$country_array = array('' => '');
		foreach ($query->result() as $row) {
			$country_array[$row->country] = $row->country;
		}
		
	
		return $country_array;
	}
}
