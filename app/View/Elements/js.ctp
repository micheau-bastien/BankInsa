<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->

<!-- Plugins -->

<?php echo $this->Html->script(array(
		'../assets/bootstrap/js/bootstrap.min',
		'modernizr.custom',
		'jquery.mousewheel-3.0.6.pack',
		'jquery.cookie',
		'jquery.easing',
    '../assets/hover-dropdown/bootstrap-hover-dropdown.min',
    '../assets/masonry/masonry',
    '../assets/page-scroller/jquery.ui.totop.min',
    '../assets/mixitup/jquery.mixitup',
    '../assets/mixitup/jquery.mixitup.init',
    '../assets/fancybox/jquery.fancybox.pack.js?v=2.1.5',
    '../assets/easy-pie-chart/jquery.easypiechart',
    '../assets/waypoints/waypoints.min',
    '../assets/sticky/jquery.sticky.js',
    'jquery.wp.custom',
    'jquery.wp.switcher',
    '../assets/layerslider/js/greensock.js',
    '../assets/layerslider/js/layerslider.transitions.js',
    '../assets/layerslider/js/layerslider.kreaturamedia.jquery.js',
    'navigation'
)) ; ?>
<?= $this->fetch('script'); ?>
<script>
	$(function(){
		$('.pg-opt').mouseover(function(){
			//this->class('Bout active dropdown');
			$('#container').css('opacity : 0.2;');
		});
			$('.navbar-wp').mouseover(function(){
			//this->class('Bout active dropdown');
			$('#container').css('opacity : 0.2;');
		});
		
		
	})(jQuery);
</script>