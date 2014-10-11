<?php
if(!isset($message)){
?>
		<div>
			<div class="sous-titre"> Soyez à jour : Consultez le solde de votre compte </div>
			<p> Avec BankInsa, vous pouvez voir votre solde en direct à tout moment. Le solde du compte n°<i style="color : rgba(255,100,100,1);"><?= $id_user; ?></i> est affiché dans le cadre ci-dessous : <br><br></p>
			<div class=" pk-title pay bg-banner-<?= $_SESSION['wall']; ?>"><center><?= $solde; ?>€</center></div>
		</div>
<?php 
} ?>