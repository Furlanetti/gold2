<?php

App::uses('AppController', 'Controller');

class SocialController extends AppController {

    public $name = 'Social';

    public $uses = array('Social');

    public $helpers = array('Cache');

    /* Others vars */

    //public $cacheAction = USE_CACHE;

    function facebook(){

        print_r($this->Social->getFacebook());

    }

    function twitter(){
            
        print_r($this->Social->getTwitter());

    }

    function youtube(){
        
        print_r($this->Social->getYoutube());

    }

    function google_plus(){
        
        print_r($this->Social->getPlusCount());

    }

    function slideshare(){

        print_r($this->Social->getSlideshare());

    }

    function blog_focusnetworks(){
        
        print_r($this->Social->getBlogFocusnetworks());

    }

}