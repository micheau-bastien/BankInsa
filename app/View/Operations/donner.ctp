<?php
if(isset($valid)){
	echo $valid;
}else{
?>

<div class="sous-titre"> Effectuer un virement sur le compte d'un ami : </div>
<p>Avec BankInsa, il est facile de donner de l'argent à un ami ! Vous n'aurez plus de problèmes de monnaie ou de dettes vieillissantes d'un repas avancé ! Il vous suffit de savoir le numéro de compte de la personne à qui vous voulez donner de l'argent et de remplir les informations ci-dessous : </p>
	<?= $this->Form->create('Operation'); ?>
	<?= $this->Form->input('password_donner', array(
		'type' => 'password',
		'label' => 'Mot de passe de paiement :',
		'placeholder' => '*****',
		'autofocus',
		'autocomplete' => 'off'
	)); ?>
	<?= $this->Form->input('id_recep', array(
		'type' => 'number',
		'label' => 'Numéro de compte du bénéficiaire :',
		'placeholder' => '*****',
		'autocomplete' => 'off'
	)); ?>
	<?= $this->Form->input('montant', array(
		'type' => 'Number',
		'label' => "Montant de la transaction :",
		'autocomplete' => 'off'
	)); ?>	
	<?= $this->Form->input('message', array(
		'label' => 'Message pour le bénéficiaire :',
		'type' => 'textarea'
	)); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('Envoyer la transaction'); ?>
<?php } ?>