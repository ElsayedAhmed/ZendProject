<?php

class Application_Model_DbTable_Course extends Zend_Db_Table_Abstract
{

    protected $_name = 'course';
    public function getCourse($id)
    {
    	// $id=int($id);
    	$row=$this->fetchrow('id = ' . $id);
    	if(!$row){
    		throw new Exception("couldn't find row $id");
    	}
    	return $row->toArray();
    }
    public function addCourse($name,$category_id)
    {   
    	$row = $this->createRow();
    	$row->name="$name";
        //for id
        $row->category_id="$category_id";
    	return $row->save();

    }
    public function deleteCourse($id)
    {
    	$this->delete('id='.(int)$id);
    }

    public function updateCourse($id,$name)
    {   
        $data=array('name' => $name );
    	$this->update($data,'id = '.(int)$id);
    }
}

