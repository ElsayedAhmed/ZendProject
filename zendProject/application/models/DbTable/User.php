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

#sarah
  public function registerUser($userInfo)
  {
    $row = $this->createRow();
    $row->username = $userInfo['username'];
    $row->email = $userInfo['email'];
    $row->password = md5($userInfo['password']);
    $row->gender = $userInfo['gender'];
    $row->country = $userInfo['country'];

    return $row->save();
  }
}