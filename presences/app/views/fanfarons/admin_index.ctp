<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Nouveau fanfaron', true), array('action'=>'add')); ?></li>
	</ul>
</div>
<div class="fanfarons index">
<h2><?php __('Fanfarons');?></h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('instrument');?></th>
	<th>Autre(s) instrument(s)</th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($fanfarons as $fanfaron):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $fanfaron['Fanfaron']['name']; ?>
		</td>
		<td>
			<?php echo $fanfaron['Fanfaron']['email']; ?>
		</td>
		<td>
			<?php echo $fanfaron['Instrument']['name']; ?>
		</td>
		<td>
			<?php
				$ii = 0;
				foreach($fanfaron['AutreInstrument'] as $instru) {
					if($ii>0) {
						echo ", ";
					}
					echo $instru['name'];
					$ii++;
				}
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Modifier', true), array('action'=>'edit', $fanfaron['Fanfaron']['id'])); ?>
			<?php echo $html->link(__('Supprimer', true), array('action'=>'delete', $fanfaron['Fanfaron']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fanfaron['Fanfaron']['id'])); ?>
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