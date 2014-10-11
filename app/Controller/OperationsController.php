<?php
class OperationsController extends AppController {

	public function index() {
		
	}	
	
	public function crediter(){
	$this->set('title_for_layout', 'Recharger un compte');
		if($this->Cookie->check('password_amicale') == false or $this->Cookie->read('password_amicale') != 'fd907da89788146477c3cc7f8c0cceefcfd06213'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_amicale', $this->params['controller'], $this->params['action']));
		}else{
	// Charger le model des comptes pour acceder à la BDD compte
			$this->loadModel('Compte');
	// Vérifier POST
			if($this->request->is('POST')){
	// Vérifier mot de passe vérification authorisation credit
				$compte = $this->Compte->findByPassword($this->request->data['crediter']['password']);
	// Trouver ligne password
				if(!empty($compte)){
					$this->Compte->id = $compte['Compte']['id'];
	// Modifier ligne pour ajouter au solde
					$this->Compte->saveField('solde', $compte['Compte']['solde']+$this->request->data['crediter']['credit']);
					$this->set('nouveau_solde', $compte['Compte']['solde']+$this->request->data['crediter']['credit']);
	// Enregistrer le credit dans les opérations
					$this->Operation->create();
					$this->Operation->set(array(
						'id_membre' => $this->Compte->id,
						'operation' => + $this->request->data['crediter']['credit'],
						'debiteur' => 'Credit'
					));
					$this->Operation->save();
	// Debiter le credit de l'amicale
					$compte_amicale = $this->Compte->findById('1');
					$this->Compte->id = 1;
					$this->Compte->saveField('solde', $compte_amicale['Compte']['solde'] - $this->request->data['crediter']['credit']);
				}else{
					$this->set('message', "Compte non trouvé.");
				}
			}
		}
	}
	
	public function fnct_debiter($total, $vendeur, $controller, $action){
	// Importer compte
		$this->loadModel('Compte');
	// Voir si $total > 0
		if($total >= 0){
	// Voir si POST pour soir le password à été entré
			if($this->request->is('POST')){
	// Voir si password OK
				$compte = $this->Compte->findByPassword($this->request->data['Operation']['password']);
	// Trouver id correspondante
				$id = $compte['Compte']['id'];
	// Debiter client
				$this->Compte->id = $id;
				$this->Compte->saveField('solde', $compte['Compte']['solde']-$total);
	// Crediter vendeur
				$compte_vendeur = $this->Compte->findById($vendeur);
				$this->Compte->id = $vendeur;
				$this->Compte->saveField('solde', $compte_vendeur['Compte']['solde'] + $total);
	// Inscrire opération
				$this->Compte->save(array(
					'id_membre' => $id,
					'operation' => -$total,
					'debiteur' => $vendeur
				));
	// Rediriger vers demandeur 
				$this->redirect(array(
					'controller' => $controller,
					'action' => $action
				));
			}
		}
	}
	
	public function debiter(){
	$this->set('title_for_layout', 'Payer');
		if($this->Cookie->check('password_vente') == false or $this->Cookie->read('password_vente') != 'b1ba26f7a08cae96b8802b9d63a2dd88aaeebded'){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_vente', $this->params['controller'], $this->params['action']));
		}else{
	// Charger le model des comptes pour acceder à la BDD compte
			$this->loadModel('Compte');
	// Verifier POST
			if($this->request->is('POST')){
	// Verif que le montant de la vente est positif
				if($this->request->data['debit']['total'] > 0){
	// Envoi les infos du vendeurs à la vue
					$debiteur = $this->request->data['debit']['debiteur'];
					if($debiteur == 1){
						$to = 'à l\'amicale';
					}elseif($debiteur == 2){
						$to = 'au proximo' ;
					}elseif($debiteur == 3){
						$to = 'au PK';
					}else{
						$to = "à l'utilisateur n°$debiteur";
					}
					$this->set('to', $to);
		// Vérifier que le mot de pass a déjà été rempli
					if(isset($this->request->data['debit']['password_debit'])){
		// Trouver compte associé au password
						$compte = $this->Compte->findByPassword($this->request->data['debit']['password_debit']);
						if(!empty($compte)){
							$this->Compte->id = $compte['Compte']['id'];
							$old_solde = $compte['Compte']['solde'];
							$solde = $compte['Compte']['solde'] - $this->request->data['debit']['total'];
		// Modifier ligne pour débiter
							if($solde>=0){
								$this->Compte->saveField('solde', $solde);
								$this->set('solde', $solde);
		// Enregistrer la transaction dans la base d'opération.
								$this->Operation->create();
								$this->Operation->set(array(
									'id_membre' => $this->Compte->id,
									'operation' => - $this->request->data['debit']['total'],
									'debiteur' => $debiteur
								)); 
								$this->Operation->save();
		// Rajouter le total sur le compte du vendeur
								$this->Compte->id = $debiteur;
								$compte_vendeur = $this->Compte->findById($this->Compte->id);
								$this->Compte->saveField('solde', $compte_vendeur['Compte']['solde'] + $this->request->data['debit']['total']);
							}else{
								$this->set('message', "Vous n'avez que $old_solde € sur votre compte, ce n'est pas assez ! Transaction annulée.");
							}
						}else{
							$this->set('message', "Mauvais code de paiement, transaction annulée !");
						}
					}elseif(isset($this->request->data['debit']['total'])){
						$this->set('total', $this->request->data['debit']['total']);
						$this->set('debiteur', $this->request->data['debit']['debiteur']);
					}
				}else{
					$this->set('message', 'Il faut que le montant total de la vente soit positif.');
				}
			}
		}
	}
	

