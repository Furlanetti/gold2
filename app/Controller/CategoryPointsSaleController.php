<?php

class CategoryPointsSaleController extends AppController {

    public $name = 'CategoryPointsSale';

    public $uses = array('CategoryPointSale');

    public function admin_index(){
 		$categorys = $this->CategoryPointSale->find('all');
        $this->set(compact('categorys'));
        
    	$this->set('breadcrumb', $this->breadcrumb);      

    }

    public function admin_new(){

    	if ($this->request->is('post')) {
            $this->CategoryPointSale->create();
            if ($this->Team->saveAll($this->request->data)) {
               $this->Session->setFlash('A categoria foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A categoria não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }
}
?>