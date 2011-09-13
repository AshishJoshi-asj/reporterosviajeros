<?php
 
class Auth_loginController extends Zend_Controller_Action
{
	public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Form_Login();
        $form->setName('login');
        $form->setAction('auth/login/index');
        $form->setMethod('post');
        
        
        $request = $this->getRequest();
        
        if ($request->isPost()) 
        {
        	$datos = $request->getPost();
        	$datos['pass2'] = md5($datos['password']);
        	Zend_Debug::dump($datos);
        	
            if ($form->isValid($request->getPost())) 
            {
                if ($this->_process($form->getValues())) 
                {
                    // We're authenticated! Redirect to the home page
                    $this->_helper->redirector('index', 'index','default');
                }
            }
        }
        $this->view->form = $form;
    }

    protected function _process($values)
    {
        // Get our authentication adapter and check credentials
        $adapter = $this->_getAuthAdapter();
        $adapter->setIdentity($values['username']);
        $adapter->setCredential(md5($values['password']));

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $user = $adapter->getResultRowObject();
            $auth->getStorage()->write($user);
            return true;
        }
        return false;
    }

    protected function _getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
                    //->setCredentialTreatment('MD5(?)');

        return $authAdapter;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index'); // back to login page
    }
}