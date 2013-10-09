<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function uploadFile($data, $field = 'image'){
	

		if (!empty($data[$field]) && is_uploaded_file($data[$field]['tmp_name'])) {

	        $file_info = $data[$field];
	        //$file_name = md5(uniqid(rand(), true) . date('r')) . '_' . $file_info['name'];
	        //$file_name = Inflector::slug($file_name);
	        //$file_name[strrpos($file_name, '_')] = '.';
	        $file_data = explode('.',$file_info['name']);
	        $old_name = $file_data[0];

	        $cont = 1;

	        while(file_exists('files/'.$file_data[0].'.'.$file_data[1])){
	        	$file_data[0] = $old_name.'_'.$cont;
	        	$cont++;
	        }

	        $data[$field] = $file_data[0].'.'.$file_data[1];

	        move_uploaded_file($file_info['tmp_name'], 'files/' . $data[$field]);

	        return $data[$field];

	    } 
	}

    public function deleteFile($id, $table, $field, $update = false, $delete = false){
    	$result = $this->query("SELECT {$field} FROM {$table} WHERE id = '{$id}'");    	
    	$result_field = $result[0][$table][$field];

        if(!empty($result_field)){
            unlink('files/' . $result_field);
            if($update) $this->query("UPDATE {$table} SET {$field} = '' WHERE id = '{$id}'");

            if($delete) $this->query("DELETE FROM {$table} WHERE id = '{$id}'");
        }
    }

    public function createSlug($slug, $table){

    	$cont = 1;    	
    	$slug = $old_slug = Inflector::slug(strtolower($slug), $replacement = '-');    	
    	while($this->slugExists($slug, $table)){
    		$slug = $old_slug.'-'.$cont;
    		$cont++;
    	}

    	return $slug;

    }

    function slugExists($slug, $table){

    	$result = $this->query("SELECT * FROM {$table} WHERE slug = '{$slug}'");

    	if(!empty($result)){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function getVideoType($video){

        if (strpos($video, 'vimeo') !== false){
            return 'vimeo';
        }
        else if (strpos($video, 'youtu') !== false){
            return 'youtube';
        }
        else{
            return false;
        }

    }

    public function getVideoCode($video){
        if(!empty($video)){

            $video = str_replace('http://', '', $video);
            $video = 'http://' . $video;

            $return = '';

           preg_match_all('#(http://youtu.be/)([-|~_0-9A-Za-z]+)#i', $video, $output);
            if(!empty($output[2][0])) $return = $output[2][0];

            preg_match_all('#(http://vimeo.com)/([0-9]+)#i', $video, $output);
            if(!empty($output[2][0])) $return = $output[2][0];
        }

        return $return;
    }
}
