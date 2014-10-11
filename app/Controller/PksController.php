<?php
class PksController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		if($this->Cookie->check('password_vente') == false or $this->Cookie->read('password_vente') != 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_vente', $this->params['controller'], $this->params['action']));
		}
	}
	
	public function index(){
	$this->set('title_for_layout', 'Vente par le PK');
	// Envoie du tableau des produits
		$produits = $this->Pk->find('all');
		$this->set('produits', $produits);
		$this->loadModel('Compte');
		$compte = $this->Compte->findById(3);
		$this->set('solde', $compte['Compte']['solde']);
	}
	
	public function ajouter_produit(){
	$this->set('title_for_layout', 'Ajout d\'un produit');
	// Verifier POST
		if($this->request->is('POST')){
			$produit = $this->Pk->findByNom($this->request->data['pk']['nom']);
	// Verifier nom pas déjà pris
			if(empty($produit)){
	// Enregistrer dans BDD
				if($this->Pk->save($this->request->data['pk'])){
					$this->set('message', 'Le produit à bien été ajouté.');
				}
			}else{
				$this->set('message', 'Erreur : Le produit à déjà été ajouté.');
			}
		}
	}
	
	public function supprimer_produit(){
	$this->set('title_for_layout', 'Supprimer un produit');
	// Envoyer le tableau de tous les produits
		$this->set('produits', $this->Pk->find('all'));
	// Verifier POST
		if($this->request->is('POST')){
			$this->Pk->delete($this->request->data['pk']['produit']);
			$this->set('message', 'Element supprimé avec succes');
		}
	}
	
}
?>