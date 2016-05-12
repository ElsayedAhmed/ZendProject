<?php

class UserMaterialRequestController extends Zend_Controller_Action
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
    }


}

