<!DOCTYPE html>
<html>
	<?= $this->element('head'); ?>
	<body>
		<?php 		
		// Gestion des fonds d'écrans : Création d'un nouveau fond d'écran au lancement du site et au rechargement pur de la page, conservation du wallpaper en cas de chargement POST. On pass ici par les variables sessions pour pouvoir acceder sans soucis à cette variable depuis les vues Voire_solde et débiter qui utilisent des cadres. Pas très propre mais obligatoire pour y avoir accès. Pour rendre le code plus propre il est possible de passer par le helper Session, cependant pour l'instant il ne trouve pas la méthode write du helper.
			if(!isset($_SESSION['wall'])){
				$_SESSION['wall'] = rand(1,7);
			}
		?>
		<div class="wallpaper site-bg-<?= $_SESSION['wall']; ?>">
			<div class="container-fluid">
				<?= $this->element('header'); ?>
				<div id="corp" class="entree-page">
					<?= $this->element('titre'); ?>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 col-xs-12">
							<?php if(isset($message)){
								echo "<div class='row bs-callout bs-callout-warning'><h4>Message :</h4>";
								echo $message;
								echo "</div>";
							}?>
							<div class="row">
								<?= $this->Session->flash(); ?>
							</div>
								<?= $this->fetch('content'); ?>
						</div>
					</div>
				</div>
				<?= $this->element('footer'); ?>
				<?= $this->element('js'); ?>			
			</div>
		</div>
	</body>
</html>