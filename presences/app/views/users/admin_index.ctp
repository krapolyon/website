<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Nouvel utilisateur', true), array('action'=>'add')); ?></li>
	</ul>
</div>
<div class="users index">
<h2>
<?php 
	if(isset($this->passedArgs['group'])) {
		if($this->passedArgs['group'] == 1) {
			__('Administrateurs');
		}
	}
	else {
		__('Tous les utilisateurs');
	}
?>
</h2>
<p class="counter">
<?php
echo $paginator->counter(array(
'format' => __('Page %page% / %pages%, total : %count% enregistrements', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('firstname');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('Identifiant', 'username');?></th>
	<?php
		if(!isset($this->passedArgs['group'])) {
	?>
	
	<th>Groupes</th>
	<?php
		}
	?>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['firstname']; ?>
		</td>
		<td>
			<?php echo $user['User']['name']; ?>
		</td>
		<td>
			<?php echo $user['User']['email']; ?>
		</td>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
		<?php
			if(!isset($this->passedArgs['group'])) {
		?>
		<td>
		<?php	
				foreach($user['Group'] as $group) {
					echo $group['name']."<br/>";
				}
		?>
		</td>
		<?php
		}
		
		?>
		<td class="actions">
			<?php echo $html->link(__('Voir', true), array('action'=>'view', $user['User']['id'])); ?>
			<?php echo $html->link(__('Modifier', true), array('action'=>'edit', $user['User']['id'])); ?>
			<?php echo $html->link(__('Supprimer', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Voulez vous vraiment supprimer l\'enregistrement # %s?', true), $user['User']['id'])); ?>
			<?php echo $html->link(__('Envoyer les identifiants', true), array('action'=>'mail_login', $user['User']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('précédent', true), (isset($pagination_params)? array('url' => $pagination_params) : null), null, array('class' => 'disabled'));	?> 
 | 	<?php echo $paginator->numbers((isset($pagination_params)? array('url' => $pagination_params) : null));?>
 |	<?php echo $paginator->next(__('suivant', true).' >>', (isset($pagination_params)? array('url' => $pagination_params) : null), null, array('class'=>'disabled'));?>
</div>
