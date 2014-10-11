<head>
	<link href='https://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<?php echo $this->Html->charset(); ?>
    <title>BankInsa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable='no'">
     <!-- Required -->
    <link rel="icon" href="images/favicon.png" type="image/png">
	<?= $this->fetch('meta'); ?>
	<?= $this->fetch('css'); ?>
	<?= $this->Html->css(array(
	    	'cake.generic',
	    	'global-style.css',
	    	'owl.carousel',
	        'boomerang',
	        '../assets/layerslider/css/layerslider.css',
	        'navigation',
	        'bootstrap-select.min',
	        'bootstrap-datepicker',
	        'magnific-popup',
	        'ladda-themeless.min',
	        'amicale',
	        'animations',
	        'bankinsa'
	    ), null, array('media' => 'screen')); ?>
</head>
