<?php

class Application_Form_Request extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
         $this->setMethod('post');

		$this->addElement('textarea', 'message', array('label' => 'Message:',
		'required' => true,
		'filters' => array('StringTrim'),
		));

		$this->addElement('submit', 'submit', array('ignore' => true,'label'=> 'Send',
		));

    }


}

