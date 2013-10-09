<?php

class HomeController extends AppController {

    public $name = 'Home';

    public $uses = array('Company', 'Social');

    public function beforeFilter(){

        parent::beforeFilter();
        $this->set('layout', 'custom');

    }

    public function index(){

    	$this->Company->recursive = -1;
    	$companies = $this->Company->find('all');
    	$this->set('companies', $companies); 

        $slug = 'grupo-focusnetworks';
        $company = $this->Company->findBySlug($slug);

        if ($company['Company']['video']){

            $videoCode = $this->Company->getVideoCode($company['Company']['video']);
            $this->set('videoCode', $videoCode);

            $typeVideo = $this->Company->getVideoType($company['Company']['video']);
            $this->set('typeVideo', $typeVideo);
            
        }

        $this->set('company', $company['Company']);
        $this->set('custom_controller', "o-grupo");

        #$slideshare = $this->Social->getSlideshare();
        #$this->set('slideshare', $slideshare);     

    }

}