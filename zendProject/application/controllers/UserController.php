<?php

class UserController extends Zend_Controller_Action
{
	private $model = null;

    public function init()
    {
       $this->model = new Application_Model_DbTable_User();
       $this->authorization = Zend_Auth::getInstance();
       //$this->front = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
    }

    public function indexAction()
    {
        // action body
    }
    
      public function loginAction()
    {   
        $request = $this->getRequest();
        $form = new Application_Form_Login();
        if ($request->isPost()) {
            if ($form->isValid($request->getParams()))
            {
                $email= $this->_request->getParam('email');
                $password= $this->_request->getParam('password');
                $db =Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($db,'user','email', 'password');
                $authAdapter->setIdentity($email);
                $authAdapter->setCredential(md5($password));
                $result = $authAdapter->authenticate();
                if ($result->isValid()) {
                    $auth =Zend_Auth::getInstance();
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array( 'id' , 'email')));
                    if($auth->hasIdentity()) {
                        $id=$auth->getIdentity()->id;
                        $user=new Application_Model_DbTable_User();
                        $row=$user->getUser($id);
                        if($row['is_admin']==1) {
                            echo "welcome";
                            $this->redirect('admin/index');
                        }
                        elseif ($row['is_admin']==0&&$row['is_banned']==1)
                        {
                            $this->render('index');
                        }
                        elseif ($row['is_admin']==0&&$row['is_banned']==0) {
                            $this->render('home');
                        }

        }
    }else{
            $this->redirect('user/login');
        }
    }
}
            $this->view->form=$form;
}

    
    public function logoutAction()
    {
    $auth = Zend_Auth::getInstance();
    if($auth->hasIdentity())
    {
        echo "string";
        $auth->clearIdentity();
        $this->render('logout');
    }
}


    
    public function registerAction()
    {
    //chech if session.....
        if($this->authorization->hasIdentity()) {
            $this->redirect('user/index');
        }

        $form = new Application_Form_Register();
        // $sess = new Zend_Session_Namespace('LikeLynda');
        $this->view->form = $form;
        #session
        // $sess->username = $data['username'];

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                #session
                $sess->username = $data['username'];

                if ($this->model->registerUser($data)){
                    // #send mail
                    // $config = array('ssl' => 'tls',
                    //     'auth' => 'login',
                    //     'username' => 'sarah.zeftawy@gmail.com',
                    //     'password' => '');

                    // $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

                    // $mail = new Zend_Mail();
                    // $mail->setBodyHtml($bodytext);
                    // $mail->setFrom('sarah.zeftawy@gmail.com');
                    // $mail->addTo($data['email'], 'LikeLynda User');
                    // $mail->setSubject('Profile Activation');
                    // $mail->send($transport);

                    $this->redirect('user/index');
                }

            }
        }

    }


}

