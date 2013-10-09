<?php

class ContactsController extends AppController {

    public $name = 'Contacts';

    public $uses = array('ContactQuestions','ContactHi','ContactBusiness','Email', 'Company');

    /* Other vars */

    public $page_title = '{title} - Contatos | ';

    public function business(){ 


        $this->set('layout', 'custom');

    	$title = 'Fale sobre o seu negócio';
    	$this->set('title', $title);
        $this->set('page_title', str_replace('{title}', $title, $this->page_title)); 
        $this->set('page_color', 'light'); 
    	
        //Set do menu
        $this->set('page', 'business');

        if ($this->request->is('post')) {

             if(!$this->postValidation($this->request->clientIp())) {
                $this->Session->setFlash('Você enviou um e-mail muito recentemente, aguarde pelo menos 30 segundos para enviar novamente.', 'flash_error');
                $this-$this->redirect(array('controller'=>'contacts', 'action' => 'business'));
            }

            $data = $this->request->data;
            $data['ContactBusiness']['ip'] = $this->request->clientIp();
            if($this->ContactBusiness->saveAll($data)){            
                $vars['data'] = $data['ContactBusiness'];
                $vars['files'] = $data['ContactBusinessFiles'];

                //Envia e-mail para o cliente.
                $this->Email->send(null, $vars['data']['email'], $title, $vars, 'contact_thanks');

                //Envia e-mail para o contato configurado. Manter o e-mail null para enviar para o e-mail padrão.
                $this->Email->send(null, null, $title, $vars, 'contact_business');

                $this->Session->setFlash('Contato enviado com sucesso!', 'flash_success');
                $this->redirect(array('controller'=>'contacts', 'action' => 'business'));
            }

        }

    }

    public function questions(){

        $this->set('layout', 'custom');

    	$title = 'Alguma Pergunta?';
    	$this->set('title', $title);
    	$this->set('page_title', str_replace('{title}', $title, $this->page_title));  
        $this->set('page_color', 'light'); 

        //Set do menu
        $this->set('page', 'questions');

        $this->Company->recursive = -1;
        $companies = $this->Company->find('all');
        $this->set('companies', $companies);
        $this->set('company', array('slug' => 'grupo-focusnetworks'));          

        if ($this->request->is('post')) {

            if(!$this->postValidation($this->request->clientIp())) {
                $this->Session->setFlash('Você enviou um e-mail muito recentemente, aguarde pelo menos 30 segundos para enviar novamente.', 'flash_error');
                $this-$this->redirect(array('controller'=>'contacts', 'action' => 'questions'));
            }

            $data = $this->request->data;
            $data['ContactQuestions']['ip'] = $this->request->clientIp();
            if($this->ContactQuestions->save($data)){                
                $vars['data'] = $this->request->data['ContactQuestions'];

                //Envia e-mail para o cliente.
                $this->Email->send(null, $vars['data']['email'], $title, $vars, 'contact_thanks');

                //Envia e-mail para o contato configurado. Manter o e-mail null para enviar para o e-mail padrão.
                $this->Email->send(null, null, $title, $vars, 'contact_questions');

                $this->Session->setFlash('Contato enviado com sucesso!', 'flash_success');
                $this->redirect(array('controller'=>'contacts', 'action' => 'questions'));
            }
        }

    }

    public function hi(){

        $this->set('layout', 'custom');

        //Set do menu
        $this->set('page', 'hi');

    	$title = 'Diga um Oi';
    	$this->set('title', $title);
    	$this->set('page_title', str_replace('{title}', $title, $this->page_title));   
        $this->set('page_color', 'light');   

        $this->Company->recursive = -1;
        $companies = $this->Company->find('all');
        $this->set('companies', $companies);
        $this->set('company', array('slug' => 'grupo-focusnetworks'));

        if ($this->request->is('post')) {
            if(!$this->postValidation($this->request->clientIp())) {
                $this->Session->setFlash('Você enviou um e-mail muito recentemente, aguarde pelo menos 30 segundos para enviar novamente.', 'flash_error');
                $this-$this->redirect(array('controller'=>'contacts', 'action' => 'hi'));
            }

            $data = $this->request->data;
            $data['ContactHi']['ip'] = $this->request->clientIp();
            if($this->ContactHi->save($data)){     
                $vars['data'] = $this->request->data['ContactHi'];

                //Envia e-mail para o cliente.
                $this->Email->send(null, $vars['data']['email'], $title, $vars, 'contact_thanks');

                //Envia e-mail para o contato configurado. Manter o e-mail null para enviar para o e-mail padrão.
                $this->Email->send(null, null, $title, $vars, 'contact_hi');

                $this->Session->setFlash('Contato enviado com sucesso!', 'flash_success');
                $this->redirect(array('controller'=>'contacts', 'action' => 'hi'));
            }
        } 
    }

    function postValidation($ip){

        $recent = $this->ContactQuestions->find('first', array('conditions' => array('ContactQuestions.ip' => $ip), 'order' => 'ContactQuestions.created DESC'));              

        $date = strtotime(date('Y-m-d H:i:s'));

        $date_db = strtotime($recent['ContactQuestions']['created']);

        if($recent){
            $diff = ($date - $date_db);        
            if($diff > 30){                
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
        
    }
    


}