<?php

class CompaniesController extends AppController {

    public $name = 'Companies';

    public $uses = array('Company', 'Social');

    /* Other vars */

    public $page_title = '{title} - ';

    public function beforeFilter(){

        parent::beforeFilter();
        $this->set('layout', 'custom');

    }

    public function index(){

    	$this->Company->recursive = -1;
    	$companies = $this->Company->find('all');
    	$this->set('companies', $companies);

    	$this->Company->recursive = 2;
    	$company = $this->Company->findBySlug($this->params['slug']);
    	$this->set('company', $company['Company']);
    	$this->set('team', (!empty($company['Team']) ? $company['Team'] : array()));
        $this->set('slug', $this->params['slug']);
        $this->set('custom_controller', "o-grupo");

    	$this->set('page_title', str_replace('{title}', $company['Company']['page_title'], $this->page_title));
        $this->set('page_color', 'light');   

        /*$slideshare = $this->Social->getSlideshare();
        $this->set('slideshare', $slideshare);*/

    }

}