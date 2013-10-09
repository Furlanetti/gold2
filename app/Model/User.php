<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $name = 'User';    

    public $components = array('Security');
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Login necessário'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Senha necessária'
            )
        ),
        'password_confirm' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                    'required' => true,
                    'on' => 'create',
                'message' => 'Confime sua senha.'
            ),
            'passwordConfirmation' => array(
                'rule'    => array('passwordConfirmation'),
                'message' => 'As duas senhas não conferem.',                
            )                
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'user')),
                'message' => 'Insira uma permissão válida',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {

            $user = $this->findById($this->data[$this->alias]['id']);

            if ($user['User']['password'] != $this->data[$this->alias]['password']){
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);    
            }            
        }
        return true;
    }

    public function checkLogin($username, $passhash){  
            
        $user = $this->find('all', array('conditions' => array('User.username' => $username, 'User.password' => $passhash), 'limit' => 1));
        
        if ($user)  
        {  
            $this->data = $user;  
            $this->id = $user['User']['id'];  
            return true;  
        }  
  
        return false;  
    }  

    public function passwordConfirmation($data){


        $password = $this->data['User']['password'];
        $password_confirmation = $this->data['User']['password_confirm'];

        $user = $this->findById($this->data[$this->alias]['id']);

        if ($user['User']['password'] == $password){
            return true;
        }else{
            if($password === $password_confirmation){             
                return true;             
            } else {             
                return false;             
            }
        }
                      
    }


}

?>