<?php

class UsersController extends AppController {

    public $name = 'Users';

    public $uses = array('User', 'Email');

	public $breadcrumb = array(array('name' => 'Usuário', 'url' => 'users/'));

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_logout', 'admin_login', 'admin_recover_password');
    }

    public function admin_index() {
        $this->User->recursive = 0;

        $conditions = array();
        
        if (!$this->isAuthorized())
            $conditions = array('conditions' => array('User.id' => AuthComponent::user('id')));

        $users = $this->User->find('all', $conditions);
        $this->set(compact('users'));
        
    	$this->set('breadcrumb', $this->breadcrumb);           
    }


    public function admin_new() {

    	array_push($this->breadcrumb, array('name' => 'Adicionar Usuário'));
    	$this->set('breadcrumb', $this->breadcrumb);   

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
               $this->Session->setFlash('O usuário foi cadastrado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O usuário não pôde ser salvo. Por favor, tente novamente.', 'flash_error');
           }
        }
    }

    public function admin_edit($id = null) {
        array_push($this->breadcrumb, array('name' => 'Editar Usuário'));        
        $this->set('breadcrumb', $this->breadcrumb);   

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException('Usuário inválido', 'flash_error');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('O usuário foi alterado com sucesso!', 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('O usuário não pôde ser salvo. Por favor, verifique os campos digitados.', 'flash_error');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);            
        }
    }

    public function admin_delete($id = null) {

        $this->User->id = $id;
        if (!$this->User->exists()) {
             $this->Session->setFlash('Usuário não existe!', 'flash_error');
            	$this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('Usuário excluído com sucesso!', 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Não foi possível excluir este usuário!', 'flash_error');
        $this->redirect(array('action' => 'index'));
    }

    public function admin_login() {

    	$this->layout = 'login';

    	if ($this->request->is('post')){

    		if ($this->Auth->login()){

    			if (!empty($this->data))
		            {
                        $user = $this->User->findById(AuthComponent::user('id'));

                        if ($user['User']['status']){
                            if (empty($this->data['remember_me']))  
                            {  
                                $this->Cookie->delete('User');  
                            }  
                            else  
                            {  
                                $cookie = array();  
                                $cookie['username'] = $this->data['User']['username'];  
                                $cookie['token']    = $this->data['User']['password'];  
                                $this->Cookie->write('User', $cookie, true, '+2 weeks');  
                            }  
              
                            if(!empty($this->data['User']['remember_me'])) unset($this->data['User']['remember_me']);  
                        }else{
                             $this->Session->setFlash('Usuário inativo no sistema', 'flash_alert');
                             $this->redirect($this->Auth->logout());
                        }
    		                

		            }  
		              
		            $this->redirect($this->Auth->redirect());  
		        

		    } else {
		        $this->Session->setFlash('Usuário e/ou senha inválidos', 'flash_alert');
		    }

    	}
		    
	}

	public function admin_logout(){
		$this->Cookie->delete('User');
	    $this->redirect($this->Auth->logout());
	}

	public function admin_recover_password(){

		if ($this->request->is('post')){            

            $this->User->recursive = -1;

            $new_password = mt_rand(10000000, 99999999);

			$user = $this->User->findByEmail($this->data['User']['email']);

            $this->User->read(null, $user['User']['id']);

			$this->User->set(array('password' => $new_password));
        
			$this->User->save();

            echo $user['User']['email'];
			
            $this->Email->send(null, array($user['User']['email']), 'Nova Senha', 'Sua senha foi alterada para: '.$new_password.' É importante 
                que você altere a mesma.');

            $this->Session->setFlash('Uma nova senha foi enviada para seu e-mail!', 'flash_success');
            $this->redirect(array('action' => 'index'));

		}

	}

}