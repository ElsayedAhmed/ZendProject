<?php

class UserController extends Zend_Controller_Action
{
	private $model = null;

    public function init()
    {
       $this->model = new Application_Model_DbTable_User();
       $this->authorization =Zend_Auth::getInstance();
    }

    public function indexAction()
    {
        // action body
    }


    public function loginAction()
    {
        if($this->authorization->hasIdentity()) {
            $this->redirect('user/index');
        }

        $form = new Application_Form_Login();

    //if request is post......
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getParams())) {
                $data = $form->getValues();
            }
            if(!$this->model->loginUser($data)){
                echo "<p><font size='4' color='red'><b>Invalid Username OR Password</b></font</p>";
                $this->view->form = $form;
                
            }
            if($this->model->loginUser($data)){
               $this->redirect('user/index'); 
            }
        }
        else{
            $this->view->form = $form;
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

