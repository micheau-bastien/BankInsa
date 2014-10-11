<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>BankInsa</title>
</head>
<body>
	<div style="
		color : black;
		margin : 3%;
		border : 1px solid rgba(200,70,70,0.9);
		border-radius : 11px;
		font-family: 'Raleway'
	">
		<div style="
			background : rgba(200,70,70,0.9);
			border-top-left-radius : 10px;
			border-top-right-radius : 10px;
		"> <center style="color : white; font-size : 1.8em;"><a href="https://etud.insa-toulouse.fr/~micheau/Operations/donner" style="color : white; text-decoration: none; ">BankInsa</a></center></div>
		<div style="
			margin : 15px;
			font-size : 1.2em;
			font-family: 'Lato', sans-serif;
		">
	<?php echo $this->fetch('content'); ?>		
		</div>
		<div style="
			display : block;
			position : static;
			bottom : 0%;
			border-bottom-left-radius : 10px;
			border-bottom-right-radius : 10px;
			color : black;
			border-top : 1px solid red;

		">
		<p style="
			color : black;
			margin : 10px;
		">A très bientôt sur <a href="https://etud.insa-toulouse.fr/~micheau" style="color : red; text-decoration: none; ">BankInsa</a>,<br>
		L'équipe de BankInsa.</p>
		</div>
	</div>
</body>
</html>