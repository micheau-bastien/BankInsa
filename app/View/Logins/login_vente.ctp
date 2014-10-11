<div>
	<div class="sous-titre"> Il faut vous connecter en tant que vendeur : </div>
	<p> En effet, pour sécuriser au mieux vos informations, il faut que votre appareil soit autorisé par l'équipe de BankInsa pour effectuer certaines actions. Pour cela, veuillez donner le mot de passe de vendeur :  </p>	
	<?= $this->Form->create('login'); ?>
	<?= $this->Form->input('password_vente', array(
		'type' => 'password',
		'label' => 'Mot de passe vendeurs :',
		'placeholder' => '*********',
		'autofocus'
	)); ?>
	<?= $this->Form->submit('S\'authentifier'); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end(); ?>
</div>