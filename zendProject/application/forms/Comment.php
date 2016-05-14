<?php
  use Zend\Form\Element;
  use Zend\Form\Form;
class Application_Form_Comment extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('category');
        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $content=new Zend_Form_Element_Text('content');
        $content->setLabel('content')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');

    	$material_id=new Zend_Form_Element_Text('material_id');
        $material_id->setLabel('material_id')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');

    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','content', 'material_id','submitbutton');

    	$this->addElements(array($id,$content,$material_id, $submit));
    }
}

