<div class="fanfarons index">
<h2><?php __('Pr&eacute;sences aux plans');?></h2>
<p> 
<?php  echo $html->link(__(">> Cliquez ICI pour vous inscrire <<", true), array('action'=>'chooser'), array('class' => 'buttonLink')); ?>
</p>
<br><br>

<table cellpadding="0" cellspacing="0">
<tr>
	<th class="fanfaron"><?php echo $paginator->sort('', 'name');?></th>
	<?php
		foreach($contrats as $contrat) {
			if($contrat['OK'] == 0){
				echo "<th class=\"contrat_ko\">";
			}
			else {
				echo "<th class=\"contrat\">";
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
			echo "</th>";
		}
	?>
	<th class="actions"><?php __('Youpi, y\'a de la place pour plein de plans en plus !');?></th>
</tr>
<?php
$i = 0;
$instrument_counter = 0;
foreach ($fanfarons as $fanfaron):
	$class = null;
	$instru_class = null;

	/* if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}*/

	$instrument_id = $fanfaron['Instrument']['id'];
	if($instrument_id > $instrument_counter) {
		?>
		<tr class="instrument">
			<td>
				<?php echo $fanfaron['Instrument']['name']; ?>

			</td>
			<?php
				foreach($contrats as $contrat) {
					if($contrat['Instrument'][$instrument_id]['oui'] > 0) {
						$instru_class = ' class="ok"';
					}
					else {
						$instru_class = ' class="ko"';
					}
					?>
					<td<?php echo $instru_class;?>>
					<?php
						echo $contrat['Instrument'][$instrument_id]['oui'];
						if($contrat['Instrument'][$instrument_id]['peutetre'] > 0) {
							echo " ( +".$contrat['Instrument'][$fanfaron['Instrument']['id']]['peutetre'].")";
						}
					?>
					</td>
					<?php
				}
			?>
			<td>

			</td>
		</tr>
		<?php
		$instrument_counter = $fanfaron['Instrument']['id'];
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php
			 //echo $fanfaron['Fanfaron']['name'];
			echo $html->link(__($fanfaron['Fanfaron']['name'], true), array('action'=>'edit', $fanfaron['Fanfaron']['id']));
			?>
		</td>
		<?php
			foreach($contrats as $contrat) {
				$statut_trouve = 0;
				foreach($contrat['Fanfaron'] as $fanfaron_contrat) {
					if($fanfaron_contrat['ContratsFanfaron']['fanfaron_id'] == $fanfaron['Fanfaron']['id']) {
						$statut_trouve = 1;
						?>
						<td class="cache
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
						</td>
						<?php

					}
				}
				if($statut_trouve == 0) {
					?>
					<td class="cache pasrepondu">
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
					</td>
					<?php
				}
			}

		?>
		<td class="actions">
			<?php //echo $html->link(__('Modifier', true), array('action'=>'edit', $fanfaron['Fanfaron']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
