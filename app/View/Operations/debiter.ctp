<?php
// Si la vente est déjà effectuée et validée :
if(isset($solde)){
?>
	<div class="container-fluid">
		<div class='sous-titre'>Paiement accepté</div> 
		<p>Votre nouveau solde est de <?= $solde; ?>€.</p>
		
		<div class="row" style="margin-top : 20px;">
				<div class="col-sm-4">
					<?= $this->Html->link('Nouvelle vente PK', array('controller' => 'Pks', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
				</div>
				<div class="col-sm-4">
					<?= $this->Html->link('Nouvelle vente Proximo', array('controller' => 'Proximos', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
				</div>
				<div class="col-sm-4">
					<?= $this->Html->link('Nouvelle vente Amicale', array('controller' => 'Amicales', 'action' => 'index'), array('class' => 'btn btn-info btn-lg', 'style' => 'color :white;')); ?>
				</div>
		</div>
	</div>
<?php
}else{
	// Si la vente est faite par un des controlleur de vente :
	if(isset($total)){
		echo "<div class='sous-titre'>Payer $to </div><p>Voici ce que tu dois payer afin de valider ta commande :</p><section class='slice pay bg-banner-";
		echo $_SESSION['wall'];
		echo "'><center><div id='titre'> $total €</div></center></section>";
		echo "<section class='desktop_pay'>";
			echo $this->Form->create('debit');
			echo $this->Form->input('password_debit', array(
				'type' => 'password',
				'placeholder' => '*****',
				'label' => 'Mot de passe de paiement :',
				'maxlenght' => '5',
				'autofocus',
				'required',
				'class' => "mdp",
				'autocomplete' => 'off'
			));
			echo $this->Form->hidden('total', array('value'=> $total));
			// FAILLE DE SECURITEE : Si modification du code source sur un PC enregistré pour n°compte perso : enrichissement. Limité par le password vendeur mais reste faiblesse.
			echo $this->Form->hidden('debiteur', array('value'=> $debiteur));
			echo $this->Form->submit('Valider le paiment', array(
				'class' => 'btn btn-primary'
			));
			echo $this->Form->end();
		echo "</section>";
		?>
		<div class="mobile_pay">
		<?php 
		// Seulement pour les mobiles, de façon à pouvoir encaisser un paiement sans lacher le smartphone.
		echo $this->Form->create('debit');
						echo $this->Form->unlockField('debit.password');
						echo $this->Form->hidden('password_debit', array('type' => 'password', 'class' => "mdp", 'autocomplete' => 'off'));
						echo $this->Form->hidden('total', array('value'=> $total));
						echo $this->Form->hidden('debiteur', array('value'=> $debiteur));?>
						<div class='bs-callout bs-callout-info'><h4 class="aff">Code :</h4></div>
						

			<table class="thini " id="matable" style="width : 100%;">
				<tr class="tab_pay">
					<td class= "num" >7</td><td class= "num" >8</td><td class= "num" >9</td>
				</tr>
				<tr class="tab_pay">
					<td class= "num"  >4</td><td class= "num"  >5</td><td class= "num"  >6</td>
				</tr>
				<tr class="tab_pay">
					<td class= "num"  >1</td><td  class= "num">2</td><td  class= "num">3</td>
				</tr>
				<tr class="tab_pay">
					<td></td>
					<td  class= "num">0</td>
					<td></td>
				</tr>
			</table>
			<table id="matable" class="" style="width : 100%;">
				<tr>
					<td id="supp" class="thini">Supp.</td>
					<td class="thini">
								<?php
								echo $this->Form->submit('Valider', array('id' => "mobile_submit"));
								echo $this->Form->hidden('wallpaper', array('value' => $rand));
								echo $this->Form->end();?></td>
				</tr>
			</table>
		</div>
<?php		
	}else{
	// Si la vente à foiré :
	?>
		<div>
			<?= $this->Form->create('debit'); ?>
			<?= $this->Form->input('total', array('autofocus')); ?>
			<?= $this->Form->input('debiteur', array(
				'options' => array('1' => 'Amicale', '2' => 'Proximo', '3' => 'PK')
			)); ?>
			<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
			<?= $this->Form->end('Payer'); ?>
		</div>
<?php 
	}
}?>
<script src="https://code.jquery.com/jquery.min.js"></script>

<script>
	// Script du pavé numérique tactile pour mobile
	var code = "";
	var aff = "Code : ";
		$('.num').click(function(){
			code = code + $(this).html();
			aff = aff + "*";
			$('.mdp').val(code);
			$('.aff').text(aff);
		});
		$('#supp').click(function(){
			code = "";
			aff = "Code : ";
			$('.mdp').val(code);
			$('.aff').text(aff);
		});
</script>