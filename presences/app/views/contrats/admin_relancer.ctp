<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Retour au contrat', true), array('action'=>'view', $contrat_id));?></li>
	</ul>
</div>
<div class="form">
<?php echo $form->create(null, array('action' => 'relancer'));?>
	<fieldset>
 		<legend><?php __('Relancer');?></legend>
	<?php
		echo $form->hidden('contrat_id', array('value'=> $contrat_id));
		echo $form->input('subject', array('value' => $subject, 'label' => 'Sujet'));
		echo $form->input('from', array('value' => $from, 'label' => 'Expéditeur'));
		echo $form->input('to', array('value' => $to, 'type'=>'textarea', 'label' => 'Destinataires','rows' => 3));
		echo $form->input('message', array('value' => $message, 'type'=>'textarea', 'label' => 'Contenu du message', 'rows' => 8));
	?>
	</fieldset>
<?php echo $form->end('Envoyer');?>
</div>
