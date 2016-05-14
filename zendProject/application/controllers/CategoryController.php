<?php
class CategoryController extends Zend_Controller_Action
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
        $categories = new Application_Model_DbTable_Category();
        $this->view->categories = $categories->fetchAll();
    }

    public function addAction()
    {
        $form=new Application_Form_Category();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $name=$form->getValue('name');
                $category=new Application_Model_DbTable_Category();
                $category->addCategory($name);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        $user = new Application_Model_DbTable_Category();
        $id = $this->getRequest()->getParam('id');
        if($user->deleteCategory($id))
            $this->redirect('Category/index');
    }

    public function listAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
        $form=new Application_Form_Category();
        $form->submit->setLabel('Save');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $name=$form->getValue('name');
                $category=new Application_Model_DbTable_Category();
                $category->updateCategory($id,$name);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
             else {
                    $id = $this->_getParam('id', 0);
                    if ($id > 0) {
                    $category = new Application_Model_DbTable_Category();
                    $form->populate($category->getCategory($id));
                 }}
    }


}









