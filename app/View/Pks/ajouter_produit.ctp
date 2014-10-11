<?php
if(isset($message)){

}else{
?>
	<div>
		<p>Ajouter un produit à vendre au PK</p>
		<?= $this->Form->create('pk'); ?>
		<?= $this->Form->input('nom', array(
			'label' => 'Nom du produit à ajouter :',
			'autofocus'
		)); ?>
		<?= $this->Form->input('prix', array(
			'type' => 'number',
			'label' => 'Prix du produit :'
		)); ?>
		<?= $this->Form->hidden('wallpaper', array('value' => $rand)); ?>
		<?= $this->Form->end('Ajouter'); ?>
	</div>
<?php } ?>