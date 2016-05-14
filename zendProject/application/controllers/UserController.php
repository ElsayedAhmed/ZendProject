<?php

class UserController extends Zend_Controller_Action
{
	private $model = null;

    public function init()
    {
       $this->model = new Application_Model_DbTable_User();
       $this->authorization = Zend_Auth::getInstance();
       //$this->front = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();

       require_once '/var/www/html/zendProject/ZendProject/zendProject/library/Zend/Mail/Transport/Smtp.php';
        $config = array('ssl' => 'tls', 'port' => 587, 'auth' => 'login', 'username' => 'zendprojecteslam@gmail.com', 'password' => 'itiitiiti');
        $smtpConnection = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);



        // $tr = new Zend_Mail_Transport_Smtp('smpt.gmail.com', $config);
        Zend_Mail::setDefaultTransport($smtpConnection);
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


   #sarah
    public function registerAction()
    {
        $form = new Application_Form_Register();
        $sess = new Zend_Session_Namespace('LikeLynda');
        $this->view->form = $form;

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                #session
                $sess->username = $data['username'];

                if ($this->model->registerUser($data)){
                    #send mail
                    $this->mail = new Zend_Mail();
                    $this->mail->setBodyText('Thanks '.$data['username']. ' for joining us 
                        . your email address: '. $data['email']. ' Gender: '. $data['gender']. ' Country: '. $data['country'])
                    ->setFrom('zendprojecteslam@gmail.com', 'Zend SLMS')
                    ->addTo($data['email'], $data['username'])
                    ->setSubject('ZEND SLMS New Account')
                    ->send();

                    $this->redirect('user/index');
                }

            }
        }
    }

    #sarah
    public function profileAction()
    {
        // $form = new Application_Form_Profile();
        // $this->view->form = $form;
        // if($this->getRequest()->isPost()){
            // if($form->isValid($this->getRequest()->getParams())){
                // $data = $form->getValues();

                #get user info
        $old = $this->model->getprofile();
        $form = new Application_Form_Profile();
        $this->view->form = $form;
        $this->view->img = $old[0]['image'];
        // var_dump($this->view->img);
        // die;
        $form->populate($old[0]); 



    }

    #sarah
    public function editprofileAction()
    {
        $form = new Application_Form_Editprofile();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                if ($this->model->setprofile($data)){
                    $this->redirect('user/index');
                }

                // var_dump($old['username']);
                // die;
            }
        }
    }
    


}

