<header class="row">    
	<div id="navOne" class="navbar navbar-wp solid" role="navigation">
        <div class="container ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" id="titre-gen" href="https://etud.insa-toulouse.fr/~micheau" title="BankInsa">
                	<?= $this->Html->image('logo_amicale.png', array('alt' => 'BankInsa', 'width' => '40px', 'style' => 'margin : 4px')); ?>
                	BankInsa
                </a>
            </div>
            <div class="navbar-collapse collapse anim_r lato ">
                <ul class="nav navbar-nav navbar-right">
                	<li class="dropdown">
                    	<?= $this->Html->link(
                    		'Index',
                    		array(
	                    		'controller' => 'pages',
	                    		'action' => 'home'
	                    	),
	                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
	                    		'data-close-others' => 'true'
	                    	)
                    	);?>
	            	</li>
                	<li class="dropdown">
                    	<?= $this->Html->link(
                    		'Voir solde',
                    		array(
	                    		'controller' => 'Comptes',
	                    		'action' => 'voir_solde'
	                    	),
	                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
	                    		'data-close-others' => 'true'
	                    	)
                    	);?>
	            	</li>
                	<li class="dropdown">
                    	<?= $this->Html->link(
                    		'Historique',
                    		array(
	                    		'controller' => 'Operations',
	                    		'action' => 'timeline'
	                    	),
	                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
	                    		'data-close-others' => 'true'
	                    	)
                    	);?>
	            	</li>
                	<li class="dropdown">
                    	<?= $this->Html->link(
                    		'Virements',
                    		array(
	                    		'controller' => 'Operations',
	                    		'action' => 'donner'
	                    	),
	                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
	                    		'data-close-others' => 'true'
	                    	)
                    	);?>
	            	</li>

	            	<?php
	            	if($this->Session->check('password_vente')){
	            	?>
		       			<li class="dropdown">
	                    	<?= $this->Html->link(
	                    		'Vendeurs',
	                    		array(
	                    			'controller' => 'Pages',
	                    			'action' => 'index_vente'
	                    		),
		                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
		                    		'data-close-others' => 'true',
		                    		'disabled'
		                    	)
	                    	);?>
	                        <ul class="dropdown-menu">
	                            <li><?= $this->Html->link('Proximo', array('controller' => 'Proximos', 'action' => 'index')); ?></li>
	                            <li><?= $this->Html->link('Amicale', array('controller' => 'Amicales', 'action' => 'index')); ?></li>
	                            <li class="dropdown-submenu">
	                            	<a tabindex="-1" href="#">Ptit Kawa</a>
	                            	<ul class="dropdown-menu" style="display : none">
	                            		<li><?= $this->Html->link('Vente', array('controller' => 'Pks', 'action' => 'index'), array('tabindex' => '-1')); ?></li>
	                            		<li><?= $this->Html->link('Ajout produit', array('controller' => 'Pks', 'action' => 'ajouter_produit'), array('tabindex' => '-1')); ?></li>
	                            		<li><?= $this->Html->link('Suppression produit', array('controller' => 'Pks', 'action' => 'supprimer_produit'), array('tabindex' => '-1')); ?></li>
	                            	</ul>
	                            </li>
	                        </ul>
                        </li>
                    <?php
                    }
                    if($this->Session->check('password_amicale')){
                    ?>
                        
                        <li class="dropdown">
	                    	<?= $this->Html->link(
	                    		'Amicale',
	                    		array(
		                    		'controller' => 'Pages',
		                    		'action' => 'index_amicale'
		                    	),
		                    	array(
			                    	'class' => 'dropdown-toggle',
		                    		'data-toggle' => 'dropdown',
		                    		'data-hover' => 'dropdown',
		                    		'data-close-others' => 'true'
		                    	)
	                    	);?>
	                        <ul class="dropdown-menu">
		                        <li><?= $this->Html->link('Crediter compte', array('controller' => 'Operations', 'action' => 'crediter')); ?></li>
	                            <li><?= $this->Html->link('Ajouter membre', array('controller' => 'Comptes', 'action' => 'ajouter')); ?></li>
	                            <li><?= $this->Html->link('Supprimer membre', array('controller' => 'Comptes', 'action' => 'supprimer')); ?></li>
		                        <li><?= $this->Html->link('Site', array('http://amicale-insat.fr')); ?></li>
	                        </ul>
                        </li>
                    <?php
                    }
                    ?>
                   <li class="dropdown <?php if($this->params['controller'] == 'Logins'){echo 'active';} ?>">
                    	<?= $this->Html->link(
                    		'Connexions',
                    		array(
	                    		'controller' => 'Pages',
	                    		'action' => 'index_connexion'
	                    	),
	                    	array(
		                    	'class' => 'dropdown-toggle',
	                    		'data-toggle' => 'dropdown',
	                    		'data-hover' => 'dropdown',
	                    		'data-close-others' => 'true'
	                    	)
                    	);?>
                        <ul class="dropdown-menu">
	                        <li><?= $this->Html->link('Connexion membre', array('controller' => 'Logins', 'action' => 'login_membre', 'Pages', 'display')); ?></li>
                            <li><?= $this->Html->link('Connexion vendeur', array('controller' => 'Logins', 'action' => 'login_vente', 'Pages', 'index_vente')); ?></li>
                            <li><?= $this->Html->link('Connexion amicale', array('controller' => 'Logins', 'action' => 'login_amicale', 'Pages', 'index_amicale')); ?></li>
	                        <li><?= $this->Html->link('Deconnexion', array('controller' => 'Logins', 'action' => 'logout')); ?></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>