<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Nouvel utilisateur');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('firstname', array('label' => 'Prénom'));
		echo $form->input('name', array('label' => 'Nom'));
		echo $form->input('email');
		echo $form->input('telephone', array('label' => 'Téléphone'));
		echo $form->input('username', array('label' => 'Identifiant'));
		echo $form->input('password', array('label' => 'Mot de passe'));
		echo $form->input('Group', array('label' => 'Groupes'));
		echo $form->input('commentaire');
	?>
	</fieldset>
<?php echo $form->end('Valider');?>
</div>
