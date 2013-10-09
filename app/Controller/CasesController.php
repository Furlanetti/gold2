<?php

class CasesController extends AppController {

    public $name = 'Cases';

    public $uses = array('Cases', 'Brand', 'Company', 'CaseExpertise');

    /* Other vars */

    public $page_title = '{title} - ';

	public $breadcrumb = array(array('name' => 'Cases', 'url' => 'cases/'));

    public function beforeFilter(){

        parent::beforeFilter();
        $this->set('layout', 'custom');

    }

   public function index(){


        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));        
        $this->set('menus', $menus);

        $this->Brand->recursive = 0;
        $brands = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));
        $this->set('brands', $brands);        

        $this->Cases->recursive = 0;
        $others = $this->Cases->find('all', array('limit' => 6, 'order' => 'rand()'));
        $this->set('others', $this->Cases->getArrayVideoInformation($others));

        $this->set('page_title', str_replace('{title}', 'Cases', $this->page_title)); 
        $this->set('page_color', 'light');   
        
   }

   public function view(){

        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));        
        $this->set('menus', $menus);

        $this->Brand->recursive = 0;
        $brands = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));
        $this->set('brands', $brands);    

            
        $case = $this->Cases->findBySlug($this->params->slug);
        //$case = $this->Cases->findById(5);
        $this->set('case', $case);

        if ($case['Cases']['video']){

            $videoCode = $this->Cases->getVideoCode($case['Cases']['video']);
            $this->set('videoCode', $videoCode);

            $typeVideo = $this->Cases->getVideoType($case['Cases']['video']);
            $this->set('typeVideo', $typeVideo);
            
        }        
        
        $others = $this->Cases->find('all', array('limit' => 3, 'order' => 'rand()', 'conditions' => array('Cases.id !=' => $case['Cases']['id'])));
        $this->set('others', $this->Cases->getArrayVideoInformation($others));

        $this->set('page_title', str_replace('{title}', $case['Cases']['title'] . ' - Case', $this->page_title)); 
        $this->set('page_color', 'light');   


   }

   public function all(){

        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));        
        $this->set('menus', $menus);

        $this->Cases->recursive = 0;
        $cases = $this->Cases->find('all');
        $this->set('cases', $cases);

        $this->Brand->recursive = 0;
        $brands = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));
        $this->set('brands', $brands);        

        $this->Cases->recursive = 0;
        $others = $this->Cases->find('all');
        $this->set('others', $others);
        
        $this->set('page_title', str_replace('{title}', $case['Cases']['title'] . ' - Case', $this->page_title)); 
        $this->set('page_color', 'light');   

   }

   public function images(){

        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));        
        $this->set('menus', $menus);

        $this->Brand->recursive = 0;
        $brands = $this->Brand->find('all', array('conditions' => array('Brand.featured = 1')));
        $this->set('brands', $brands);       
        
        $this->set('page_title', str_replace('{title}', 'Imagens dos Cases - Pinterest', $this->page_title)); 
        $this->set('page_color', 'light');   

   }


    public function admin_index() {
        $this->Cases->recursive = -1;

        $cases = $this->Cases->find('all');
        $this->set('cases', $cases);	
        
    	$this->set('breadcrumb', $this->breadcrumb);         
    }


    public function admin_new() {
    	array_push($this->breadcrumb, array('name' => 'Adicionar Case'));
    	$this->set('breadcrumb', $this->breadcrumb);   

        $brands = $this->Brand->find('list', array('order' => 'title'));
        $this->set('brands', $brands);

        $this->Company->recursive = -1;
        $companies = $this->Company->find('all', array('conditions' => array('Company.id !=' => '1')));
        $this->set('companies', $companies);

        if ($this->request->is('post')) {
            $this->Cases->create();
            $data = $this->request->data;
            $data['Cases']['slug'] = $this->Cases->createSlug($data['Cases']['title'], 'cases');

            if ($this->Cases->saveAll($data)) {
               $this->Session->setFlash('A case foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O case não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        array_push($this->breadcrumb, array('name' => 'Editar Case'));        
        $this->set('breadcrumb', $this->breadcrumb);   

        $case = $this->Cases->findById($id);  
        $this->set('case', $case['Cases']);

        $brands = $this->Brand->find('list');
        $this->set('brands', $brands);

        $this->Company->recursive = -1;
        $companies = $this->Company->find('all', array('conditions' => array('Company.id !=' => '1')));
        
        foreach ($companies as $key => $company) {
            $this->CaseExpertise->recursive = -1;
            $case_expertises = $this->CaseExpertise->findAllByCaseIdAndCompanyId($id, $company['Company']['id']);  
            if(!empty($case_expertises)) $companies[$key]['CaseExpertise'] = $case_expertises[0]['CaseExpertise'];
        }
        
        $this->set('companies', $companies);

        $this->Cases->id = $id;
        if (!$this->Cases->exists()) {
            throw new NotFoundException('Cases inválida', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Cases->saveAll($this->request->data)) {
                $this->Session->setFlash('O case foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O case não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->Cases->read(null, $id);            
        }
    }

    public function admin_delete($id = null) {

        $this->Cases->id = $id;
        if (!$this->Cases->exists()) {
             $this->Session->setFlash('Case não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        
        if ($this->Cases->delete()) {
            $this->Session->setFlash('Case excluído com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir este case!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

    public function admin_delete_image() {
        $id = $this->params['pass'][0];

        $this->Cases->deleteFile($id, 'cases', 'image', true);
        $this->Session->setFlash('Imagem removida com sucesso!', 'flash_success');
        $this->redirect(array('action' => 'edit/' . $id));
    } 

}