<?php

class ContactBusiness extends AppModel {
	
	public $name = 'ContactBusiness';
	
	public $hasMany = array('ContactBusinessFiles' => array('dependent' => true, 'foreignKey' => 'contact_business_id'));
	

}