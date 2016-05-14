<?php
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter;
class Application_Form_User extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('user');
        $this->setAttrib("class","col-xs-6 col-md-3 col-md-offset-4");

        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $username=new Zend_Form_Element_Text('username');
        $username->setLabel('UserName')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty')
    			 ->setAttrib("class", "form-control col-xs-6 col-md-3");
    			
    	// $username->setAttrib('class','form-control ');
        $email=new Zend_Form_Element_Text('email');
		$email->setLabel('email')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty')
     			 ->setAttrib("class", "form-control col-xs-6 col-md-3");

		$email->setAttrib('class','form-control');
		$password=new Zend_Form_Element_Password('password');
		$password->setLabel('password')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty')
				 ->setAttrib("class", "form-control col-xs-6 col-md-3");

		$image=new Zend_Form_Element_File('image');
		$image->setLabel('image')
				 ->setRequired('true')
				 ->addValidator('NotEmpty');
				 // ->setAttrib("class", "form-control");



 		$signature=new Zend_Form_Element_Text('signature');
        $signature->setLabel('signature')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty')
    			 ->setAttrib("class", "form-control col-xs-6 col-md-3");

	    $gender = new Zend_Form_Element_Radio('gender');
	    $gender->setLabel('Gender:')
	      ->addMultiOptions(array(
	        'male' => 'Male',
	        'female' => 'Female'
	      ))
	      ->setSeparator('');
		
		        
		$country=new Zend_Form_Element_Text('country');
		$country->setLabel('country')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty')			
				 ->setAttrib("class", "form-control col-xs-6 col-md-3");

		$is_admin=new Zend_Form_Element_Checkbox('is_admin');
		$is_admin->setLabel('admin: ')
				 ->setUncheckedValue("admin");

    	$is_banned=new Zend_Form_Element_Checkbox('is_banned');
    	$is_banned->setLabel('banned: ')
    			  ->setUncheckedValue("Banned");

    	// 		 ->setRequired('true')
    	// 		 ->addFilter('stripTags')
    	// 		 ->addFilter('stringTrim')
    	// 		 ->addValidator('NotEmpty');
    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','submitbutton');
		$submit->setAttrib('class','btn btn-primary');
    
    	$this->addElements(array($id,$username, $email, 
    		$password, $image, $signature, $gender,$country,
    		 $is_admin,$is_banned, $submit ));
    }



}

