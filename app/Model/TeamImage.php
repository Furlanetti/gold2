<?php

class TeamImage extends AppModel {
	
	public $name = 'TeamImage';

	public $belongsTo = array('Team');

	public $validate = array();

	public function beforeSave(){

        $data =& $this->data;   

        $field = 'image';

        if(!empty($data['TeamImage']['id'])){
            $id = $data['TeamImage']['id'];

            $this->recursive = -1;
            $teamimage = $this->findById($id);

            if($data['TeamImage'][$field]['name']) {
                $this->deleteFile($id, $this->table, $field, false);
                $data['TeamImage'][$field] = $this->uploadFile($data['TeamImage']);
            } else {
                $data['TeamImage'][$field] = $teamimage[$this->name][$field];
            }
        } else {
            $data['TeamImage'][$field] = $this->uploadFile($this->data['TeamImage']);
        }
        
        return true;
    }

    public function beforeDelete($cascade = true){

    	$this->deleteFile($this->id, $this->table, 'image');

    }

}