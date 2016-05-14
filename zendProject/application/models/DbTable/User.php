<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getUser($id)
	{
    		$id = (int)$id;
    		$row = $this->fetchRow('id = ' . $id);
    		if (!$row) {
    		  throw new Exception("Could not find row $id");
    		}
    		return $row->toArray();
	}

    //  public function getUser($id)
    // {
    //         $id = (int)$id;
    //         $row = $this->fetchRow('id = ' . $id);
    //         if (!$row) {
    //           throw new Exception("Could not find row $id");
    //         }
    //         return $row->toArray();
            // foreach ($valid as $key => $value) {
            //     if($key=='is_admin'&$value=='1'){

            //     }
            //     # code...
            // }
    //}


    public function addUser($username, $email,$password, $image, $signature,
                              $gender, $country, $is_admin, $is_banned)
    {
        // $row = $this->createRow();
  	     $data = array(
  	    'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'image' => $image,
        'signature' => $signature,
  	    'gender' => $gender,
        'country' => $country,
        'is_admin' => $is_admin,
        'is_banned' => $is_banned,
  	    );
  	    $this->insert($data);
        // return $row->save();
    }

    public function updateUser($id, $username, $gender)
    {
        $data = array(
        'username' => $username,
        'gender' => $gender,
        );
        $this->update($data, 'id = '. (int)$id);
   }

   // public function deleteUser($id)
   // {
   //     return $this->delete('id='.$id);
   // }

    public function deleteUser($id)
    {
        return $this->delete('id='.$id);
    }

    // public function loginUser($userInfo){
    //     $form = new Application_Form_Login();

    //     $db = Zend_Db_Table::getDefaultAdapter();
    //     $authAdapter = new Zend_Auth_Adapter_DbTable($db,'user','email', 'password');
    //     $authAdapter->setIdentity($userInfo['email']);
    //     $authAdapter->setCredential(md5($userInfo['password']));

    //     $result = $authAdapter->authenticate();

    //     if($result->isValid()){

    //         $auth =Zend_Auth::getInstance();
    //         $storage = $auth->getStorage();
    //         $storage->write($authAdapter->getResultRowObject(array('id','email','is_banned','is_admin')));
    //         return 1;
    //     }
    //     else
    //     return 0;
    // }

    public function registerUser($userInfo)
  {
    $row = $this->createRow();
    $row->username = $userInfo['username'];
    $row->email = $userInfo['email'];
    $row->password = md5($userInfo['password']);
    $row->gender = $userInfo['gender'];
    $row->country = $userInfo['country'];

//set a session......
    $db = Zend_Db_Table::getDefaultAdapter();
    $authAdapter = new Zend_Auth_Adapter_DbTable($db,'user','email', 'password');
    $auth =Zend_Auth::getInstance();
    $storage = $auth->getStorage();
    $storage->write($authAdapter->getResultRowObject(array('id','email')));

    return $row->save();
  }
}

