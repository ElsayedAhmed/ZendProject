<?php

class Application_Model_DbTable_Comment extends Zend_Db_Table_Abstract
{

    protected $_name = 'comment';

    public function addComment($material_id, $content){
    // $material_id = $this->getRequest()->getParam('id');
    $data = array(
        'content' => $content,
        'material_id' => $material_id,
      );
    
    $this->insert($data);
    }

    public function updateComment($id, $content, $material_id)
    {
        $data = array('content' => $content,'material_id'=>$material_id);
        $this->update($data, 'id = '. (int)$id);
    }

    public function deleteComment($id)
    {
        return $this->delete('id='.$id);
    }
}

