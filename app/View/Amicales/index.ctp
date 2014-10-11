<div>
	<div class="sous-titre">Bienvenue sur l'espace Amicale, le solde actuel de l'Amicale est de <?= $solde; ?>€</div>
	<p> Remplissez les informations ci-dessous afin d'effectuer une vente : </p>
	<?= $this->Form->create('debit', array(
		'url' => array(
			'controller' => 'Operations',
			'action' => 'debiter'
		)
	)); ?>
	<?= $this->Form->input('total', array(
		'type' => 'number',
		'label' => 'Montant total du paiement :',
		'autofocus'
	)); ?>
	<?= $this->Form->hidden('debiteur', array('value' => '1')); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('Payer'); ?>
	<?= $this->Html->link(
		'RAZ solde', 
		array(
			'controller' => 'Comptes',
			'action' => 'raz', 
			1,
		), 
		array(
			'class' => 'btn btn-two raz_btn',
			'style' => 'color : rgb(255,255,255);'
	)); ?>
</div>