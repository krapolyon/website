<div class="fanfarons view">
<h2><?php  __('Fanfaron');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fanfaron['Fanfaron']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fanfaron['Fanfaron']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fanfaron['Fanfaron']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fanfaron['Fanfaron']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Fanfaron', true), array('action'=>'edit', $fanfaron['Fanfaron']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Fanfaron', true), array('action'=>'delete', $fanfaron['Fanfaron']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fanfaron['Fanfaron']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Fanfarons', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Fanfaron', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Contrats', true), array('controller'=> 'contrats', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Contrat', true), array('controller'=> 'contrats', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Instruments', true), array('controller'=> 'instruments', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Instrument', true), array('controller'=> 'instruments', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Contrats');?></h3>
	<?php if (!empty($fanfaron['Contrat'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Lieu'); ?></th>
		<th><?php __('Date Debut'); ?></th>
		<th><?php __('Date Fin'); ?></th>
		<th><?php __('Heure Debut'); ?></th>
		<th><?php __('Heure Fin'); ?></th>
		<th><?php __('Montant'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($fanfaron['Contrat'] as $contrat):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $contrat['id'];?></td>
			<td><?php echo $contrat['created'];?></td>
			<td><?php echo $contrat['modified'];?></td>
			<td><?php echo $contrat['title'];?></td>
			<td><?php echo $contrat['lieu'];?></td>
			<td><?php echo $contrat['date_debut'];?></td>
			<td><?php echo $contrat['date_fin'];?></td>
			<td><?php echo $contrat['heure_debut'];?></td>
			<td><?php echo $contrat['heure_fin'];?></td>
			<td><?php echo $contrat['montant'];?></td>
			<td><?php echo $contrat['description'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'contrats', 'action'=>'view', $contrat['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'contrats', 'action'=>'edit', $contrat['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'contrats', 'action'=>'delete', $contrat['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contrat['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Contrat', true), array('controller'=> 'contrats', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Instruments');?></h3>
	<?php if (!empty($fanfaron['Instrument'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($fanfaron['Instrument'] as $instrument):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $instrument['id'];?></td>
			<td><?php echo $instrument['name'];?></td>
			<td><?php echo $instrument['created'];?></td>
			<td><?php echo $instrument['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'instruments', 'action'=>'view', $instrument['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'instruments', 'action'=>'edit', $instrument['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'instruments', 'action'=>'delete', $instrument['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $instrument['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Instrument', true), array('controller'=> 'instruments', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
