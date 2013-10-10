<?php

class ContactsController extends AppController {

    public $name = 'Contacts';

    //var $helpers = array('CakePtbr.Formatacao');

    public $uses = array('Contact');

    public function admin_index(){
 		$contacts = $this->Contact->find('all');
        $this->set(compact('contacts'));
        
    	$this->set('breadcrumb', $this->breadcrumb);      

    }

    public function admin_new(){

    	if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->saveAll($this->request->data)) {
               $this->Session->setFlash('A Mensagem de contato foi cadastrada com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A Mensagem de contato não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException('Usuário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('A Mensagem de contato foi alterado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('A Mensagem de contato não pôde ser salva. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->Contact->read(null, $id);            
        }
    }


    public function admin_delete($id = null) {

        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
             $this->Session->setFlash('Esta mensagem de contato não existe!', 'flash_error');
                $this->redirect(array('action' => 'index'));
        }
        if ($this->Contact->delete()) {
            $brand = $this->Contact->findById($id);
            $this->Session->setFlash('Mensagem de contato excluído com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir este Gold Club!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    } 

}
?>