<div>
	<div class="sous-titre"> Il faut vous connecter en tant que membre de l'amicale : </div>
	<p> En effet, pour sécuriser au mieux vos informations, il faut que votre appareil soit autorisé par l'équipe de BankInsa pour effectuer certaines actions. Pour cela, veuillez donner le mot de passe de l'amicale :  </p>
	<?= $this->Form->create('login'); ?>
	<?= $this->Form->input('password_amicale', array(
		'type' => 'password',
		'label' => 'Mot de passe de l\'amicale :',
		'placeholder' => '**********',
		'autofocus'
	)); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('S\'authentifier'); ?>
</div>