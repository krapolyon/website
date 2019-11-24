<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Liste des utilisateurs', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Modifier l\'utilisateur', true), array('action'=>'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('Supprimer l\'utilisateur', true), array('action'=>'delete', $user['User']['id']), null, sprintf(__('Voulez vous vraiment supprimer l\'enregistrement # %s?', true), $user['User']['id'])); ?> </li>
	</ul>
</div>
<div class="users view">
<h2><?php  __('Utilisateur');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prénom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['prenom']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['nom']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Identifiant'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Téléphone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['telephone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entité'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['Entite']['nom']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Commentaire'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['commentaire']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
