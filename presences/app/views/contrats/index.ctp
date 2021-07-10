<div class="contrats view">
<h2> Les plans &agrave; venir </h2>
<?php
      foreach($contrats as $contrat)
      {
        $id = $contrat['Contrat']['id'];
        $contrat_class = ' class="contrat_ko"';
        if ($valide[$id] == 1)
        {
          $contrat_class = ' class="contrat"';
        }

?>

  <details>
    <summary<?php echo $contrat_class; ?>>
      <?php  __($contrat['Contrat']['date_debut'] . " : " . $contrat['Contrat']['title']);?>
    </summary>
 <h4>
<?php echo $html->link(
  __('Plus de details', true)
  , array('controller' => 'contrats','action'=>'view',$contrat['Contrat']['id'])
  , array('class' => 'buttonLink')); ?>
      </h4>
<div class="presents">
	<h3><?php __('Pr&eacute;sents');?></h3>
	<?php
	foreach ($presents[$id] as $present) {
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
<div class="presents">
	<h3><?php __('Peut &ecirc;tre');?></h3>

	<?php
	foreach ($peutetres[$id] as $peutetre) {
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

  </details>
<?php
      }
?>

</div>
