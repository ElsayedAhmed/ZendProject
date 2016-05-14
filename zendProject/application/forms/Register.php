<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        // $this->setAttrib('class', 'col-md-5');


		$this->addElement('text', 'username', array('label' => 'Username:',
		'required' => true,
		'filters' => array('StringTrim'),
		'attribs' => array('class' => 'form-control'),
		));

		$this->addElement('text', 'email', array('label' => 'Email:',
		'required' => true,
		'filters' => array('StringTrim'),
		'attribs' => array('class' => 'form-control'),
		));

		$this->addElement('password', 'password',array('label' => 'Password:',
		'required' => true,
		'attribs' => array('class' => 'form-control'),
		));

		$this->addElement('text', 'gender', array('label' => 'Gender:',
		'required' => true,
		'filters' => array('StringTrim'),
		'attribs' => array('class' => 'form-control'),
		));

		$this->addElement('text', 'country', array('label' => 'Country:',
		'required' => true,
		'filters' => array('StringTrim'),
		'attribs' => array('class' => 'form-control'),
		));

		$this->addElement('submit', 'submit', array('ignore' => true,'label'=> 'Register',
			'attribs' => array('class' => 'form-control'),
		));
    }


}

