<?php

class Site extends CI_Controller
{
	function index()
	{
        $this->load->view('site_view');
	}
    
    function login()
    {
        echo "Login function invoked";
    }
}