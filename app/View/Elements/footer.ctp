<footer class="row footer slice">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            	<div class="col">
                        <div class="raleway"> <div id="footer-link" class="footer-sous-titre">En cas de problème</div><br>Joindre :<br><a id="footer-link" href="mailto:micheau@etud.insa-toulouse.fr">micheau@etud.insa-toulouse.fr</a><br><div id="footer-link">06-87-77-61-25</div> <br><br></div>
                 </div>
            </div>

            <div class="col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            	<div class="col col-social-icons">
                    <div class="raleway">
                    	<div id="footer-link" class="footer-sous-titre">Suivre l'amicale</div><br>
                        <a href="https://www.facebook.com/amicale.deseleves?fref=ts"><i class="fa fa-facebook"></i></a>
                        <a href="http://www.youtube.com/channel/UCSLe5Xe4CES_-C5NVyPHIQw"><i class="fa fa-youtube-play"></i></a>
                        <a href="https://plus.google.com/106257023210132015292/posts"><i class="fa fa-google-plus"></i></a>
                        <br>
                        135 Avenue de Rangueil, 31400 Toulouse<br>
                    </div>

                </div>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
        	<div class="col-lg-11 col-xs-10 copyright raleway">
            	2014 Amicale Insa Toulouse. All rights reserverd.
            </div>
            <div class="col-lg-1 col-xs-2 footer-logo">
	        	<?= $this->Html->image('logo_amicale.png', array('alt' => 'BankInsa', 'height' => '50px')); ?>
            </div>
        </div>
    </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script type="text/javascript">
$(function() {
$(".wallpaper").on('touchstart', function(event){});
		$('.navbar-toggle').click(function(){
			$('.navbar-collapse').slideDown();
		});
    //create instance
		$('a').on('click',function(){
			var link = $(this);
			$('#corp').removeClass('entree-page');
			$('#corp').addClass('sortie-page');
			$(this).parent().removeClass('active');
			var pgurl = $(this).attr('href');
			$.each($(".navbar-right li a"), function(index, val){
				if($(this).attr('href') == pgurl){
					$(this).parent().addClass("active");
				}else{
					$(this).parent().removeClass("active");
				}
			})
			$.get(link.attr('href'),{},function(data){
				setTimeout(function(){
					$('.navbar-collapse').slideUp('fast');
					$('#corp').removeClass('sortie-page');
					$('#corp').addClass('entree-page');
					$('#corp').html(data);
				},450);
			});
			return false;
		});
    
	    $('.pie-chart').easyPieChart({
	        animate: 2000
	    });
	    /*$('a').click(function(){
	    	event.preventDefault();
	    	var link = $(this).attr("href");
	    	$('#corp').addClass('sortie-page');
	    	setTimeout(function(){
		    		location.href = link;
			}, 300); 
	    });*/
	    $("input[type='submit']").click(function(){
	    	event.preventDefault();
	    	var link = $(this).attr("href");
	    	$('#corp').addClass('sortie-page');
	    	setTimeout(function(){
				$('form').submit();
			},450); 
	    });
	    //update instance after 5 sec
	     /*$(document).ready( function() {
		    if ( $(window).width() < 992) {
		     $('footer').removeClass('bg-banner-<?= $rand; ?>');
		    }
		 });*/
});
</script>