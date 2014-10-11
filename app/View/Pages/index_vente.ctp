<div class="container-fluid">
	<div class="sous-titre">Effectuer une action en tant que vendeur</div>
	<p> Vous êtes maintenant connecté en tant que vendeur de BankInsa, vous pouvez donc effectuer des actions dans les magasins suivants :</p>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-0 col-xs-8 col-xs-offset-2">
			<div class="col-sm-4">
				<div class="x-sous-titre">Proximo</div>
				<?= $this->Html->link('Vente', array('controller' => 'Proximos', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<div class="x-sous-titre">Amicale</div>
				<?= $this->Html->link('Vente', array('controller' => 'Amicales', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<div class="x-sous-titre"> Ptit Kawa</div>
				<?= $this->Html->link('Vente', array('controller' => 'Pks', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
				<?= $this->Html->link('Ajout produit', array('controller' => 'Pks', 'action' => 'ajouter_produit'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
				<?= $this->Html->link('Suppression produit', array('controller' => 'Pks', 'action' => 'supprimer_produit'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
		</div>
	</div>
</div>