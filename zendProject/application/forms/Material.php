<?php
use Zend\Form\Element;
use Zend\Form\Form;
class Application_Form_Material extends Zend_Form
{
    public function init()
    {       
        /* Form Elements & Other Definitions Here ... */
  //       $this->setName('Material');

  //       $id=new Zend_Form_Element_Hidden('id');
  //       $id->addFilter('Int');

  //       $name=new Zend_Form_Element_Text('material_name');
  //       $name->addFilter('Int');
  //       $name->setLabel('name');

  //       $user_id=new Zend_Form_Element_Text('user_id');
  //       $user_id->addFilter('Int');
  //       $user_id->setLabel('user_id');

  //       $course_id=new Zend_Form_Element_Text('course_id');
  //       $course_id->addFilter('Int');
  //       $course_id->setLabel('course_id');

  //       $file_path=new Zend_Form_Element_Text('file_path');
  //       $file_path->setLabel('file_path')
  //   			 ->setRequired('true')
  //   			 ->addFilter('stripTags')
  //   			 ->addFilter('stringTrim')
  //   			 ->addValidator('NotEmpty');


  //       $type=new Zend_Form_Element_Text('type');
  //       $type->setLabel('type')
  //   			 ->setRequired('true')
  //   			 ->addFilter('stripTags')
  //   			 ->addFilter('stringTrim')
  //   			 ->addValidator('NotEmpty');

		// $is_downloadable = new Zend_Form_Element_Radio('is_downloadable');
	 //    $is_downloadable->setLabel('Downloadable:')
	 //      ->addMultiOptions(array('1' => 'downloadable',));
		// $is_hidden = new Zend_Form_Element_Radio('is_hidden');
	 //    $is_hidden->setLabel('Hidden:')
  //   	      ->addMultiOptions(array(
  //   	        '1' => 'Hidden',     
	 //      ));

  //       $downloads_count = new Zend_Form_Element_Text('Downloads');
  //       $downloads_count -> setLabel('Downloads');


  //   	$submit=new Zend_Form_Element_Submit('submit');
  //   	$submit->setAttrib('id','submitbutton');
  //   	$this->addElements(array($id, $name, $user_id, $course_id, $file_path, $type, 
  //           $is_downloadable, $is_hidden, $downloads_count, $submit));

            // $id,$name, $file_path, $type,$is_downloadable,
            //          $is_hidden,$downloads_count,$course_id,$user_id

        $name = new Zend_Form_Element_Text('material_name');
        $name->addFilter('Int');
        $name->setLabel('name');

        $type = new Zend_Form_Element_Text('type');
        $type->setLabel('type')
                ->setRequired('true')
                ->addFilter('stripTags')
                ->addFilter('stringTrim')
                ->addValidator('NotEmpty');

        $file = new Zend_Form_Element_File('file');
        $file->setLabel('Upload a file:')
                ->setDestination('upload');

        $file->addValidator('Count', false, 1);
        $file->addValidator('Extension', false, 'mp4,pdf,pptx,docx,jpg,png,gif');

        $this->setAttrib('enctype', 'multipart/form-data');


        $is_downloadable = new Zend_Form_Element_Radio('is_downloadable');
        $is_downloadable->setLabel('Downloadable:')
                        ->addMultiOptions(array('1' => 'downloadable',));

        $is_hidden = new Zend_Form_Element_Radio('is_hidden');
        $is_hidden->setLabel('Hidden:')
                ->addMultiOptions(array(
                '1' => 'Hidden', ));

        $downloads_count = new Zend_Form_Element_Text('Downloads');
        $downloads_count -> setLabel('Downloads');

        $user_id=new Zend_Form_Element_Text('user_id');
        $user_id->addFilter('Int');
        $user_id->setLabel('user_id');

        $course_id=new Zend_Form_Element_Text('course_id');
        $course_id->addFilter('Int');
        $course_id->setLabel('course_id');

        $submit=new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Upload');

        $this->addElements(array($name, $user_id, $course_id, $file, $type, 
                $is_downloadable, $is_hidden, $downloads_count, $submit));


    }
}

