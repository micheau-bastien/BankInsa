<?php
if(isset($nouveau_solde)){
	echo "<div class='sous-titre'>Vous avez bien rechargé votre compte</div>Félicitation, vous avez correctement rechargé votre compte ! Votre nouveau solde est $nouveau_solde €";
}else{
?>
	<div class="sous-titre">Redonnez un coup de fouet a votre compte : Rechargez le !</div>
	<p>De façon à pouvoir continuer à payer avec BankInsa dans tous les magasins partenaires, n'oubliez pas de revenir régulièrement à l'Amicale recharger votre compte. Il vous suffit de donner votre code de paiement :</p>
	<div>
		<?= $this->Form->create('crediter'); ?>
		<?= $this->Form->input('password', array(
			'label' => 'Code de paiement : ',
			'placeholder' => '*****',
			'autofocus'
		)); ?>
		<?= $this->Form->input('credit', array(
			'type' => 'number',
			'label' => 'Montant de la recharge'
		)); ?>
		<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
		<?= $this->Form->end('Crediter'); ?>
	</div>
<?php } ?>