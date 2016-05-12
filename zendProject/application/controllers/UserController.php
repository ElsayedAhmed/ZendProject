<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    #sarah
    public function registerAction()
    {
        $form = new Application_Form_Register();
        $this->view->form = $form;

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
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

