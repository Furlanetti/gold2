<?php

class GoldClubController extends AppController {

    public $name = 'GoldClub';

    //var $helpers = array('CakePtbr.Formatacao');

    public $uses = array('GoldClub');

    public function admin_index(){
 		$gold = $this->GoldClub->find('all');
        $this->set(compact('gold'));
        
    	$this->set('breadcrumb', $this->breadcrumb);      

    }

    public function admin_new(){

    	if ($this->request->is('post')) {
            $this->GoldClub->create();
            if ($this->GoldClub->saveAll($this->request->data)) {
               $this->Session->setFlash('O Gold Club foi cadastrado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O Gold Club não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        
        $this->GoldClub->id = $id;
        if (!$this->GoldClub->exists()) {
            throw new NotFoundException('Usuário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->GoldClub->save($this->request->data)) {
                $this->Session->setFlash('O Gold Club foi alterado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O Gold Club não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->GoldClub->read(null, $id);            
        }
    }


    public function admin_delete($id = null) {

        $this->GoldClub->id = $id;
        if (!$this->GoldClub->exists()) {
             $this->Session->setFlash('O Gold Club não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        if ($this->GoldClub->delete()) {
            $brand = $this->GoldClub->findById($id);
            $this->Session->setFlash('Gold Club excluído com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir este Gold Club!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

}
?>