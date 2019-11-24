<div class="users form">
<?php echo $form->create('User', array('controller' => 'users', 'action' => 'login'));?>
	<fieldset>
 		<legend><?php __('Merci de vous authentifier');?></legend>
	<?php
		echo $form->input('username', array('label' => 'Nom d\'utilisateur'));
		echo $form->input('password', array('label' => 'Mot de passe'));
	?>
	</fieldset>
<?php echo $form->end('Valider');?>
</div>