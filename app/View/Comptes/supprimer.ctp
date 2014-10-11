<?php
if(isset($solde)){
	echo "Il restait $solde € sur votre compte.";
}else{
?>
	<div class="sous-titre">Vous quittez l'INSA ? Résiliez votre compte !</div>
	<p>Lorsque vous quittez l'INSA il vous suffit de supprimer votre compte de façon irreversible auprès de l'amicale pour qu'ils vous remboursent ce que vous aviez sur votre compte BankInsa. Pour cela, donnez juste une dernière fois votre mot de passe de paiement :</p>
	<div>
	<?= $this->Form->create('supprimer'); ?>
	<?= $this->Form->input('password', array(
		'label' => 'Mot de passe de paiement :',
		'placeholder' => '*****',
		'autofocus'
	)); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('Supprimer'); ?>
	</div>
<?php } ?>