<?php

App::uses('AuthComponent', 'Controller/Component');

class CategoryPointSale extends AppModel {
	public $name = 'CategoryPointsSale';  

    public $useTable = "category_points_sale";

    public $validate = array(
        'title' => array(
            array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'Este campo é obrigatório'
            )
        )
    );


}
?>