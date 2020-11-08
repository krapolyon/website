<div class="fanfarons index">
<h2><?php __('Pr&eacute;sences aux plans');?></h2>
<p> 
<p><?php __('Cliquez sur votre nom pour modifier votre pr&eacute;sence sur l\'ensemble des plans');?><br/>&nbsp;</p>
</p>
<br><br>

<div class="row">
	<div class="column fanfaron"></div>
	<?php
		foreach($contrats as $contrat) {
			if($contrat['OK'] == 0){
				echo "<h3 class=\"column contrat_ko\">";
			}
			else {
				echo "<h3 class=\"column contrat\">";
			}
			$contrat_title = $contrat['Contrat']['date_debut'];

			if($contrat['Contrat']['date_debut'] < $contrat['Contrat']['date_fin']) {
				$contrat_title .= " - ".$contrat['Contrat']['date_fin'];
			}


			echo $contrat_title."<br/>";
			echo $html->link(
				__($contrat['Contrat']['title'], true),
				array(
					'controller' => 'contrats',
					'action'=>'view',
					$contrat['Contrat']['id']
				)
			);
			echo $contrat['Presents']['oui']. " pr&eacute;sents";
			if($contrat['Presents']['peutetre'] > 0) {
				echo " ( +".$contrat['Presents']['peutetre'].")";
			}
			echo "</h3>";
		}
	?>
	<h3 class="column actions"><?php __('Youpi, y\'a de la place pour plein de plans en plus !');?></h3>
</div>
<?php
$i = 0;
$instrument_counter = 0;
foreach ($fanfarons as $fanfaron):
	$class = null;
	$instru_class = null;

	$instrument_id = $fanfaron['Instrument']['id'];
	if($instrument_id > $instrument_counter) {
		?>
		<div class="row instrument">
			<h3 class="column">
				<?php echo $fanfaron['Instrument']['name']; ?>

			</h3>
			<?php
				foreach($contrats as $contrat) {
					if($contrat['Instrument'][$instrument_id]['oui'] > 0) {
						$instru_class = 'ok';
					}
					else {
						$instru_class = 'ko';
					}
					?>
					<span class=<?php echo "column $instru_class "; ?>>
					<?php
						echo $contrat['Instrument'][$instrument_id]['oui'];
						if($contrat['Instrument'][$instrument_id]['peutetre'] > 0) {
							echo " ( +".$contrat['Instrument'][$fanfaron['Instrument']['id']]['peutetre'].")";
						}
					?>
					</span>
					<?php
				}
			?>
			<span class="column">

			</span>
		</div>
		<?php
		$instrument_counter = $fanfaron['Instrument']['id'];
	}
?>
	<div class="row">
		<h3 class='column fanfaron'>
			<?php
  echo $html->link(__($fanfaron['Fanfaron']['name'], true)
    , array('action'=>'edit', $fanfaron['Fanfaron']['id']));
			?>
		</h3>
		<?php
			foreach($contrats as $contrat) {
				$statut_trouve = 0;
				foreach($contrat['Fanfaron'] as $fanfaron_contrat) {
					if($fanfaron_contrat['ContratsFanfaron']['fanfaron_id'] == $fanfaron['Fanfaron']['id']) {
						$statut_trouve = 1;
						?>
						<span class="column cache
						<?php
						if($fanfaron_contrat['ContratsFanfaron']['statut'] == "") {
							echo "pasrepondu";
						} else {
							echo $fanfaron_contrat['ContratsFanfaron']['statut'];
						}
							?>
						">
							<span class="statut_visible">
								<?php
								if($fanfaron_contrat['ContratsFanfaron']['statut'] == "") {
									echo "?";
								}
								else {
									 echo $fanfaron_contrat['ContratsFanfaron']['statut'];
								}
								?>
							</span>
							<?php
								foreach($statuts as $statut) {
							?>
								<span class="statut_cache"> </span>
								<span class="statut_cache">
							<?php
							if($statut=="Oui" || $statut=="Non") {
								echo $html->link(__($statut, true), array('action'=>'edit_presence', $fanfaron_contrat['ContratsFanfaron']['id'], $statut));
							}
							else {
								echo $html->link(__("Peut-etre", true), array('action'=>'edit_presence', $fanfaron_contrat['ContratsFanfaron']['id'], $statut));
							}
							?>
								</span>
							<?php
							}
							?>
						</span>
						<?php

					}
				}
				if($statut_trouve == 0) {
					?>
					<span class="column cache pasrepondu">
						<span class="statut_visible">?</span>
						<?php
							foreach($statuts as $statut) {
						?>
							<span class="statut_cache"> </span>
							<span class="statut_cache">
						<?php
							echo $html->link(__($statut, true), array('action'=>'new_presence', $contrat['Contrat']['id'], $fanfaron['Fanfaron']['id'], $statut));

						?>
							</span>
						<?php
						}
						?>
					</span>
					<?php
				}
			}

		?>
		<span class="column actions">
			<?php //echo $html->link(__('Modifier', true), array('action'=>'edit', $fanfaron['Fanfaron']['id'])); ?>
		</span>
	</div>
<?php endforeach; ?>
</div>
