<?php

class MaterialController extends Zend_Controller_Action
{

    public function init()
    {
        $authorization =Zend_Auth::getInstance();
        if(!($authorization->hasIdentity())) {
            $this->redirect('user/login');
        }
    }

    public function indexAction()
    {
        // action body
        $material = new Application_Model_DbTable_Material();
        $this->view->materials = $material->fetchAll();
    }

    public function addAction()
    {
        $form=new Application_Form_Material();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $name=$form->getValue('name');
                $file_path=$form->getValue('file_path');
                $type=$form->getValue('type');
                $is_downloadable=$form->getValue('is_downloadable');
                $is_hidden=$form->getValue('is_hidden');
                $downloads_count=$form->getValue('downloads_count');
                $course_id=$form->getValue('course_id');
                $user_id=$form->getValue('user_id');

                $user=new Application_Model_DbTable_Material();
                $user->addMaterial($name, $user_id,$course_id, $file_path, $type,
                    $is_downloadable, $is_hidden, $downloads_count);
                    // addMaterial(NULL, 'ghguu', 'huu', '1', '1', NULL, 0, 0)
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        $user = new Application_Model_DbTable_Material();
        $id = $this->getRequest()->getParam('id');
        if($user->deleteMaterial($id))
            $this->redirect('Material/index');
    }

    public function listAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


}






