<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Nouveau contrat', true), array('action'=>'add')); ?></li>
	</ul>
</div>
<div class="contrats index">
<h2><?php __('Contrats');?></h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Titre', 'title');?></th>
	<th><?php echo $paginator->sort('lieu');?></th>
	<th><?php echo $paginator->sort('Date de début', 'date_debut');?></th>
	<th><?php echo $paginator->sort('Date de fin', 'date_fin');?></th>
	<th><?php echo $paginator->sort('Heure de début', 'heure_debut');?></th>
	<th><?php echo $paginator->sort('Heure de fin', 'heure_fin');?></th>
	<th><?php echo $paginator->sort('montant');?></th>
	<th><?php echo $paginator->sort('relance');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contrats as $contrat):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contrat['Contrat']['title']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['lieu']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['date_debut']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['date_fin']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['heure_debut']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['heure_fin']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['montant']; ?>
		</td>
		<td>
			<?php echo $contrat['Contrat']['relance']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Modifier', true), array('action'=>'edit', $contrat['Contrat']['id'])); ?>
			<?php echo $html->link(__('Supprimer', true), array('action'=>'delete', $contrat['Contrat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contrat['Contrat']['id'])); ?>
			<?php echo $html->link(__('Relancer', true), array('action'=>'relancer', $contrat['Contrat']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
