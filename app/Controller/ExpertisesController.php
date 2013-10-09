<?php

class ExpertisesController extends AppController {

    public $name = 'Expertises';

    public $uses = array('Expertise', 'Company', 'Cases');

    /* Other vars */

    public $page_title = '{title} - ';

    public function beforeFilter(){

        parent::beforeFilter();        

    }

    public function index(){
            
        $this->set('layout', 'custom');

        $this->Company->recursive = -1;
        $companies = $this->Company->find('all');
        $this->set('companies', $companies);

        $this->Company->recursive = 2;
        $company = $this->Company->findBySlug($this->params['slug']);
        $this->set('company', $company['Company']);
        $this->set('team', (!empty($company['Team']) ? $company['Team'] : array()));
        $this->set('slug', $this->params['slug']);

        $company_title = $company['Company']['page_title'];
        $page_title = ($this->params['slug'] == 'grupo-focusnetworks') ? 'Todas as Expertises' : 'Expertises - '. $company_title;
        $this->set('page_title', str_replace('{title}', $page_title, $this->page_title));

    }

    public function ux(){

        $this->set('layout', 'custom');

        $this->Cases->recursive = 0;
        $others = $this->Cases->find('all', array('limit' => 2, 'orderby' => 'rand()'));
        $this->set('others', $others);

        $this->set('first_access', $this->Expertise->checkAccess());

    }

}