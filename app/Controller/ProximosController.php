<?php
class ProximosController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
		$passwordHasher = new SimplePasswordHasher();
		if($this->Cookie->check('password_vente') == false or $this->Cookie->read('password_vente') != 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_vente', $this->params['controller'], $this->params['action']));
		}
	}
	
	public function index(){
	$this->set('title_for_layout', 'Vente par le Proximo');
		$this->loadModel('Compte');
		$compte = $this->Compte->findById(2);
		$this->set('solde', $compte['Compte']['solde']);
	}
	
}
?>