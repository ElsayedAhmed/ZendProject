<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'email', array('label' => 'Email',
            'required' => true,
            'filters' => array('stringTrim'),
            ));
        $this->addElement('password', 'password', array('label' => 'Password',
            'required' => true,
            'filters' => array('stringTrim'),
            ));
        $this->addElement('submit', 'submit', array('label' => 'Login',
            'ignore' => true
            ));


        // $email = new Zend_Form_Element_Text('email');
        // $email->setRequired()->setLabel('Email');
        // // ->setAttrib('class','sr-only');
        // $email->addFilter('stripTags');
        // $email->addFilter('stringTrim');
        // $email->addValidator('NotEmpty');
        // $email->addValidator(new Zend_Validate_EmailAddress)->addValidator(new Zend_Validate_Db_NoRecordExists(
        // array(
        //     'table' => 'user',
        //     'field' => 'email'
        //     )
        // ));

        // $password = new Zend_Form_Element_Password('password');
        // $password->setLabel('Password');
        // // ->setAttrib('class','sr-only');
        // // $password->setAttrib('class','form-control');

        // $password->addValidator(new Zend_Validate_StringLength(array('min'=>5, 'max'=>9)));
        // $password->addFilter('stripTags');
        // $password->addFilter('stringTrim');
        // $password->addValidator('NotEmpty');

        // $submit = new Zend_Form_Element_Submit('submit');
        // $submit->setLabel('Login');
        // // $submit->setAttrib('class','login-button');
        // // $submit->setAttrib('class','fa fa-chevron-right');

        // $this->addElements(array($email, $password, $submit));
    }


}

