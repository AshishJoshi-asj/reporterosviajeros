<?php

class Form_DiarioCrear extends Zend_Form
{

    public function init()
    {
        $titulo = new Zend_Form_Element_Text('title');
        $titulo->setLabel('Titulo: ');
        $titulo->setRequired(TRUE);
        $titulo->addFilters(array(new Zend_Filter_StringTrim()));
        //$titulo->setAttrib('size', 20);        
        $this->addElement($titulo);
        
        
        $desc = new Zend_Form_Element_TextArea('description');
        $desc->setLabel('Descripcion: ');
        $desc->setRequired(TRUE);
        $desc->addFilters(array(new Zend_Filter_StringTrim()));        
        //$desc->setAttrib('size', 40);        
        $this->addElement($desc);


        $submit = new Zend_Form_Element_Submit('submit','submit');
        $submit->setLabel('Crear diario!');
        
        $this->addElement($submit);
        
        //$this->addElement('submit','submit', array('label' => 'Submit'));
    }


}

