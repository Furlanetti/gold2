<?php

class TeamController extends AppController {

    public $name = 'Team';

    public $uses = array('Team', 'TeamImage', 'Company');

	public $breadcrumb = array(array('name' => 'Equipe', 'url' => 'team/'));


    public function admin_index() {

        $teams = $this->Team->find('all');
        $this->set(compact('teams'));
        
    	$this->set('breadcrumb', $this->breadcrumb);         
    }


    public function admin_new() {

        $companies = $this->Company->find('list');
        $this->set('companies', $companies);

    	array_push($this->breadcrumb, array('name' => 'Adicionar Equipe', 'url' => 'team/new/'));
    	$this->set('breadcrumb', $this->breadcrumb);   

        if ($this->request->is('post')) {
            $this->Team->create();
            if ($this->Team->saveAll($this->request->data)) {
               $this->Session->setFlash('O funcionário foi cadastrado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O funcionário não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {

        $companies = $this->Company->find('list');
        $this->set('companies', $companies);

        array_push($this->breadcrumb, array('name' => 'Editar Equipe', 'url' => 'team/edit/' . $id));        
        $this->set('breadcrumb', $this->breadcrumb);   

        $team = $this->Team->findById($id);  
        $this->set('team', $team);

        $this->Team->id = $id;
        if (!$this->Team->exists()) {
            throw new NotFoundException('Funcionário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Team->saveAll($this->request->data)) {
                $this->Session->setFlash('A equipe foi alterada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A equipe não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->Team->read(null, $id);            
        }
    }

    public function admin_delete($id = null) {

        $this->Team->id = $id;
        if (!$this->Team->exists()) {
             $this->Session->setFlash('Funcionário não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        if ($this->Team->delete()) {
            $brand = $this->Team->findById($id);
            $this->Session->setFlash('Funcionário excluído com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir este funcionário!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

    public function admin_delete_image() {
        $id = $this->params['pass'][0];

        $this->Team->deleteFile($id, 'team_images', 'image', false, true);
        $this->Session->setFlash('Imagem removida com sucesso!', 'flash_success');
        $this->redirect(array('action' => 'index'));
    } 

}