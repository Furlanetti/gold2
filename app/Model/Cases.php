<?php

App::uses('AppModel', 'Model');

class Cases extends AppModel {
    
    public $name = 'Cases';  

    public $hasMany = array('CaseExpertise' => array('dependent' => true));

    public $belongsTo = array('Brand');

    public $validate = array(
        'title' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            ) 
        ),
        'video' => array(
            array(
                'rule'    => array('videoValidation'),
                'message' => 'Digite um link válido'
            ) 
        )
    );

    public function afterFind($results){

        foreach ($results as $key => $val) {
            // empty
        }

        return $results;

    }

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
        } elseif($data[$field]['name']){
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

    public function getOneVideoInformation($data){

        if(!empty($data['Cases']['video'])) {
            $video_data = $this->getVideoInformation($val['Cases']['video']);

            $data['Cases']['video_code'] = $video_data['video_code'];
            $data['Cases']['video_type'] = $video_data['video_type'];
            $data['Cases']['video_image'] = $video_data['video_image'];
        }

        return $data;
        
    }

    public function getArrayVideoInformation($results){

        foreach ($results as $key => $val) {
            if(!empty($val['Cases']['video'])) {
                $video_data = $this->getVideoInformation($val['Cases']['video']);

                $results[$key]['Cases']['video_code'] = $video_data['video_code'];
                $results[$key]['Cases']['video_type'] = $video_data['video_type'];
                $results[$key]['Cases']['video_image'] = $video_data['video_image'];
            }
        }

        return $results;
        
    }

    public function getVideoInformation($video){

        $video_code = $this->getVideoCode($video);
        $video_type = $this->getVideoType($video);

        if($video_type == 'youtube') {
            $video_image = "http://img.youtube.com/vi/{$video_code}/0.jpg";
        } elseif($video_type == 'vimeo') {
            $vimeo_array = json_decode(file_get_contents("http://vimeo.com/api/v2/video/{$video_code}.json"));
            $video_image = $vimeo_array[0]->thumbnail_large; 
        }

        $return['video_code'] = $video_code;
        $return['video_type'] = $video_type;
        $return['video_image'] = $video_image;

        return $return;
        
    }

    public function videoValidation(){
        $video = $this->data['Cases']['video'];
        $video = str_replace('http://', '', $video);
        $video = 'http://' . $video;
            
        $return = true;

        if(!empty($video)){
            $return = false;

           preg_match_all('#(http://youtu.be/)([-|~_0-9A-Za-z]+)#i', $video, $output);
            if(!empty($output[2][0])) $return = true;

            preg_match_all('#(http://vimeo.com)/([0-9]+)#i', $video, $output);
            if(!empty($output[2][0])) $return = true;
        }

        return $return;
    }
}

?>