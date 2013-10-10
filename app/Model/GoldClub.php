<?php

App::uses('AuthComponent', 'Controller/Component');

class GoldClub extends AppModel {
	public $name = 'GoldClub';  

    public $useTable = "gold_club";

    public $validate = array(
        'name' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        )
    );


}
?>