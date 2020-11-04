<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Retour', true), '/'); ?></li>
	</ul>
</div>

<div class="foldableList">
<h2>Trouves ton nom dans la liste !</h2>
<?php
$instrument_counter = 0;
foreach ($fanfarons as $fanfaron):
?>
<?php
	$instrument_id = $fanfaron['Instrument']['id'];
	if($instrument_id > $instrument_counter) {
    if ($instrument_counter > 0)
    {
		?>
    </ul></details>
    <?php 
    } ?>
		<details>
			<summary>
				<?php echo $fanfaron['Instrument']['name']; ?>
			</summary>
      <ul>
		<?php
		$instrument_counter = $fanfaron['Instrument']['id'];
    }
  ?> <li> <?php
    echo $html->link(__($fanfaron['Fanfaron']['name'], true), array('action'=>'edit', $fanfaron['Fanfaron']['id']), array('class' => 'buttonLink'));
  ?> </li> <?php
    endforeach;
?>
  </p></details>
</div>
