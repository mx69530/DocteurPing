<fieldset>
	<legend>Rechercher une pathologie</legend>
	<form action="index.php?current=consultation&process=search" method="POST">
		
		<div>
			Mots-clef : 
			<input type="text" name="keyword" <?php echo 'value="'.$this->getCurrentKeywords().'"'?> >
		</div>
		<div>
			<div class="consultation title">Méridiens :</div> 
			<?php
				$checkeds = $this->getSelectedMeridians();
				$datas = $this->getMeridianNames();
				foreach($datas as $key=>$element){
					echo '<span class="consult"><label><input class="consultation" type="checkbox" name="meridian'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'"/>'.$element.'</label></span>';
				}
			?>
		</div>
		<div>
		<br>
		<br><br><br>
			<div class="consultation title"><br><br><br><br><br>Type de pathologie :</div>
			<?php
				$checkeds = $this->getSelectedPathologyTypes();
				$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
				foreach($datas as $key=>$element){
					echo '<span class="consult"><label><input class="consultation" type="checkbox" name="pathologyType'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'">'.$element.'</label></span>';
				}
			?>
		</div>
		<div>
			<div class="consultation title">Caractéristiques :</div>
			<?php
				$checkeds = $this->getSelectedFeatures();
				$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
				foreach($datas as $key=>$element){
					echo '<span class="consult"><input class="consultation" type="checkbox" name="feature'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'">'.$element.'</label></span>';
				}
			?>
		</div>
		<input type="submit" value="Rechercher">
	</form>
	<form action="index.php?current=consultation&process=clear" method="POST">
		<input type="submit" value="RAZ">
	</form>
</fieldset>

		<?php 

			echo'<table class="resultPatho">';
			echo'<tr>';
			echo'<td>Description</td>';
			echo'<td>Meridien</td>';
			echo'<td>Symptomes</td>';
			echo'</tr>';
			

			$datas = $this->getSearchedPathologies();
			foreach($datas as $element){
				echo '<tr>'.
						'<td>'.$element->getdesc().'</td>'.
							'<td>'.
							'<br>Nom : '.$element->getmeridian()->getname().
							'<br>Catégorie : '.$element->getmeridian()->getyin().
							'</td>'.
						'<td>';
				foreach($element->getsymptoms() as $element2){
					echo '<br>'.$element2->getdesc();
				}
				echo '</td>';
				echo '</tr>';
			}
			echo'</table>';
		?>
