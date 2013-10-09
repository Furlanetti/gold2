<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller { 

    public $uses = array('User', 'Social');

	public $components = array(
        'RequestHandler',
		'Cookie',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true)
        )
    );

	function beforeFilter() {

		$this->Auth->allow('index', 'view', 'admin_add', 
            'display', 'business', 'questions', 
            'hi', 'uploadFile', 'deleteFile', 'facebook', 'twitter', 'youtube', 'google_plus', 
            'blog_focusnetworks', 'ux', 'slideshare', 'images'
        );  

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        }

        $cookie = $this->Cookie->read('User');  
  
        if (is_array($cookie) && !$this->Auth->user())  
        {  
            if ($this->User->checkLogin($cookie['username'], $cookie['token']))  
                if (!$this->Auth->login($this->User))  
                    $this->Cookie->delete('User');
        }

        $this->set('isAuthorized', $this->isAuthorized());

        $this->set('page_title', '');

        // $this->set('likes', $this->Social->getLikes());
        // $this->set('followers', $this->Social->getFollowers());
        // $this->set('google_plus_count', $this->Social->getPlusCount());


        $this->set('likes', '123');
        $this->set('followers', '123');
        $this->set('google_plus_count', '123');

    }   

    public function isAuthorized() {

    if(AuthComponent::user('id')) {
        $user = $this->User->findById(AuthComponent::user('id')); 
            $user = $user['User'];

            if (isset($user['role']) && $user['role'] === 'admin') {
                return true; //Admin pode acessar tudo
            }
        }

        return false; // O resto não pode
    }
}
