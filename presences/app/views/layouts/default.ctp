<?php
/* SVN FILE: $Id: default.ctp 7690 2008-10-02 04:56:53Z nate $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7690 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-10-02 00:56:53 -0400 (Thu, 02 Oct 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Krap-o-pr&eacute;sences'); ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><a href="/presences/"><?php titre_aleatoire(); ?></a></h1>
		</div>
		<div id="content">
			<div style="text-align:right">
				<?php
				if(isset($_SESSION['Auth']['User']['id'])) {
					echo $_SESSION['Auth']['User']['username']." - ";
					echo $html->link(__('Profil', true), array('controller'=> 'users', 'action'=>'edit', $_SESSION['Auth']['User']['id']))." - ";
					echo $html->link('Logout', array('controller'=> 'users', 'action'=>'logout'));
				}
				 ?>
			</div>

			<?php
			if(isset($_SESSION['isAdministrateur']) && $_SESSION['isAdministrateur'] == 1) {
			?>
				<div class="actions">
					<ul>
						<li><?php echo $html->link(__('Contrats', true), array('controller'=> 'contrats', 'action'=>'index')); ?> </li>
						<li><?php echo $html->link(__('Fanfarons', true), array('controller'=> 'fanfarons', 'action'=>'index')); ?> </li>
					</ul>
				</div>
				<hr style="background-color:grey;border:0px;height:1px;margin-top:5px;margin-bottom:5px" />
			<?php
			}
      else {
        ?>
      <div class="actions">
        <ul>
          <li><?php echo $html->link('Administration', '/admin/', array('class' => 'buttonLink')) ?> </li>
          <li> <a class="buttonLink" href="https://drive.google.com/drive/folders/1sQhu97O70khdzp4n2_WiZ-kzLT2_Dxve?usp=sharing">Lien vers le drive</a> </li>
          <li><?php echo $html->link(__('Maxi Tableau', true), array( 'controller'=> 'fanfarons', 'action'=>'index'), array( 'class' => 'buttonLink')); ?> </li>
          <li><?php echo $html->link(__('Contrats', true), array('controller'=> 'contrats', 'action'=>'index'), array( 'class' => 'buttonLink')); ?> </li>
          <li><?php echo $html->link(__('Fanfarons', true), array('controller'=> 'fanfarons', 'action'=>'menu'), array('class' => 'buttonLink' )); ?> </li>
        </ul>
			</div>
			<?php
			}
			$session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
