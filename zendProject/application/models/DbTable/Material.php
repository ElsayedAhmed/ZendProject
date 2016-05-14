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

    public function addMaterial($id,$name, $file_path, $type,$is_downloadable,
    			 $is_hidden,$downloads_count,$course_id,$user_id)
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
        
	      $this->insert($data);
    }

    public function hideMaterial($id){
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        $old_data = $row;
        $new_data = array(
            'user_id' => $old_data['user_id'],
            'course_id' => $old_data['course_id'],
            'file_path' => $old_data['file_path'],
            'type' => $old_data['type'],
            'is_downloadable' => $old_data['is_downloadable'],
            'is_hidden' => 1,
            'downloads_count' => $old_data['downloads_count'], ) ;
        $this->update($new_data, 'id = '. (int)$id);
    }

     public function showMaterial($id){
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        $old_data = $row;
        $new_data = array(
            'user_id' => $old_data['user_id'],
            'course_id' => $old_data['course_id'],
            'file_path' => $old_data['file_path'],
            'type' => $old_data['type'],
            'is_downloadable' => $old_data['is_downloadable'],
            'is_hidden' => 0,
            'downloads_count' => $old_data['downloads_count'], ) ;
        $this->update($new_data, 'id = '. (int)$id);
    }

      public function undownloadMaterial($id){
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        $old_data = $row;
        $new_data = array(
            'user_id' => $old_data['user_id'],
            'course_id' => $old_data['course_id'],
            'file_path' => $old_data['file_path'],
            'type' => $old_data['type'],
            'is_downloadable' => 0,
            'is_hidden' => $old_data['is_hidden'],
            'downloads_count' => $old_data['downloads_count'], ) ;
        $this->update($new_data, 'id = '. (int)$id);
    }

    public function downloadMaterial($id){
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        $old_data = $row;
        $new_data = array(
            'user_id' => $old_data['user_id'],
            'course_id' => $old_data['course_id'],
            'file_path' => $old_data['file_path'],
            'type' => $old_data['type'],
            'is_downloadable' => 1,
            'is_hidden' => $old_data['is_hidden'],
            'downloads_count' => $old_data['downloads_count'], ) ;
        $this->update($new_data, 'id = '. (int)$id);
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

    public function coursesAction(){
         $cat_id = $this->getRequest()->getParam('id');
         $courses = new Application_Model_DbTable_Category();
         $this->view->results = $courses->getCourses($cat_id);
    }
  
    public function comments($material_id){
        $select = $this->_db->select()
                ->from(array('material'=>'material'),array('*'))
                ->join(array('comment'=>'comment'),'material.id=comment.material_id',array('*'))
                ->where('material.id=?',$material_id);

        $results = $this->getAdapter()->fetchAll($select);
        // $results = [10, 20, 30];        
        // return $results;
        Zend_Debug::dump($results);
    }

}