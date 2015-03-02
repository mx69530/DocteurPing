<fieldset>
	<legend>Rechercher une pathologie</legend>
	<form action="index.php?current=consultation&process=search" method="POST">
		
		<div>
			Mots-clefs : 
			<input type="text" name="keywords" <?php echo 'value="'.$this->getCurrentKeywords().'"'?> >
		</div>
		<div>
			Méridiens : 
			<select name="meridian">
				<option>
				<?php
					$selected = $this->getSelectedMeridian();
					$datas = $this->getMeridianNames();
					foreach($datas as $element){
						echo "<option";
						if($selected === $element){
							echo " selected";
						}
						echo ">".$element;
					}
				?>
			</select>
		</div>
		<div>
			Type de pathologie : 
			<select name="pathologyType">
				<option>
				<?php
					$selected = $this->getSelectedPathologyType();
					$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
					foreach($datas as $element){
						echo "<option";
						if($selected === $element){
							echo " selected";
						}
						echo ">".$element;
					}
				?>
			</select>
		</div>
		<div>
			Caractéristiques : 
			<select name="feature">
				<option>
				
				<?php
					$selected = $this->getSelectedFeature();
					$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
					foreach($datas as $element){
						echo "<option";
						if($selected === $element){
							echo " selected";
						}
						echo ">".$element;
					}
				?>
			</select>
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
