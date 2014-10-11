<?php
class LoginsController extends AppController{
	
	public function login_vente($controller, $action) {
	$this->set('title_for_layout', 'Se connecter :');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
		$passwordHasher = new SimplePasswordHasher();
	// Verifier POST
		if($this->request->is('POST')){
	// Verifier login
			if($passwordHasher->Hash($this->request->data['login']['password_vente']) == 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded'){
	// Set cookie
				$this->Cookie->time = 315360000;
				$this->Cookie->write('password_vente', 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded');
				$this->redirect(array('controller' => $controller, 'action' => $action));
			}else{
				$this->set('message', 'Mauvais mot de passe, désolé.');
			}
		}
	}
	
	public function login_amicale($controller_a, $action_a) {
	$this->set('title_for_layout', 'Se connecter :');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
		$passwordHasher = new SimplePasswordHasher();
	// Verifier POST
		if($this->request->is('POST')){
	// Verifier login
			if($passwordHasher->Hash($this->request->data['login']['password_amicale']) == 'fd907da89788146477c3cc7f8c0cceefcfd06213'){
	// Set cookie
				$this->Cookie->time = 315360000;
				$this->Cookie->write('password_amicale', 'fd907da89788146477c3cc7f8c0cceefcfd06213');
				$this->redirect(array('controller' => $controller_a, 'action' => $action_a));
			}else{
				$this->set('message', 'Mauvais mot de passe, désolé.');
			}
		}
	}
	
	public function login_membre($controller_m, $action_m) {
	$this->set('title_for_layout', 'Se connecter :');
	// Verifier POST
		if($this->request->is('POST')){
	// Verifier login
	// Aller chercher password donneur -> Compte_donneur
			$this->loadModel('Compte');
			$password = $this->request->data['login']['password_membre'];
			$compte = $this->Compte->findByPassword($password);
			$id = $this->request->data['login']['id']; 
	// Vérifier id
			if(!empty($compte) and $compte['Compte']['id'] == $id){
	// Set cookie
				$this->Session->write('User.id_membre', $id);
				$this->Session->write('User.password', $password);
				$this->redirect(array('controller' => $controller_m, 'action' => $action_m));
			}else{
				$this->set('message', 'Nous n\'avons pas réussi à vous connecter, veuillez vérifier vos informations de connexion.');
			}
		}
	}
	
	public function logout(){
	$this->set('title_for_layout', 'Deconnexion');
		$wall = $this->Session->read('wall');
		$this->Cookie->destroy();
		$this->Session->destroy();
		$this->Session->write('wall', $wall);
	}
	
}