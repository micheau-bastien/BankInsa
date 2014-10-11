<div class="container-fluid">
	<div class="sous-titre">Se connecter sur BankInsa</div>
	<p> Pour utiliser les fonctionnalités de BankInsa, vous devez être connecté autant que possible. Voici les différentes connexions possibles : </p>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-0 col-xs-8 col-xs-offset-2">
			<div class="col-sm-4">
				<?= $this->Html->link('Membre', array('controller' => 'Logins', 'action' => 'login_membre', 'Pages', 'display'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<?= $this->Html->link('Vendeur', array('controller' => 'Logins', 'action' => 'login_vente', 'Pages', 'index_vente'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
			<div class="col-sm-4">
				<?= $this->Html->link('Amicale', array('controller' => 'Logins', 'action' => 'login_amicale', 'Pages', 'index_amicale'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
			</div>
		</div>
	</div>
</div>