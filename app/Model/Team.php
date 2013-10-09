<?php

App::uses('AuthComponent', 'Controller/Component');

class Team extends AppModel {
    
    public $name = 'Team';  

    public $useTable = "team";

    public $hasMany = array('TeamImage' => array('dependent' => true));

    public $belongsTo = array('Company');

    public $validate = array(
        'name' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        ),
        'company_id' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        ),
        'position' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        ),
        'image' => array(
            'multiple' => array(
                'rule' => array('multiple', array('min' => 1)),
                'message' => 'Insira no míminimo uma foto'),
                'required' => true        
            )
    );

   
}

?>