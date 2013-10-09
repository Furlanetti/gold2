<?php

App::uses('AuthComponent', 'Controller/Component');

class Company extends AppModel {
    
    public $name = 'Company';

    public $hasMany = array('CaseExpertise', 'Team');

    public $useTable = "companies";

    public function afterFind($results){

    	foreach ($results as $key => $val) {

    		if(!empty($val['Company']['name']))
            	$results[$key]['Company']['name'] = utf8_encode($val['Company']['name']);
    		if(!empty($val['Company']['page_title']))
            	$results[$key]['Company']['page_title'] = utf8_encode($val['Company']['page_title']);
            if(!empty($val['Company']['description']))
                $results[$key]['Company']['description'] = utf8_encode($val['Company']['description']);
            if(!empty($val['Company']['video']))
                $results[$key]['Company']['video_code'] = $this->getVideoCode($val['Company']['video']);
        }

    	return $results;

    }
   
}

?>