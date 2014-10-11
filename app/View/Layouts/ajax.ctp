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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
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