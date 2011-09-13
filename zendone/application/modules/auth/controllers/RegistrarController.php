<?php
 
class Auth_RegistrarController extends Zend_Controller_Action
{
	public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Form_Registro();
        $request = $this->getRequest();
        
        if ($request->isPost()) 
        {
            if ($form->isValid($request->getPost())) 
            {
            	$data = $request->getPost();
            	if ($data['password'] == $data['password2'])
            	{
	            	Zend_Debug::dump($data);
	
	            	// Todos los usuario que se registran através de este controller
    	        	// tendrán el role de usuario
            		$data['role']  = 'user';
            	            		
	            	// Añadir la fecha de creación
	            	$data['date_created'] = date( 'Y-m-d H:i:s');
	            	
	            	// Añadir la cadena para el salt
	            	$salt = sha1(rand()); 
	        		$salt = substr($salt, 0, 4); 
	        		$hash = base64_encode( sha1($data['password']. $salt, true) . $salt );
	            	$data['salt'] = $hash; 
	            	            	
	            	
	            	$data['password'] = md5($data['password']);
	            	            	
	            	
	            	$userModel = new Model_Users();
	            	$userModel->createUser($data);
	            	
	            	// User registered! Redirect the home page
                    $this->_helper->redirector('index', 'index','default');
	            	
            	}
            }
        }
        $this->view->form = $form;
    }

}