<?php

class Form_Login extends Zend_Form
{

    public function init()
    {
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Nombre de usuario: ');
        $username->setRequired(TRUE);
        $username->setFilters(array(new Zend_Filter_StringTrim(), new Zend_Filter_StringToLower()));
		$username->addValidator('StringLength', false, array(0, 50));
        $username->setAttrib('maxLength', 50);
        $this->addElement($username);
        
        
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password: ');
        $password->setRequired(TRUE);
        $password->addFilters(array(new Zend_Filter_StringTrim()));
        $password->addValidator('StringLength', false, array(0, 50));
        $password->setAttrib('maxLength', 50);
        $this->addElement($password); 

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Entrar');
        //$submit->setA

        $this->addElement('submit','default/index/index', array('label' => 'Submit'));
    }


}

