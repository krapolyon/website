<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Retour', true), '/'); ?></li>
	</ul>
</div>
<div class="fanfarons form">
<?php echo $form->create(null, array('url' => array('controller' => 'fanfarons', 'action' => 'edit')));?>
	<fieldset>
 		<legend><?php echo $form->data['Fanfaron']['name'];?></legend>
 		
	<?php
		foreach($contrats as $contrat) {
			$id_contrat = $contrat['Contrat']['id'];
			$statut_contrat = '';
			$id_contrat_fanfaron = '';
			foreach($contrat['Fanfaron'] as $fanfaron_contrat) {
				if($fanfaron_contrat['ContratsFanfaron']['fanfaron_id'] == $form->data['Fanfaron']['id']) {
					$statut_contrat = $fanfaron_contrat['ContratsFanfaron']['statut'];
					$id_contrat_fanfaron = $fanfaron_contrat['ContratsFanfaron']['id'];
					$modified = $fanfaron_contrat['ContratsFanfaron']['modified'];
					$ip = $fanfaron_contrat['ContratsFanfaron']['ip'];
				}
			}
			?>
			
			<?php
			$contrat_title = $contrat['Contrat']['date_debut'];
			
			if($contrat['Contrat']['date_debut'] < $contrat['Contrat']['date_fin']) {
				$contrat_title .= " - ".$contrat['Contrat']['date_fin'];
			}
			
			if($contrat['Contrat']['heure_debut'] != '00:00:00') {
				$contrat_title .= " (".$contrat['Contrat']['heure_debut'];
			
				if($contrat['Contrat']['heure_fin'] != '00:00:00') {
					$contrat_title .= " - ".$contrat['Contrat']['heure_fin'];
				}
				$contrat_title .= ")";
			}
			$contrat_title .= " : ".$contrat['Contrat']['title'];
			
			echo $html->link(__($contrat_title, true),array('controller' => 'contrats','action'=>'view',$contrat['Contrat']['id']));
			?>
			
			<?php 
				echo $form->input(
				'ContratsFanfaron.'.$id_contrat.'.statut',
				array(
					'empty' => true,
					'label' => 'Pr&eacute;sent',
					'selected' => $statut_contrat
				)
			);
			
			echo $form->hidden(
				'ContratsFanfaron.'.$id_contrat.'.id',
				array(
					'value' => $id_contrat_fanfaron
				)
			);
			echo $form->hidden(
				'ContratsFanfaron.'.$id_contrat.'.ip',
				array(
					'value' => $_SERVER['REMOTE_ADDR']
				)
			);
			echo $form->hidden(
				'ContratsFanfaron.'.$id_contrat.'.contrat_id',
				array(
					'value' => $id_contrat
				)
			);
			echo $form->hidden(
				'ContratsFanfaron.'.$id_contrat.'.fanfaron_id',
				array(
					'value' => $form->data['Fanfaron']['id']
				)
			);
		}
		
		echo "(Mis &agrave; jour le ".$modified." depuis ".$ip.")";
	?>
	</fieldset>
<?php echo $form->end('Enregistrer ('.$form->data['Fanfaron']['name'].')');?>
</div>
