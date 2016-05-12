<?php

class UserController extends Zend_Controller_Action
{
	private $model = null;

    public function init()
    {
       $this->model = new Application_Model_DbTable_User();
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $form = new Application_Form_Login();

    //if request is post......
        if ($this->getRequest()->isPost()) {
        	// var_dump($form->isValid($this->getRequest()->getParams()));
        	// die;
            if ($form->isValid($this->getRequest()->getParams())) {
                $data = $form->getValues();
            }
            $this->model->loginUser($data);
                $this->redirect('user/index');
        }

    //if request isn't post......
        $this->view->form = $form;
    }


}

