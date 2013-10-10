<?php

class UsersController extends AppController {

    public $name = 'Permission';

    public $uses = array('Permission');

	public $breadcrumb = array(array('name' => 'Permissão', 'url' => 'permission/'));


    public function admin_index() {
        $permissions = $this->Permission->find('all');
        $this->set(compact('Permissions'));
        
        $this->set('breadcrumb', $this->breadcrumb);       
    }


    public function admin_new() {

    	array_push($this->breadcrumb, array('name' => 'Adicionar Permissão'));
    	if ($this->request->is('post')) {
            $this->Permission->create();
            if ($this->Permission->saveAll($this->request->data)) {
               $this->Session->setFlash('A Permissão foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A Permissão não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        array_push($this->breadcrumb, array('name' => 'Editar Permissão'));        
        $this->set('breadcrumb', $this->breadcrumb);   

        $this->Permission->id = $id;
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Permission->save($this->request->data)) {
                $this->Session->setFlash('A permissão foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A permissão não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->Permission->read(null, $id);            
        }
    }

    public function admin_delete($id = null) {

        $this->Permission->id = $id;
        if (!$this->Permission->exists()) {
             $this->Session->setFlash('Permissão não existe!', 'flash_error');
            	$this->redirect(array('action' => 'index'));
        }
        if ($this->Permission->delete()) {
            $this->Session->setFlash('Permissão excluída com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir esta permissão!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

}