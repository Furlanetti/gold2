<?php

class CategoryRecipesController extends AppController {

    public $name = 'CategoryRecipes';

    public $uses = array('CategoryRecipe');

    public function admin_index(){
 		$categorys = $this->CategoryRecipe->find('all');
        $this->set(compact('categorys'));
        
    	$this->set('breadcrumb', $this->breadcrumb);      

    }

    public function admin_new(){

    	if ($this->request->is('post')) {
            $this->CategoryRecipe->create();
            if ($this->CategoryRecipe->saveAll($this->request->data)) {
               $this->Session->setFlash('A categoria de receita foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A categoria de receita não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        
        $this->CategoryRecipe->id = $id;
        if (!$this->CategoryRecipe->exists()) {
            throw new NotFoundException('Usuário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CategoryRecipe->save($this->request->data)) {
                $this->Session->setFlash('O Categoria receita foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O Categoria de receita não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->CategoryRecipe->read(null, $id);            
        }
    }


    public function admin_delete($id = null) {

        $this->CategoryRecipe->id = $id;
        if (!$this->CategoryRecipe->exists()) {
             $this->Session->setFlash('Categoria de receita não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        if ($this->CategoryRecipe->delete()) {
            $brand = $this->CategoryRecipe->findById($id);
            $this->Session->setFlash('Categoria de receita excluída com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir esta categoria de receita!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

}
?>