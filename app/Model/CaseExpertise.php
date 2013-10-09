<?php

class CaseExpertise extends AppModel {
	
	public $name = 'CaseExpertise';

	public $belongsTo = array('Cases', 'Company');

}