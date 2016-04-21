<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/home', array('controller' => 'pages', 'action' => 'display', 'home'));
    Router::connect('/contact', array('controller' => 'pages', 'action' => 'display', 'contact'));
    Router::connect('/contact_thanks', array('controller' => 'pages', 'action' => 'display', 'contact_thanks'));
    Router::connect('/gallery/*', array('controller' => 'photos', 'action' => 'public_display'));
    Router::connect('/online_application', array('controller' => 'pages', 'action' => 'display', 'online_application'));
    Router::connect('/application_status', array('controller' => 'online_applications', 'action' => 'public_status'));
    Router::connect('/result', array('controller' => 'pages', 'action' => 'display', 'result_index'));
    Router::connect('/result_e', array('controller' => 'pages', 'action' => 'display', 'result_index_error'));
    Router::connect('/about', array('controller' => 'pages', 'action' => 'display', 'about'));
    Router::connect('/routine', array('controller' => 'routines', 'action' => 'public_display'));
    Router::connect('/book_list', array('controller' => 'class_names', 'action' => 'book_list'));
    Router::connect('/notice/*', array('controller' => 'notices', 'action' => 'public_display'));
    Router::connect('/news/*', array('controller' => 'news', 'action' => 'public_display'));
    Router::connect('/syllabus', array('controller' => 'syllabi', 'action' => 'public_display'));
    Router::connect('/suggestion', array('controller' => 'suggestions', 'action' => 'public_display'));
    Router::connect('/events', array('controller' => 'pages', 'action' => 'display', 'events'));
    Router::connect('/guardian', array('controller' => 'pages', 'action' => 'display', 'guardian'));
    Router::connect('/dress', array('controller' => 'pages', 'action' => 'display', 'dress'));
    Router::connect('/video', array('controller' => 'links', 'action' => 'videos'));
    Router::connect('/game', array('controller' => 'links', 'action' => 'games'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'login' ,'admin'=>true));

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
