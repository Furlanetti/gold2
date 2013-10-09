<?php

class BrandsController extends AppController {

    public $name = 'Brands';

    public $uses = array('Brand', 'Cases');

    public $paginate = array(
        'limit' => 10,
        'paramType' => 'querystring');

    public $helpers = array(        
        'Paginator'        
    );

    /* Other vars */

    public $page_title = '{title} - ';

	public $breadcrumb = array(array('name' => 'Marcas', 'url' => 'brands/'));

    public function beforeFilter(){

        parent::beforeFilter();
        $this->set('layout', 'custom');

    }

    public function index(){
        
        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured' => true)));        
        $this->set('menus', $menus);

        $this->paginate = array('limit' => 28);

        $brands = $this->paginate('Brand');        
        $this->set('brands', $brands);

        $this->set('page_title', str_replace('{title}', 'Todas as Marcas', $this->page_title)); 
        $this->set('page_color', 'light');   
    }

    public function view(){
                        
        $menus = $this->Brand->find('all', array('conditions' => array('Brand.featured' => true)));
        $this->set('menus', $menus);

        //$others = $this->Brand->findBySlug($this->params->slug);
        //A linha de cima é a correta. O select abaixo é temporário
        $brand = $this->Brand->findBySlug($this->params->slug);
        $this->set('brand', $brand);

        $others = $this->Cases->find('all', array('conditions' => array('Cases.brand_id' => $brand['Brand']['id'])));
        $this->set('others', $others); 
        $this->set('page_color', 'light');   

    }

    public function admin_index() {
        $this->Brand->recursive = 0;
        
        $brands = $this->Brand->find('all');
        $this->set(compact('brands'));
        
    	$this->set('breadcrumb', $this->breadcrumb);           
    }


    public function admin_new() {

    	array_push($this->breadcrumb, array('name' => 'Adicionar Marca'));
    	$this->set('breadcrumb', $this->breadcrumb);   

        if ($this->request->is('post')) {
            $this->Brand->create();

            $data = $this->request->data;
            $data['Brand']['slug'] = $this->Brand->createSlug($data['Brand']['title'], 'brands');

            if ($this->Brand->save($data)) {
               $this->Session->setFlash('A marca foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A marca não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        array_push($this->breadcrumb, array('name' => 'Editar Marca'));        
        $this->set('breadcrumb', $this->breadcrumb);   

        $brand = $this->Brand->findById($id);  
        $this->set('brand', $brand['Brand']);   

        $this->Brand->id = $id;
        if (!$this->Brand->exists()) {
            throw new NotFoundException('Marca inválida', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Brand->save($this->request->data)) {
                $this->Session->setFlash('O marca foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O marca não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->Brand->read(null, $id);            
        }
    }

    public function admin_delete($id = null) {

        $this->Brand->id = $id;
        if (!$this->Brand->exists()) {
             $this->Session->setFlash('Marca não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        
        if ($this->Brand->delete()) {
            $this->Session->setFlash('Marca excluída com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir esta marca!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

    public function admin_delete_image() {
        $id = $this->params['pass'][0];

        $this->Cases->deleteFile($id, 'brands', 'image', true);
        $this->Session->setFlash('Imagem removida com sucesso!', 'flash_success');
        $this->redirect(array('action' => 'edit/' . $id));
    } 

}