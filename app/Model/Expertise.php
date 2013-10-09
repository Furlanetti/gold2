<?php

App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');

class Expertise extends AppModel {
    
    public $name = 'Expertise';    

    public function checkAccess(){

        /* Verifica se é a primeira vez que o usuario acessou a página,
           se for, exibir as bolas brancas e o vídeo. Caso contrário, ir direto para as bolas coloridas */ 

        $other_access = CakeSession::read('other_access');
        
        if(empty($other_access)){
            $first_access = true;
            CakeSession::write('other_access', true);
        } else {
            $first_access = false;
        }

        return $first_access;
    }

}

?>