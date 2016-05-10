<?php
  use Zend\Form\Element;
  use Zend\Form\Form;
class Application_Form_Category extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('category');
        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $name=new Zend_Form_Element_Text('name');
        $name->setLabel('name')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');
    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','name','submitbutton');

    	$this->addElements(array($id,$name, $submit));
    }
}

