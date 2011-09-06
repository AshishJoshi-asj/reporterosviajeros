<?php

class Form_RecuperarPassword extends Zend_Form
{

    public function init()
    {
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-mail: ');
        $email->setRequired(TRUE);
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addFilters(array(
        	new Zend_Filter_StringTrim(),
        	new Zend_Filter_StringToLower()
        	));        
        $email->setAttrib('size', 40);        
        $this->addElement($email);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Quiero cambiar mi contraseña');
        
        

        $this->addElement('submit','login/index/recuperar', array('label' => 'Quiero cambiar mi contrasena'));
    }


}

