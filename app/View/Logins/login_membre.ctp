<div>
	<div class="sous-titre"> Il faut vous connecter en tant que membre de BankInsa : </div>
	<p> Pour sécuriser au mieux les informations, il faut que votre appareil soit authentifié par l'équipe de BankInsa pour effectuer certaines actions. Pour cela, vous avez juste à remplir les informations suivantes vous concernant :  </p>
	<?= $this->Form->create('login'); ?>
	<?= $this->Form->input('id', array(
		'type' => 'number',
		'label' => 'Numéro de compte :',
		'placeholder' => '****',
		'autofocus'
	)); ?>
	<?= $this->Form->input('password_membre', array(
		'type' => 'password',
		'label' => 'Mot de passe de paiement : ',
		'placeholder' => '*****'
	)); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('S\'authentifier'); ?>
</div>