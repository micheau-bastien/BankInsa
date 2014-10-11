<div class="sous-titre"> Voici la liste des dernières opérations que vous avez faites</div>
<p>Sur ce site, vous pouvez à tout moment consulter la totalité des opérations que vous avez effectuées au court du temps. Avec BankInsa, tout le monde peut être certain de savoir si il a bien remboursé une dette. </p>		
<ul class="timeline">
	<li class="year" style="opacity : 0;">2014</li>
	<li class="event offset-first">
		<div class="sous-titre "><?= date('Y-m-d'); ?></div>
	</li>
	<?php foreach($operations as $operation){ ?>
	<li class="event ">
		<div class="event-date event-body"><?= $operation['date']; ?> </div>
		<div class="sous-titre "><?= $operation['operation']; ?>€</div>
		<div class="event-footer ">
			<?php if($operation['to'] == 'à l\'utilisateur n°Credit'){
				echo "Ont été rechargés sur votre compte";
			}else{
				echo "Ont été payés ";
				echo $operation['to'];
				echo ".";
			}?>
			
		</div>
	</li>
	<?php } ?>
</ul>
