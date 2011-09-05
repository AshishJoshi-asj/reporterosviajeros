<?php

class Form_Formulario extends Zend_Form
{

    public function init()
    {
        $author = new Zend_Form_Element_Text('author');
        $author->setLabel('Enter your name: ');
        $author->setRequired(TRUE);
        $author->setAttrib('size', 30);
        $this->addElement($author);
        
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Your email address: ');
        $email->setRequired(TRUE);
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addFilters(array(
        	new Zend_Filter_StringTrim(),
        	new Zend_Filter_StringToLower()
        	));        
        $email->setAttrib('size', 40);        
        $this->addElement($email);

        
      	$description = new Zend_Form_Element_Textarea('description');
      	$description->setLabel('Issue description');
      	$description->setRequired(TRUE);
      	$description->setAttrib('cols', 50);
      	$description->setAttrib('rows', 4);
      	$this->addElement($description);
      	
      	
      	// $priority = $this->createElement('select', 'priority');
      	// $priority->setLabel('Issue priority');
      	// $priority->setRequired(TRUE);
      	// $priority->add
      	// $priority->addMultiOptions(array(      		'low' 	=> 'Low',      		'med' 	=> 'Medium',      		'high'	=> 'High'));
      	// $this->addElement($priority);
      	
		$dropdown= new Zend_Form_Element_Select('dropdown');
		$dropdown->setLabel('Country:');
		$dropdown->setMultiOptions(array(
			'0' => 'United States',
			'1' => 'United Kingdom',
			'2' => 'Canada',
			'3' => 'Australia'
			));

		$this->addElement($dropdown);      	

        
        $this->addElement('submit','submit', array('label' => 'Submit'));
    }


}

