<?php

class Application_Model_DbTable_Material extends Zend_Db_Table_Abstract
{

    protected $_name = 'material';

    public function getmaterial($id)
	  {
    		$id = (int)$id;
    		$row = $this->fetchRow('id = ' . $id);
    		if (!$row) {
    		throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}

    public function addMaterial($name, $user_id, $course_id, $file_path, $type,
                    $is_downloadable, $is_hidden, $downloads_count)
    {
        $row = $this->createRow();
        $row->name = $name;
        $row->user_id = $user_id;
        $row->course_id = $course_id;
        $row->file_path = $file_path;
        $row->type = $type;
        $row->is_downloadable = $is_downloadable;
        $row->is_hidden = $is_hidden;
        $row->downloads_count = $downloads_count;
        
        return $row->save();
   	    // $data = array(
        //     'name' => $name,
        //     'user_id' => $user_id,
        //     'course_id' => $course_id,
        //     'file_path' => $file_path,
        //     'type' => $type,
        //     'is_downloadable' => $is_downloadable,
        //     'is_hidden' => $is_hidden,
        //     'downloads_count' => $downloads_count,
   	    // 	);

          // 'controller' => 'Material',
          // 'action' => 'add',
          // 'module' => 'default',
          // 'id' => '0',
          // 'user_id' => '0',
          // 'course_id' => '0',
          // 'file_path' => '878',
          // 'type' => '7897',
          // 'is_downloadable' => '1',
          // 'is_hidden' => '1',
          // 'Downloads' => '8',
          // 'submit' => 'Add',
        
	      // $this->insert($data);
    }

    public function updateMaterial($id,$name, $file_path, $type,$is_downloadable,
           $is_hidden,$downloads_count,$course_id, $user_id)
    {
        $data = array(
              'name' => $name,
       	    	'file_path' => $file_path,
       	    	'type' => $type,
       	    	'is_downloadable' => $is_downloadable,
       	    	'is_hidden' => $is_hidden,
       	    	'downloads_count' => $downloads_count,
       	    	'course_id' => $course_id,
       	    	'user_id' => $user_id,
   	    	);
        $this->update($data, 'id = '. (int)$id);
   }

    public function deleteMaterial($id)
    {
        return $this->delete('id='.$id);
    }

    public function detailsMaterial($id){
        $row = $this->fetchRow('id = ' . $id);
        return $row->toArray();
        
        // $select = $this->select('*')->setIntegrityCheck(false)->join('comments','posts.id = comments.post_id',array('*'=>'*', 'comment_id'=>'comments.id', 'comment_content'=>'comments.content'));
        // return $this->fetchAll($select)->toArray();
    }
}