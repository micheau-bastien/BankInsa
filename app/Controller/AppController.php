<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

	public $components = array(
		'Session', 
		'Cookie', 
		'Security' => array(
			'blackHoleCallback' => 'blackhole',
		)	,
		'RequestHandler'
	);
	
	public function beforeFilter(){
		parent::beforeFilter();
		if($this->RequestHandler->isAjax()){
			$this->layout = null;
		}
		$this->set('rand', rand(1,6));
	// Pour mettre les cookies en Session : 
		if($this->Session->check('password_vente') == false){
			if($this->Cookie->check('password_vente') == true){
				$this->Session->write('password_vente', 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded');
			}
		}
		if($this->Session->check('password_amicale') == false){
			if($this->Cookie->check('password_amicale') == true){
				$this->Session->write('password_amicale', 'fd907da89788146477c3cc7f8c0cceefcfd06213');
			}
		}
	}
	
	public function blackhole(){
		$this->redirect(array('controller' => 'Pages', 'action' => 'erreur'));
	}
}
