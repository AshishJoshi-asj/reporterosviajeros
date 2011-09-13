<?php

class Form_Registro extends Zend_Form
{

    public function init()
    {
        $this->setName("registro");
        $this->setMethod('post');
             
        
 		$username = new Zend_Form_Element_Text('username');
        $username->setLabel('Nombre de usuario: ');
        $username->setRequired(TRUE);
        $username->addFilters(array(new Zend_Filter_StringTrim(),new Zend_Filter_StringToLower()));
        $username->addValidator('StringLength', false, array(0, 50));
        $username->setAttrib('maxLength', 50);
        $this->addElement($username);        
        
 		$email = new Zend_Form_Element_Text('email');
        $email->setLabel('e-mail: ');
        $email->setRequired(TRUE);
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addFilters(array(new Zend_Filter_StringTrim(),new Zend_Filter_StringToLower()));        
        $email->setAttrib('size', 40);        
        $this->addElement($email);        
        
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password: ');
        $password->setRequired(TRUE);
        $password->addFilters(array(new Zend_Filter_StringTrim()));
        $password->addValidator('StringLength', false, array(0, 50));
        $password->setAttrib('maxLength', 50);
        $this->addElement($password); 
        
        
        
        $password2 = new Zend_Form_Element_Password('password2');
        $password2->setLabel('Repite el password: ');
        $password2->setRequired(TRUE);
        $password2->addFilters(array(new Zend_Filter_StringTrim()));        	
        $password2->addValidator('StringLength', false, array(0, 50));
        $password2->setAttrib('maxLength', 50);
        $this->addElement($password2);
        
        

        $this->addElement('submit','auth/registro', array('label' => 'Submit'));
     
/*
        $this->addElement('submit', 'login', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Registrarme',
        ));
*/        
    }


}
