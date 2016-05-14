<?php

class Application_Form_Profile extends Zend_Form
{

	public function init()
	{
		/* Form Elements & Other Definitions Here ... */
		


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

		$this->addElement('textarea', 'signature', array('label' => 'Signature:',
			'required' => true,
			'filters' => array('StringTrim'),
			'attribs' => array('class' => 'form-control'),
			));

		
	}


}

