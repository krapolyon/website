<div class="fanfarons form">
<?php echo $form->create('Fanfaron');?>
	<fieldset>
 		<legend><?php __('Add Fanfaron');?></legend>
	<?php
		echo $form->input('name', array('label'=>'Nom'));
		echo $form->input('email');
		echo $form->input('instrument_id');
		echo $form->input('AutreInstrument', array('label'=>'Autre(s) instrument(s)', 'empty'=>true));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>