<?php

App::uses('CakeEmail', 'Network/Email');

class Email extends AppModel {
    
    public $name = 'Email';    

    public $useTable = false;

     /* Other vars */

    public $to = array('felipe.sobral@focusnetworks.com.br');


    public function send($from = array(), $to = array(), $subject = "", $vars = array(), $layout = "default"){

    	if (!count($to)) $to = $this->to;    	

        $Email = new CakeEmail('default');
        $Email->template($layout, 'default')->viewVars(array('vars' => $vars));
        $Email->emailFormat('html');
        $Email->from($from);
        $Email->to($to);
        $Email->subject($subject);
        $Email->send();
    }

}

?>