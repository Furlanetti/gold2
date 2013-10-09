<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'home', 'action' => 'index', 'home'));

	Router::connect('/o-grupo/:slug', array('controller' => 'companies'));

	Router::connect('/contatos/fale-sobre-o-seu-negocio', array('controller' => 'contacts', 'action' => 'business'));
	Router::connect('/contatos/alguma-pergunta', array('controller' => 'contacts', 'action' => 'questions'));
	Router::connect('/contatos/diga-um-oi', array('controller' => 'contacts', 'action' => 'hi'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/admin', array('controller' => 'users', 'action' => 'index', 'admin' => true, 'prefix' => 'admin', 'layout' => 'admin'));

	Router::connect('/marcas/', array('controller' => 'brands', 'action' => 'index'));
	Router::connect('/marcas/:slug',array('controller' => 'brands', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-]*'));

	Router::connect('/cases/', array('controller' => 'cases', 'action' => 'index'));
	Router::connect('/cases/:slug', array('controller' => 'cases', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-]*'));
	Router::connect('/imagens-dos-cases/', array('controller' => 'cases', 'action' => 'images'));

	Router::connect('/expertises/', array('controller' => 'expertises', 'action' => 'index'));
	Router::connect('/expertises/ux', array('controller' => 'expertises', 'action' => 'ux'));
	Router::connect('/expertises/ux/', array('controller' => 'expertises', 'action' => 'ux'));
	Router::connect('/expertises/:slug', array('controller' => 'expertises', 'action' => 'index'), array('slug' => '[a-zA-Z0-9_-]*'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
