<?php
if(isset($message)){

}else{
		foreach($produits as $produit){
			$nom[$produit['Pk']['id']] = $produit['Pk']['nom'];
		}
?>
		<div>
			<p>Quel produit voulez vous supprimer ?</p>
			<?= $this->Form->create('pk'); ?>
			<?= $this->Form->input('produit', array(
				'options' => $nom ,
				'label' => '',
				'autofocus'
			)); ?>
			<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
			<?= $this->Form->end('Supprimer'); ?>
		</div>
<?php } ?>