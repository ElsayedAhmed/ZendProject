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
    $request = $this->getRequest();
        $form = new Application_Form_Login();
        if ($request->isPost()) {
            if ($form->isValid($request->getParams())) {
        $email= $this->_request->getParam('email');
        $password= $this->_request->getParam('password');
        // get the default db adapter
        $db =Zend_Db_Table::getDefaultAdapter();
        //create the auth adapter
        $authAdapter = new Zend_Auth_Adapter_DbTable($db,'user','email', 'password','is_admin','is_banned');
        //set the email and password
        $authAdapter->setIdentity($email);
        // $authAdapter->setIdentity($is_banned);
        // $authAdapter->setIdentity($email);
        $authAdapter->setCredential(md5($password));
        //authenticate
        $result = $authAdapter->authenticate();
        if ($result->isValid()) {
            $auth =Zend_Auth::getInstance();
            $storage = $auth->getStorage();
            $storage->write($authAdapter->getResultRowObject(array( 'id' , 'email','')));
                            $this->_helper->redirector('index');
        }else{
            $this->redirect('users/login');
        }
    }
}



}

