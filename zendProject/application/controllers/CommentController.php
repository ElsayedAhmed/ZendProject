<?php

class CommentController extends Zend_Controller_Action
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
        $comments = new Application_Model_DbTable_Comment();
        $this->view->comments = $comments->fetchAll();
    }

    public function coursesAction(){
        $cat_id = $this->getRequest()->getParam('id');
        $courses = new Application_Model_DbTable_Material();
        $this->view->results = $courses->getComments($material_id);
    }

    public function addAction(){
        $form=new Application_Form_Comment();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $material_id=$form->getValue('material_id');
                $content=$form->getValue('content');

                $comment=new Application_Model_DbTable_Comment();
                $comment->addComment($material_id, $content);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }
}

