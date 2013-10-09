<?php

class ContactBusinessFiles extends AppModel {
	
	public $name = 'ContactBusinessFiles';
	
	public $belongsTo = array('ContactBusiness' => array('foreignKey' => 'contact_business_id'));

	public function beforeSave(){

        $data =& $this->data;   

        $field = 'file';       

        if(!empty($data['ContactBusinessFiles']['id'])){
            $id = $data['ContactBusinessFiles']['id'];

            $this->recursive = -1;
            $contactfile = $this->findById($id);

            if($data['ContactBusinessFiles'][$field]['name']) {                            
                                      
                $this->deleteFile($id, $this->table, $field, false);
                $data['ContactBusinessFiles'][$field] = $this->uploadFile($data['ContactBusinessFiles'], 'file');                

            }else {
                $data['ContactBusinessFiles'][$field] = $contactfile[$this->name][$field];
            }

        } else {
            
            $data['ContactBusinessFiles'][$field] = $this->uploadFile($this->data['ContactBusinessFiles'], 'file');
        }
        
        return true;
    }

    public function beforeDelete($cascade = true){

    	$this->deleteFile($this->id, $this->table, 'file');

    }
	

}