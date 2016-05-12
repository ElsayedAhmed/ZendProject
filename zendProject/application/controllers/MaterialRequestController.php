<?php

class MaterialRequestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->model = new Application_Model_DbTable_MaterialRequest();
    }

    public function indexAction()
    {
        // action body
    }

    #sarah
    public function requestAction()
    {
    	$form = new Application_Form_Request();
        $this->view->form = $form;

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getParams())){
                $data = $form->getValues();
                if ($this->model->requestMaterial($data)){

                    $this->redirect('user/index');
                }

            }
        }
    }


}

