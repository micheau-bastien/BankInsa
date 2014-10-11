<div class="container-fluid">
	<div class="sous-titre"> Bienvenue sur BankInsa ! </div>	
	<p>BankInsa est un projet de paiement amicaliste pour l'INSA de Toulouse qui permet de dématerialiser l'argent à l'image d'une carte Monéo, mais sans la carte. Il permet ainsi d'acheter une bière en soirée sans avoir peur de perdre son porte feuille ou ses pièces, plus de problèmes non plus pour acheter au proximo quand on n'a pas son porte feuille sur soi ou que l'on n'a pas de monnaie.</p><br>
	
	<div class="sous-titre"> La sécurité </div>
	<p>La sécurité est un élément très important pour BankInsa, c'est pourquoi elle a été longuement réfléchie de façon à pouvoir assurer une certaine tranquillité d'esprit pour les utilisateurs.</p>
	<div class="row">
		<div class="col-sm-6 col-xs-12">
			<div class="x-sous-titre">Coté utilisateur</div>
			<p>Pour l'utilisateur, la sécurité s'axe selon deux principes d'authentification afin de payer : <br><br>
				- Un premier simple, lors d'une vente directe à l'amicale, au proximo ou au PK. Il suffit de rentrer son code à 5 chiffres (Stocké dans la base de donnée sous sa forme 'hashée') via un pavé numérique USB (<a href="http://www.ebay.fr/itm/17-Touches-USB-Nombre-Calculatrice-de-clavier-pave-numerique-pour-ordinateur-/301162498753?pt=FR_JG_Informatique_Peripheriques_Claviers&hash=item461eaf0ac1">3,30€ sur eBay</a>). De cette façon il sera rapide et aisé de payer sans perdre en sécurité : Si l'on compte un maximum de 4 000 personnes utilisant ce système et 89 999 combinaisons possibles (les 10 000 premières sont enlevées pour n'avoir que des codes à 5 chiffres), cela donne une probabilité de succès de 4,44% avec un code aléatoire. Ce qui empêchera les utilisateurs de tester des codes aléatoires lors d'un paiement en magasin. En effet cette interface de paiement n'est disponible qu'avec les PC authentifiés comme vendeurs (ceux de l'amicale et du proximo par exemple).<br>
				
				- Un second système d'authentification plus complexe par internet pour l'utilisateur, où il doit fournir en plus de son code personnel, son numéro de compte. Dans le cas de 4000 utilisateurs cela correspondrait à un code à 8 chiffres brut ( soit 0,0044% de chances de succès). Ce système est mis en place pour voir son solde ou donner de l'argent à un autre utilisateur par exemple.
			</p>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="x-sous-titre">Pour les vendeurs</div>
			<p>De façon à éviter que l'utilisateur puisse accéder à des parties du site concernant la vente ou la recharge des comptes, il a été mis en place deux mots de passe pour autoriser un ordinateur à accéder aux parties qui le concernent : <br>
			- Mot de passe Amicale pour accéder à la création d'un compte, la suppression d'un compte, la recharge des comptes.<br>
			- Mot de passe vendeur pour accéder aux ventes et ajout/suppression de produit du proximo, de l'amicale et du PK.	<br>
			Seuls les membres de la Com'Technique auront ces mots de passes et iront authentifier les ordinateur et smartphones concernés. En cas de problèmes, un reset des mots de passe désauthentifiera tous les terminaux. 
			<br><br>
			De plus, en cas de défaillance du système, toutes les opérations sont stockées avec la date et l'heure de l'opération dans une base de donnée.</p>
		</div>
	</div>
	<br><br>
	
	<div class="sous-titre"> La faisabilité </div>
	<p class="delay-0.2"> Ce programme aurait l'avantage de couter moins de 10€ à l'Amicale pour être mis en place sur les ordinateurs de l'amicale et du proximo. Reste la question du PK qui n'est pas équipé d'ordinateur. <br>
	Dans un premier temps, il avait été envisagé de passer par des smartphones pour payer au PK, ainsi BankInsa est doté d'une version mobile appropriée sur les pages relatives à la vente du PK et l'encaissement d'un paiement client. Ce qui permettrait au client de valider un paiement sans que le vendeur n'ait à lâcher le smartphone des mains.<br>
	Cependant, il est toujours possible d'installer un ordinateur au PK si les membres ne disposent pas de suffisamment de smartphones.</p>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">	
			<div class="x-sous-titre">Pourquoi ne pas intégrer BankInsa au site de l'amicale ?</div>
			<p>Effectivement au commencement du projet, il avait été pensé de n'en faire qu'un onglet à ajouter au site de l'Amicale. Cependant, la CNIL interdit de stocker dans la même base de donnée les noms/prénoms/informations sur le client avec le suivi de leurs achats. C'est pourquoi, la seule information personnelle demandée par BankInsa est une adresse mail qui peut tout à fait être différente de celle entrée sur les bases de données de l'Amicale. De cette façon les opérations de BankInsa seront totalement anonymes.</p>
		</div>
	</div>
			
			
			
	<div class="sous-titre"> <br><br>L'avenir </div>
	<p>Il est encore possible d'améliorer ce projet de plusieurs façons : </p>
	<div class="row">
		<div class="col-sm-6 col-xs-12">
			<div class="x-sous-titre">Le site en lui même</div>
			<p>Le site pour évoluer a quelques possibilités. Il faudrait réussir à coupler le système de Paiement en ligne par carte bleue de l'Amicale avec BankInsa. De cette façon il sera possible de recharger son compte BankInsa sans avoir besoin d'avoir de la monnaie ou de faire un chèque à l'Amicale.<br>
			De plus, avant la sortie réelle de BankInsa, les menus vont être totalement remaniés de façon à n'afficher à l'utilisateur que les options qui le concernent, l'utilisateur normal ne verra pas ce qui concerne les vendeurs et l'amicale. Un lien vers le site de l'amicale sera alors mis en place.</p>
		</div>
		<div class="col-sm-6 col-xs-12">
			<div class="x-sous-titre">Proximo et Amicale</div>
			<p>Il est en effet possible de modifier le logiciel du proximo afin qu'il envoie lui même la requête appropriée à BankInsa de façon à éviter d'avoir à jongler avec les fenêtres et à devoir retaper le montant de l'achat à chaque fois. <br>BankInsa peut aussi évoluer afin d'interagir au mieux avec la caisse de l'amicale. </p>
		</div>
	</div>
</div>