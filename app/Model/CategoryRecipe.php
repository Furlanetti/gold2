<?php

App::uses('AuthComponent', 'Controller/Component');

class CategoryRecipe extends AppModel {
	public $name = 'CategoryRecipes';  

    public $useTable = "category_recipes";

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