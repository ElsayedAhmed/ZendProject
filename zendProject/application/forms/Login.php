<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
           // $this->setName("login");
           // $this->setMethod('post');
           // $this->addElement('text', 'email',
           // 	 array(
           // 	// 'filters' => array('StringTrim', 'StringToLower'),
           //   'validators' => array(
           //  // 	array('StringLength', false, array(0, 50)),
           //  // 	
            
           //  'required' => true,
           //  'label' => 'email:',
           //  )));
           // $this->addElement('password', 'password', array(
           // 	'filters' => array('StringTrim'),
           // 	'validators' => array(
           // 		array('StringLength', false, array(0, 50)),
           // 		),
           // 	'required' => true,
           // 	'label' => 'Password:',
           // 	));
           // $this->addElement('submit', 'login', array(
           // 	'required' => false,
           // 	'ignore' => true,
           // 	'label' => 'Login',
           // 	));
        {
		$this->setMethod('post');
		$this->addElement('text', 'email', array('label' => 'Username:','required' => true,'filters'=>array('StringTrim'),));
		$this->addElement('password', 'password',array('label' => 'Password:','required' => true,));
		$this->addElement('submit', 'submit', array('ignore'=> true,'label'=> 'Login',));
}
       }


}

