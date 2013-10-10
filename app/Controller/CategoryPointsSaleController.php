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
            if ($this->CategoryPointSale->saveAll($this->request->data)) {
               $this->Session->setFlash('A categoria foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A categoria não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        
        $this->CategoryPointSale->id = $id;
        if (!$this->CategoryPointSale->exists()) {
            throw new NotFoundException('Usuário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CategoryPointSale->save($this->request->data)) {
                $this->Session->setFlash('O Categoria de ponto de venda foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O Categoria de ponto de venda não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->CategoryPointSale->read(null, $id);            
        }
    }


    public function admin_delete($id = null) {

        $this->CategoryPointSale->id = $id;
        if (!$this->CategoryPointSale->exists()) {
             $this->Session->setFlash('Categoria de Ponto de Venda não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        if ($this->CategoryPointSale->delete()) {
            $brand = $this->CategoryPointSale->findById($id);
            $this->Session->setFlash('Categoria de ponto de venda excluída com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir esta categoria de ponto de venda!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

}
?>