<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('CrudControllerTrait', 'Crud.Lib');

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

	use CrudControllerTrait;

	public $components = array(
		'RequestHandler',
		'Session',
		'Auth' => [
			'authenticate' => [
				'Facebook'
			]
		],
		'Crud.Crud' => array(
			'actions' => array('index', 'add', 'view', 'edit', 'delete'),
			'listeners' => array('Api', 'ApiQueryLog', 'ApiPagination')
		),
		'Paginator' => array('settings' => ['paramType' => 'querystring'])
	);

}
