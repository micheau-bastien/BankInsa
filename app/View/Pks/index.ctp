<div class="sous-titre">Bienvenue sur l'espace PK, actuellement, le solde du PK est de <?= $solde; ?>€</div>
<p> Afin d'effectuer une vente, veuillez sélectionner les boissons vendues :</p>
<section class="slice pay bg-banner-<?= $rand;?>" id="horizontal">
	<div class='carousel'>
		<?php
		foreach($produits as $produit){
			$id_produit = $produit['Pk']['id'];
			echo "<div class='item thini' id=$id_produit>";
			echo "<div id=nb$id_produit></div>";
			echo $produit['Pk']['nom'];
			echo "</div>";
		}
		?>
	</div>
</section>
<div>
	<?= $this->Form->create('debit', array(
		'url' => array(
			'controller' => 'Operations',
			'action' => 'debiter'
		)
	)); ?>
	<?= $this->Form->input('total', array(
		'type' => 'number',
		'id' => 'total',
		'label' => 'Total de la commande :'
	)); ?>
	<?= $this->Form->hidden('debiteur', array('value' => '3')); ?>
	<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
	<?= $this->Form->end('Payer'); ?>
	<?= $this->Html->link(
		'RAZ solde', 
		array(
			'controller' => 'Comptes',
			'action' => 'raz', 
			3,
		), 
		array(
			'class' => 'btn btn-two raz_btn',
			'style' => 'color : rgb(255,255,255);'
	)); ?>

</div>
<script src="https://code.jquery.com/jquery.min.js"></script>
<?= $this->Html->script('owl.carousel.min'); ?>
<script>
	(function($){
		var total = 0;
		$('.clickable').click(function(){
			total = total +1.45;
			$('#total').val(total);
			$('#nb').text($('#nb').text()+1)
		});
		<?php
		foreach($produits as $produit){
			$id_produit = $produit['Pk']['id'];
			$prix_produit = $produit['Pk']['prix'];
			?>
			var prix<?= $id_produit; ?> = <?= $prix_produit; ?>;
			var nb<?= $id_produit; ?> = 0;
			$('#<?= $id_produit; ?>').click(function(){
				total = total + <?= $prix_produit; ?>;
				$('#total').val(total);
				nb<?= $id_produit; ?> = nb<?= $id_produit; ?>+1;
				$('#nb<?= $id_produit; ?>').html(nb<?= $id_produit; ?>);
			});
			<?php
		}
		?>
	})(jQuery);
</script>