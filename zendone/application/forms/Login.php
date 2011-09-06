<?php

class Form_Login extends Zend_Form
{

    public function init()
    {
        $author = new Zend_Form_Element_Text('username');
        $author->setLabel('Nombre de usuario: ');
        $author->setRequired(TRUE);
        //$author->setAttrib('size', 30);
        $this->addElement($author);
        
        
        $email = new Zend_Form_Element_Password('password');
        $email->setLabel('Password: ');
        $email->setRequired(TRUE);       
        $this->addElement($email);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Entrar');
        //$submit->setA

        $this->addElement('submit','login/index/index', array('label' => 'Submit'));
    }


}

