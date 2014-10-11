<div class="container-fluid">
	<div class="sous-titre">Effectuer une action en tant qu'amicale</div>
	<p> Vous êtes maintenant connecté en tant qu'amicale de BankInsa, vous pouvez donc effectuer les actions suivantes :</p>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-0 col-xs-8 col-xs-offset-2">
			<div class="col-sm-4">
				<?= $this->Html->link('Crediter compte', array('controller' => 'Operations', 'action' => 'crediter'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<?= $this->Html->link('Ajouter membre', array('controller' => 'Comptes', 'action' => 'ajouter'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<?= $this->Html->link('Supprimer membre', array('controller' => 'Comptes', 'action' => 'supprimer'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
		</div>
	</div>
</div>