<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Retour', true), '/'); ?></li>
	</ul>
</div>

<?php
$instrument_counter = 0;
foreach ($fanfarons as $fanfaron):
  if ($instrument_counter > 0)
  {
?>
  </p></details>
<?php
  }
	$instrument_id = $fanfaron['Instrument']['id'];
	if($instrument_id > $instrument_counter) {
		?>
		<details>
			<summary>
				<?php echo $fanfaron['Instrument']['name']; ?>
			</summary>
      <p>
		<?php
		$instrument_counter = $fanfaron['Instrument']['id'];
    }
    echo $html->link(__($fanfaron['Fanfaron']['name'], true), array('action'=>'edit', $fanfaron['Fanfaron']['id']));
    endforeach;
?>
  </p></details>
