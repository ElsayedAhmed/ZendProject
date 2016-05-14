<?php

class CourseController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $authorization =Zend_Auth::getInstance();
        if(!($authorization->hasIdentity())) {
            $this->redirect('user/login');
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        // action body
        $form=new Application_Form_Course();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            // echo($this->getRequest()->getParam('id')) ;
            $formData=$this->getRequest()->getPost();
            // echo "$form";
            if($form->isValid($formData)){
                $coursename=$form->getValue('name');
                // echo "$coursename";
                $category_id=$this->getRequest()->getParam('id');
                // $category_id=$form->getValue('id');
                $course=new Application_Model_DbTable_Course();
                $course->addCourse($coursename,$category_id);
                $this->_helper->redirector('index');

            }
             else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        // action body
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $course = new Application_Model_DbTable_Course();
                $course->deleteCourse($id);
                }
                $this->_helper->redirector('index');
                } else {
                    $id = $this->_getParam('id', 0);
                    $course = new Application_Model_DbTable_Course();
                    //edited
                    $this->view->course = $course->getCourse($id);
                }
      
    }

    public function editAction()
    {
        // action body
        $form=new Application_Form_Course();
        $form->submit->setLabel('Edit');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $id = (int)$form->getValue('id');
                $coursename=$form->getValue('name');
                $course=new Application_Model_DbTable_Course();
                $course->updateCourse($id,$coursename);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }else {
                $id = $this->_getParam('id', 0);
                if ($id > 0) {
                $course = new Application_Model_DbTable_Course();
                $form->populate($course->getCourse($id));
             }
         }
    }


}







