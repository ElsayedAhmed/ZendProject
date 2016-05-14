<?php
class AdminController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
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
        $user = new Application_Model_DbTable_User();
        $id = $this->getRequest()->getParam('id');
        if($user->deleteUser($id))
            $this->redirect('Admin/index');
    }

    public function listAction()
    {

    }

    public function banAction($id){
        $user = new Application_Model_DbTable_User(); 
        $id = $this->getRequest()->getParam('id');
        $user->banUser($id);
        $this->redirect('Admin/index');

    }
    public function allowAction($id){
        $user = new Application_Model_DbTable_User(); 
        $id = $this->getRequest()->getParam('id');
        $user->allowUser($id);
        $this->redirect('Admin/index');

    }
    public function upgradeAction($id){
        $user = new Application_Model_DbTable_User(); 
        $id = $this->getRequest()->getParam('id');
        $user->upgradeUser($id);
        $this->redirect('Admin/index');

    }

    public function degradeAction($id){
        $user = new Application_Model_DbTable_User(); 
        $id = $this->getRequest()->getParam('id');
        $user->degradeUser($id);
        $this->redirect('Admin/index');

    }

  
    public function editAction()
    {
        $form=new Application_Form_User();
        $form->submit->setLabel('Edit');
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

                $user->updateUser($id,$username, $email,$password,
                $image, $signature, $gender, $country, $is_admin, $is_banned);
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
             }
         }
    }
}









