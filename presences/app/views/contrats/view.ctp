<div class="actions">
	<ul>
		<li><?php
			if(!isset($_SERVER['HTTP_REFERER'])) $_SERVER['HTTP_REFERER'] = "/";
			echo $html->link(__('Retour', true), $_SERVER['HTTP_REFERER']);
			?></li>
	</ul>
</div>
<div class="contrats view">
<h2><?php  __($contrat['Contrat']['title']);?></h2>

		<h4<?php if ($i % 2 == 0) echo $class;?>><?php __('O&ugrave; ?'); ?></h4>
		<p<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contrat['Contrat']['lieu']; ?>
			&nbsp;
		</p>
		<h4<?php if ($i % 2 == 0) echo $class;?>><?php __('Quand ?'); ?></h4>
		<p<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
			if($contrat['Contrat']['date_fin'] > $contrat['Contrat']['date_debut']) {
				echo "Du ".$contrat['Contrat']['date_debut']." au ".$contrat['Contrat']['date_fin'];
			}
			else {
				echo "Le ".$contrat['Contrat']['date_debut'];
			}
			if($contrat['Contrat']['heure_debut'] != '00:00:00') {
				echo "<br>".$contrat['Contrat']['heure_debut'];
				if($contrat['Contrat']['heure_fin'] != '00:00:00') {
					echo " - ".$contrat['Contrat']['heure_fin'];
				}
			}
			?>
		</p>
		<h4<?php if ($i % 2 == 0) echo $class;?>><?php __('Des sous ?'); ?></h4>
		<p<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contrat['Contrat']['montant']; ?>
			&nbsp;
		</p>
		<h4<?php if ($i % 2 == 0) echo $class;?>><?php __('Quelques d&eacute;tails suppl&eacute;mentaires'); ?></h4>
		<p<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contrat['Contrat']['description']; ?>
			&nbsp;
		</p>
		<h4<?php if ($i % 2 == 0) echo $class;?>><?php __('Th&egrave;me de d&eacute;guiz'); ?></h4>
		<p<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $contrat['Contrat']['deguiz']; ?>
			&nbsp;
		</p>
</div>
<div class="related">
	<h3><?php __('Pr&eacute;sents');?></h3>

	<?php
	foreach ($presents as $present) {
		?>
		<strong>
		<?php echo $present['instrument']; ?>
		</strong> :
		<?php
		if(isset($present['fanfarons'])) {
			echo $present['fanfarons'];
		}
		?>
		<br>
		<?php
	}
	?>

</div>
<div class="related">
	<h3><?php __('Peut &ecirc;tre');?></h3>

	<?php
	foreach ($peutetres as $peutetre) {
		?>
		<strong>
		<?php echo $peutetre['instrument']; ?>
		</strong> :
		<?php
		if(isset($peutetre['fanfarons'])) {
			echo $peutetre['fanfarons'];
		}
		?>
		<br>
		<?php
	}
	?>

</div>
