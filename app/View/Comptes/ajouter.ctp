
<?php
if (isset($password)){
	echo "<div class='sous-titre'>Félicitation pour ton inscription</div><p>Bravo ! Tu es maintenant inscrit sur BankInsa, un mail vient de t'être envoyé avec toutes les informations nécéssaires pour te connecter et pour payer un peu partout dans l'INSA !";
}else{
?>
	<div>
	<div class="sous-titre">Inscrire un nouveau membre sur BankInsa</div>
	<p> Pour avoir accès à toutes les fonctionnalités de BankInsa, il vous suffit d'être inscrit. Pour cela, rentrez juste votre adresse mail dans le champ suivant et validez :</p>
	<?= $this->Form->create('ajout'); ?>
	<?= $this->Form->input('mail', array(
		'label' => 'Adresse e-mail :',
		'placeholder' => '********@etud.insa-toulouse.fr',
		'autofocus'
	)); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('Inscrire'); ?>
	</div>
<?php } ?>