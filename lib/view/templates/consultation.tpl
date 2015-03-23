<?php
	echo'<h2>Rechercher une pathologie</h2>';
	echo'<form action="index.php?current=consultation&process=search" method="POST">';
	//ZONE MOTS CLEF
	if(($_SESSION['pseudo'])){
		echo'<h3>Mots-clef : </h3>';
		echo'<input class="groupBox" type="text" name="keyword" value="'.$this->getCurrentKeywords().'">';	
	}
	//ZONE MERIDIEN
	echo'<h3>Méridiens :</h3>'; 
	echo '<div class="groupBox">';
	$checkeds = $this->getSelectedMeridians();
	$datas = $this->getMeridianNames();
	foreach($datas as $key=>$element){
		echo '<span class="ckBox"><label><input  type="checkbox" name="meridian'.$key.'" ';
		foreach($checkeds as $checked){
			if($checked === $element){
				echo "checked ";
			}
		}
		echo 'value="'.$element.'"/>'.$element.'</label></span>';
	}
	echo '</div>';
	
	//ZONE PATHOLOGIE
	echo '<h3>Type de pathologie :</h3>';
	echo '<div class="groupBox">';					
	$checkeds = $this->getSelectedPathologyTypes();
	$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
	foreach($datas as $key=>$element){
		echo '<span class="ckBox"><label><input type="checkbox" name="pathologyType'.$key.'" ';
		foreach($checkeds as $checked){
			if($checked === $element){
				echo "checked ";
			}
		}
		echo 'value="'.$element.'">'.$element.'</label></span>';
	}
	echo '</div>';
	
	//ZONE Caractéristiques	
	echo'<h3>Caractéristiques :</h3>';
	echo '<div class="groupBox">';
	$checkeds = $this->getSelectedFeatures();
	$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
	foreach($datas as $key=>$element){
		echo '<span class="ckBox"><input type="checkbox" name="feature'.$key.'" ';
		foreach($checkeds as $checked){
			if($checked === $element){
				echo "checked ";
			}
		}
		echo 'value="'.$element.'">'.$element.'</label></span>';
	}
	echo '</div>';

	echo'</br>
	<input type="submit" value="Rechercher">
	</form>
	<form action="index.php?current=consultation&process=clear" method="POST">
		<input type="submit" value="RAZ">
	</form>';
	
	
	//GESTION DES RESULTATS
	$datas = $this->getSearchedPathologies();


if(isset($_GET['process'])){
	if($_GET['process']=='search'){
		echo'<h2>Résultats:</h2>';
		echo'<table class="resultPatho">';
		echo'<tr>';
		echo'<td>Description</td>';
		echo'<td>Meridien</td>';
		echo'<td>Symptomes</td>';
		echo'</tr>';
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
	}
}
?>
