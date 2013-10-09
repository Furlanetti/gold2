<?php

App::uses('AppModel', 'Model');

class Brand extends AppModel {
    
    public $name = 'Brand';

    public $hasMany = 'Cases';

    public $validate = array(
        'title' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        )
    );
    
    public function beforeSave(){
        
        $data =& $this->data[$this->name];
        
        $id = $data['id'];
        $field = 'image';

        if(!empty($id)){

            $this->recursive = -1;
            $case = $this->findById($id);

            if($data[$field]['name']) {
                $this->deleteFile($id, $this->table, $field, false);
                $data[$field] = $this->uploadFile($data);
            } else {
                $data[$field] = $case[$this->name][$field];
            }
        }elseif($data[$field]['name']){
            $data[$field] = $this->uploadFile($data);
        }

        else {
            $data[$field] = "";
        }

        return true;
    }

    public function beforeDelete(){
        $this->deleteFile($this->id, $this->table, 'image', false);
    }
}

?>