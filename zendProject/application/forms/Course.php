<?php

class Application_Form_Course extends Zend_Form
{

    public function init()
    {
    	$this->setName('course');
        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        // $category_id=new Zend_Form_Element_Hidden('id');
        // $category_id->addFilter('Int');


        
        $coursename=new Zend_Form_Element_Text('name');
        $coursename->setLabel('courseName')
    			   ->setRequired('true')
    			   ->addFilter('stripTags')
    			   ->addFilter('stringTrim')
<<<<<<< HEAD
    			   ->addValidator('NotEmpty');
    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','submitbutton');
    	$this->addElements(array($id,$coursename,$submit)); 



    }


=======
    			   ->addValidator('NotEmpty')
                   ->setAttrib("class", "col-xs-4 col-md-2");

    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','submitbutton btn btn-primary');
    	$this->addElements(array($id,$coursename,$submit)); 
    }
>>>>>>> 5b6bce278965238f798a0f08c68c4a2722136eb3
}
