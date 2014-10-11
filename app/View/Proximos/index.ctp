<div>
	<div class="sous-titre">Bienvenue sur l'espace Proximo, le solde actuel du proximo est de <?= $solde; ?>€ </div>
	<p>Pour enregistrer un paiement, veuillez remplir les informations ci dessous :</p>
	<?= $this->Form->create('debit', array(
		'url' => array(
			'controller' => 'Operations',
			'action' => 'debiter'
		)
	)); ?>
	<?= $this->Form->input('total', array(
		'type' => 'number',
		'label' => 'Total de la commande :',
		'autofocus'
	)); ?>
	<?= $this->Form->hidden('debiteur', array('value' => '2')); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $_SESSION['wall'])); ?>
	<?= $this->Form->end('Payer'); ?>
	<?= $this->Html->link(
		'RAZ solde', 
		array(
			'controller' => 'Comptes',
			'action' => 'raz', 
			2,
		), 
		array(
			'class' => 'btn btn-two raz_btn',
			'style' => 'color : rgb(255,255,255);'
	)); ?>
</div>