	public function donner(){
		if($this->Session->check('User.id_membre') == false OR $this->Session->check('User.password') == false){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_membre', $this->params['controller'], $this->params['action']));
		}else{
			$id_user = $this->Session->read('User.id_membre');
			$password_user = $this->Session->read('User.password');
			$this->set('title_for_layout', 'Donner de l\'argent');
			$this->loadModel('Compte');
	// Verifier POST
			if($this->request->is('POST')){
				if($this->request->data['Operation']['password_donner'] == $password_user){
					$total = -$this->request->data['Operation']['montant'];
					$id_recep = $this->request->data['Operation']['id_recep'];
		// Aller chercher password donneur -> Compte_donneur
					$compte_donneur = $this->Compte->findByPassword($password_user);
		// Vérifier id
					if(!empty($compte_donneur) and $compte_donneur['Compte']['id'] == $id_user){
		// Aller chercher id receveur -> compte_recep
						$compte_recep = $this->Compte->findById($id_recep);
		// Verifier que le numéro du compte de réception soit bien valide
						if(!empty($compte_recep)){
		// Verifier que le compte donneur est bien solvable
							if($compte_donneur['Compte']['solde']+$total >= 0){
		// Verifier que le montant est bien positif pour éviter de pouvoir voler de l'argent aux autres
								if($total < 0){
		// Inscrire dans opérations
									if($this->Operation->save(array(
										'id_membre' => $compte_donneur['Compte']['id'],
										'operation' => $total,
										'debiteur' => $compte_recep['Compte']['id']
									))){
		// Vérifier que le donneur et le bénéficiaire sont différents
										if($compte_donneur != $compte_recep){
		// debiter compte_donneur
											$this->Compte->id = $compte_donneur['Compte']['id'];
											$this->Compte->saveField('solde', $compte_donneur['Compte']['solde']+$total);
		// crediter compte_recep
											$solde_recep = $compte_recep['Compte']['solde']-$total;
											$this->Compte->id = $compte_recep['Compte']['id'];
											$this->Compte->saveField('solde', $solde_recep);
										}else{
											$solde_recep = $compte_recep['Compte']['solde'];
										}
		// Envoi du mail au bénéficiaire
										$total_mail = -$total;
										$message = nl2br($this->request->data['Operation']['message']);
										$to = $compte_recep['Compte']['mail'];
										App::uses('CakeEmail','Network/Email');
										$email = new CakeEmail('default');
										$email->to($to);
										$email->emailFormat('both');
										$email->viewVars(array(
											'total_mail' => $total_mail,
											'solde_recep' => $solde_recep,
											'message' => $message,
											'id' => $id_user
										));
										$email->template('donner');
										$email->subject("Un utilisateur vient de te donner $total_mail € sur BankInsa");
										$email->send();
		// message -> Done
										$mont = -$total;
										$this->set('valid', "La transaction de $mont € à bien été effectuée du compte n°$id_user au compte n°$id_recep .");
									}
								}else{
								// Cas montant négatif
								$this->set('message', "Le coup du solde négatif pour voler de l'argent à ses amis ne fonctionne pas, désolé. ");
								}
							}else{
								// Cas pas assez d'argent pour donner
								$solde_actuel = $compte_donneur['Compte']['solde'];
								$this->set('message', "Vous n'avez pas assez d'argent pour effectuer ce don, votre solde actuel est de $solde_actuel €.");
							}
						}else{
							// Cas identifiant recep non trouvé
							$this->set('message', 'Il y a une erreur dans la connexion au compte recepteur, vérifiez le numéro de compte sur lequel vousvoulez faire un virement');
						}
					}else{
						// Cas probleme connexion donneur
						$this->set('message', 'Il y a une erreur dans la connexion au compte donneur, vérifiez vos identifiants');
					}
				}else{
					$this->set('message', 'Mauvais mot de passe de paiement désolé.');
				}
			}
		}
	}
	
	public function show_all(){
	$this->set('title_for_layout', 'Toutes les transactions');
	//Lire tableau total
	// foreach --> Transformer tableau propre
	// envoyer tableau propre à afficher
	}
	
	public function timeline(){
		$this->set('title_for_layout', 'Timeline');
		if($this->Session->check('User.id_membre') == false OR $this->Session->check('User.password') == false){
			$this->redirect(array('controller' => 'Logins', 'action' => 'login_membre', $this->params['controller'], $this->params['action']));
		}else{
					$id_user = $this->Session->read('User.id_membre');
					$password_user = $this->Session->read('User.password');
	// Sélectionner les 20 premiers éléments correspondants à l'id
			$operations_base = $this->Operation->findAllById_membre($id_user, array(), array('date' => 'desc'));
	// Transformer tableau propre
			foreach($operations_base as $operation){
	// La date
				$date_str = $operation['Operation']['date'];
				$date_time = new DateTime($date_str);
				$date = date_format($date_time, '\L\e d M \2\0y \à H\hi');
	// Le débiteur
				$debiteur = $operation['Operation']['debiteur'];
				if($debiteur == 1){
					$to = 'à l\'amicale';
				}elseif($debiteur == 2){
					$to = 'au proximo' ;
				}elseif($debiteur == 3){
					$to = 'au PK';
				}else{
					$to = "à l'utilisateur n°$debiteur";
				}
	// Ecriture du tableau final
				
				$operations[$operation['Operation']['id']] = array(
					'operation' => $operation['Operation']['operation'],
					'date' => $date,
					'to' => $to
				);
			}
	// Envoyer à la vue
			if(!isset($operations)){
				$operations[-1] = array(
					'operation' => '0',
					'date' => 'Création du compte',
					'to' => ''
				);
			}
			$this->set('operations', $operations);
		}
	}
	
	public function recharger(){
	// Si POST : ENvoyer transaction paypal
	}
	
} ?>