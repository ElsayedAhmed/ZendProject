<?php

class Application_Model_DbTable_Category extends Zend_Db_Table_Abstract
{

    protected $_name = 'category';

    public function getCategory($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
		throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}

    // public function getCategoryCourses($id){
    //     $id = (int)$id;


    // }
    public function addCategory($name)
    {
   	    $data = array('name' => $name);
	    $this->insert($data);
    }

    public function updateCategory($id, $name)
    {
        $data = array('name' => $name,);
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteCategory($id)
    {
        return $this->delete('id='.$id);
    }

    public function getCourses($category_id){
        $select = $this->_db->select()
                ->from(array('category'=>'category'),array('*'))
                ->join(array('course'=>'course'),'category.id=course.category_id',array('*'))
                ->where('category.id=?',$category_id);

        $results = $this->getAdapter()->fetchAll($select);
        // $results = [10, 20, 30];        
        return $results;
        // Zend_Debug::dump($results);
    }
}