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
					echo '<input class="consultation" type="checkbox" name="meridian'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'">'.$element.'<br>';
				}
			?>
		</div>
		<div>
			<div class="consultation title">Type de pathologie :</div>
			<?php
				$checkeds = $this->getSelectedPathologyTypes();
				$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
				foreach($datas as $key=>$element){
					echo '<input class="consultation" type="checkbox" name="pathologyType'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'">'.$element.'<br>';
				}
			?>
		</div>
		<div>
			<div class="consultation title">Caractéristiques :</div>
			<?php
				$checkeds = $this->getSelectedFeatures();
				$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
				foreach($datas as $key=>$element){
					echo '<input class="consultation" type="checkbox" name="feature'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							echo "checked ";
						}
					}
					echo 'value="'.$element.'">'.$element.'<br>';
				}
			?>
		</div>
		<input type="submit" value="Rechercher">
	</form>
	<form action="index.php?current=consultation&process=clear" method="POST">
		<input type="submit" value="RAZ">
	</form>
</fieldset>

<fieldset>
	<legend>Pathologies</legend>
		<?php 
			$datas = $this->getSearchedPathologies();
			foreach($datas as $element){
				echo '<div><fieldset>'.
						'<legend>Pathologie</legend>'.
						'<div>Description : '.$element->getdesc().'</div>'.
						'<fieldset>'.
							'<legend>Méridien</legend>'.
							'<div>Nom : '.$element->getmeridian()->getname().'</div>'.
							'<div>Catégorie : '.$element->getmeridian()->getyin().'</div>'.
						'</fieldset>'.
						'<fieldset>'.
						'<legend>Symptomes</legend>';
				foreach($element->getsymptoms() as $element2){
					echo '<div>'.$element2->getdesc().'</div>';
				}
				echo '</fieldset></div>';
			}
		?>
</fieldset>
