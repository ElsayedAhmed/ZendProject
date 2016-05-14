<?php

class AdminController extends Zend_Controller_Action
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
        $users = new Application_Model_DbTable_User();
        $this->view->user = $users->fetchAll();
    }

    public function addAction()
    {
        $form=new Application_Form_User();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
 
                $username=$form->getValue('username');
                $email=$form->getValue('email');
                $password=$form->getValue('password');
                $image=$form->getValue('image');
                $gender=$form->getValue('gender');
                $signature=$form->getValue('signature');
                $country=$form->getValue('country');
                $is_admin=$form->getValue('is_admin');
                $is_banned=$form->getValue('is_banned');

                $user=new Application_Model_DbTable_User();
                $user->addUser($username,$email, $password, $image, $signature, $gender, $is_admin, $is_banned);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $user = new Application_Model_DbTable_User();
                $user->deleteUser($id);
                }
                $this->_helper->redirector('index');
                } else {
                    $id = $this->_getParam('id', 0);
                    $user = new Application_Model_DbTable_User();
                    //edited
                    $this->view->user = $user->getUser($id);
                    }

    }

    public function listAction()
    {
        // action body
    }


        public function editAction()
    {
        $form=new Application_Form_User();
        $form->submit->setLabel('Save');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $id = (int)$form->getValue('id');
                $username=$form->getValue('username');
                $email=$form->getValue('email');
                $password=$form->getValue('password');
                $image=$form->getValue('image');
                $signature=$form->getValue('signature');
                $gender=$form->getValue('gender');
                $country=$form->getValue('country');
                $is_admin=$form->getValue('is_admin');
                $is_banned=$form->getValue('is_banned');

                $user=new Application_Model_DbTable_User();
                $user->updateUser($id,$username, $email,$password, $image, $signature,
                       $gender, $country, $is_admin, $is_banned);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
            $user = new Application_Model_DbTable_User();
            $form->populate($user->getUser($id));
        }}
    }
}









