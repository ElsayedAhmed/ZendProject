<?php
use Zend\Form\Element;
use Zend\Form\Form;
class Application_Form_User extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('user');
        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $username=new Zend_Form_Element_Text('username');
        $username->setLabel('UserName')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');
    	$username->setAttrib('class','form-control ');
        $email=new Zend_Form_Element_Text('email');
		$email->setLabel('email')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty');
		$email->setAttrib('class','form-control');
		$password=new Zend_Form_Element_Password('password');
		$password->setLabel('password')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty');

		$image=new Zend_Form_Element_Text('image');
		$image->setLabel('image')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty');

 		$signature=new Zend_Form_Element_Text('signature');
        $signature->setLabel('signature')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');

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
				 ->addValidator('NotEmpty');

		$is_admin=new Zend_Form_Element_Text('is_admin');
		$is_admin->setLabel('is_admin')
				 ->setRequired('true')
				 ->addFilter('stripTags')
				 ->addFilter('stringTrim')
				 ->addValidator('NotEmpty');

    	$is_banned=new Zend_Form_Element_Text('is_banned');
    	$is_banned->setLabel('is_banned')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');
    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','submitbutton');
$submit->setAttrib('class','btn btn-primary');
    	// id | username | email | password | image | 
        //signature | gender | country | is_admin | is_banned
        // | material_id 
    	$this->addElements(array($id,$username, $email, 
    		$password, $image, $signature, $gender,$country,
    		 $is_admin,$is_banned, $submit ));
    }



}

