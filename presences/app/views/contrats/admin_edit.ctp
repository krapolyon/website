<div class="contrats form">
<?php echo $form->create('Contrat');?>
	<fieldset>
 		<legend><?php __('Edit Contrat');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('lieu');
		echo $datePicker->picker('date_debut', array('label'=>'Date de début'));
		echo $datePicker->picker('date_fin', array('label'=>'Date de fin (si différent)'));
		echo $form->input('heure_debut', array('timeFormat'=>'24', 'empty' => true));
		echo $form->input('heure_fin', array('timeFormat'=>'24','empty' => true));
		echo $form->input('montant');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
