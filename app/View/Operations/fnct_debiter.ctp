<div class='sous-titre'>Payer $to </div>
<p>Voici ce que vous devez payer afin de valider votre commande :</p>
<section class='slice pay bg-banner-$rand'>
	<center><div class='pk-title'> $total €</div></center>
</section>
<section class='desktop_pay'>";
	<?php echo $this->Form->create('Operation');
		echo $this->Form->input('password', array(
			'placeholder' => '*****',
			'label' => 'Mot de passe de paiement :',
			'maxlenght' => '5',
			'autofocus',
			'required',
			'class' => "mdp"
		));
		echo $this->Form->hidden('total', array('value'=> $total));
		echo $this->Form->hidden('debiteur', array('value'=> $debiteur));
		echo $this->Form->submit('Valider le paiment', array(
			'class' => 'btn btn-primary'
		));
		echo $this->Form->end();
	?>
</section>
<section class="mobile_pay">
<?php echo $this->Form->create('Operation');
				echo $this->Form->hidden('password', array('class' => "mdp"));
				echo $this->Form->hidden('total', array('value'=> $total));
				echo $this->Form->hidden('debiteur', array('value'=> $debiteur));?>
	<table class="thini">
		<tr class="tab_pay">
			<td class= "num" id='table_pay'><center>7</td><td class= "num" id='table_pay'><center>8</td><td class= "num" id='table_pay'><center>9</td>
		</tr>
		<tr class="tab_pay">
			<td class= "num"  id='table_pay'><center>4</td><td class= "num"  id='table_pay'><center>5</td><td class= "num"  id='table_pay'><center>6</td>
		</tr>
		<tr class="tab_pay">
			<td class= "num"  id='table_pay'><center>1</td><td id='table_pay' class= "num"><center>2</td><td id='table_pay' class= "num"><center>3</td>
		</tr>
		<tr class="tab_pay">
			<td id='table_pay' class= "num"><center>0</td><td id="supp" id='table_pay'><center><div>Supp.</div></td><td><center>
				<?php
				echo $this->Form->submit('Val.', array('id' => "mobile_submit"));
				echo $this->Form->end();?></td>
		</tr>
	</table>
	<div class='bs-callout bs-callout-info'><h4 class="aff">Code :</div></h4>
		
	</div>
</section>
<script>
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
