<?php

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function phpinfo()
	{
		$this->load->view('phpinfo');
	}
	
	
	function index() 
	{
		// Check if a user is logged interface
		
		$isUserLogged = $this->session->userdata('is_logged_in');
		$userID = $this->session->userdata('userID');
		
		if ($isUserLogged)
		{
			log_message('debug','El usuario con ID '.$userID.' est� conectado. Obteniendo datos.... (DB)');
			
			
			// Load data from DB
			$this->load->model('diario_model');
			$diarios = $this->diario_model->getAllDiarios($userID);
			
			$data['diarios'] = $diarios;
			
			log_message('debug', '--------------------------');
			foreach ( $diarios as $diario ) 
			{
				log_message('debig',$diario->id);
			}
			
			$this->load->view('home',$data);
		}
		else
			$this->load->view('home');
	}
	
	function destinos()
	{
		$this->load->model('modelo_lugares');
		$rubros = $this->modelo_lugares->getRubros();
		
		$ddList = array();		
		foreach ($rubros as $rubro) 
		{
			array_push($ddList,$rubro['name']);
		}
		
		
		$data['rubros'] = $ddList;
		$this->load->view("destinos",$data);
	}
	
	function anadirLugar()
	{
		log_message('debug', $this->input->post('nombre'));
		log_message('debug', $this->input->post('rubro'));
		log_message('debug', $this->input->post('tipo'));
		log_message('debug', $this->input->post('localizacion'));
		log_message('debug', $this->input->post('contacto'));
		$this->load->view("home");
	}
	
	
	
	function creardiario()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		//$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[4]|max_length[32]');
		//$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim|required|min_length[10]');
		
		
		/*if($this->form_validation->run() == FALSE)
		{
			log_message('debug', 'aqui2');
			$this->load->view('home');
		}
		
		else*/
		{	
			log_message('debug', 'aqui');
			$this->load->model('diario_model');
			
			$diarioId = $this->diario_model->crearDiario();
			
			if($diarioId != -1)
			{
				log_message('debug', 'Diario insertado ID: '.$diarioId);
				
				$data['newDiarioId'] = $diarioId;
				$data['newDiarioTitulo'] = $this->input->post('titulo');
				$data['newDiarioDesc'] = $this->input->post('descripcion');
				$this->load->view('addDiaryChapter', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}

	}
	
	
	function editarDiario($diaryID)
	{
		log_message('debug','Editando el diario '.$diaryID);
		$this->load->view('editDiary',$diaryData);
	}
	
	function validate_credentials()
	{		
		$this->load->model('membership_model');
		$membershipData = $this->membership_model->validate();
		
		if ( isset($membershipData) )
		//if($userID != -1)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'userID' => $membershipData->id,
				'is_logged_in' => true
			);
			
			
			
			$this->session->set_userdata($data);			
			// Register user information
			
			$this->load->library('OnlineUsers');
			//$userdata[�username�] = �Peter�;
			$userdata['id'] = $membershipData->id;
			$userdata['username'] = $membershipData->username;
			$this->onlineusers->set_data($userdata);
			
			
			$this->index();
		}
		else
		{
			$this->load->view('home');
		}
	}
	
	function signup()
	{
		$this->load->view('signup');
	}
	
	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('home', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}	
	

	function logout()
	{
		$data = array( 'is_logged_in' => false );
		$this->session->set_userdata($data);
		
		$this->session->sess_destroy();
		$this->index();
	}	
	
}
