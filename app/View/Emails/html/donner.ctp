	<h3> Reception d'un versement : </h3><br><br>
	<p>L'utilisateur n°<?= $id; ?> vient de te faire un versement de <?= $total_mail; ?> €. Maintenant ton solde est de <?= $solde_recep; ?> € ! <br>
	<?php if($message != ""){ ?>
	 Celui qui t'a envoyé cet argent t'a aussi laissé le message suivant : 
	   <div style="margin : 50px; border : 1px solid rgba(70,70,70,0.7); border-radius : 3px;"><p style="margin : 5px;"><?= $message; ?></p></div>
	  <?php } ?>
	</p>
