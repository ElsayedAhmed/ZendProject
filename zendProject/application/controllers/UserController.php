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


    public function registerAction()
    {
        $form = new Application_Form_Register();
        $sess = new Zend_Session_Namespace('LikeLynda');
        $this->view->form = $form;
        #session
        $sess->username = $data['username'];

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

