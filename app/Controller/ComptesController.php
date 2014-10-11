<?php
class ComptesController extends AppController {
	
	public function index() {

	}
	
	public function ajouter() {
		$this->set('title_for_layout', 'Ajouter un membre');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
		$passwordHasher = new SimplePasswordHasher();
		if($this->Cookie->check('password_amicale') == false or $this->Cookie->read('password_amicale') != 'fd907da89788146477c3cc7f8c0cceefcfd06213'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_amicale', $this->params['controller'], $this->params['action']));
		}else{
	// Verifier POST
			if ($this->request->is('POST')) {
	// Générer un code aléatoire
				$password = rand(00000,99999);
	// Vérifier que aucun mot de pass ne correpondent déjà
				$compte = $this->Compte->findByPassword($password);
				if (!empty($compte)){
					echo 'Mot de passe déjà pris, recliquez sur \' Inscrire un nouveau membre\' s\'il vous plait';
				}else{
	// INSERER BDD avec solde =0
					$this->Compte->create();
					$this->Compte->set(array(
						'password' => $password,
						'solde' => '0',
						'mail'=> $this->request->data['ajout']['mail']
					));
					$this->Compte->save();	// Mettre les infos de création du compte dispo pour la view
					$this->set('password', $password);
					$id = $this->Compte->id;
					$this->set('id',$id);
	// Configuration du mail
					App::uses('CakeEmail','Network/Email');
					$email = new CakeEmail('default');
					$email->to($this->request->data['ajout']['mail']);
					$email->subject("Bienvenue sur BankInsa ! ");
					$email->viewVars(array(
						'password' => $password,
						'id' => $id
					));
					$email->emailFormat('both');
					$email->template('nouveau_membre');
					$email->send();
				}
			}
		}
	}
	
	public function supprimer() {
	$this->set('title_for_layout', 'Supprimer un membre');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
		$passwordHasher = new SimplePasswordHasher();
		if($this->Cookie->check('password_amicale') == false or $this->Cookie->read('password_amicale') != 'fd907da89788146477c3cc7f8c0cceefcfd06213'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_amicale', $this->params['controller'], $this->params['action']));
		}else{
	// VERIFIER POST
			if($this->request->is('POST')){
				$compte = $this->Compte->findByPassword($this->request->data['supprimer']['password']);
	// Trouver 'password' dans bdd
				if(!empty($compte)){
	// Donner le solde restant du compte
					$this->set('solde', $compte['Compte']['solde']);
	// Supprimer ligne
					$this->Compte->delete($compte['Compte']['id']);
				}else{
					$this->set('message', "Compte à supprimer non trouvé.");
				}
			}
		}
	}
	
	public function voir_solde() {
		if($this->Session->check('User.id_membre') == false OR $this->Session->check('User.password') == false){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_membre', $this->params['controller'], $this->params['action']));
		}else{
			$id_user = $this->Session->read('User.id_membre');
			$password_user = $this->Session->read('User.password');
			$this->set('title_for_layout', 'Voir son solde');
	// Trouver password correspondant
			$compte = $this->Compte->findByPassword($password_user);
			if(!empty($compte)){
	// Verifier l'id correspondante
				if($compte['Compte']['id'] == $id_user){
	// Afficher solde
					$this->set('solde', $compte['Compte']['solde']);
					$this->set('id_user', $id_user);
				}else{
					$this->set('message', 'Il y a une erreur dans la connexion au compte, vérifiez vos identifiants');
				}
			}else{
				$this->set('message', 'Il y a une erreur dans la connexion au compte, vérifiez vos identifiants, puis déconnecter vous afin de vous reconnecter en accedant à cette page.');
			}
		}
	}
	
	public function raz ($id){
	$this->set('title_for_layout', 'Remise à zéro');
		if($id >= 0 and $id <= 3){
			$this->set('old_solde', $this->Compte->findById($id)['Compte']['solde']);
			$this->Compte->id = $id;
			$this->Compte->saveField('solde', 0);
		}else{
			$this->set('message', 'Il faut sélectionner un magasin pour remettre le solde à zéro.');
		}
	}
	
}


?>