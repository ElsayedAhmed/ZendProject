<?php

class Application_Model_DbTable_MaterialRequest extends Zend_Db_Table_Abstract
{

	protected $_name = 'material_request';
#sarah
	public function requestMaterial($message)
	{
		$sess = new Zend_Session_Namespace('LikeLynda');

		$row = $this->createRow();
		$row->content = $message['message'];

		$db =Zend_Db_Table_Abstract::getDefaultAdapter();
		$sql =    "select id from user where username = '$sess->username'";
		$stmt = $db->query($sql);
		$id =  $stmt->fetchAll();
		$row->user_id = $id[0]['id'];

		return $row->save();
	}
}

