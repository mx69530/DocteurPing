<form action="" method="POST">
	<fieldset>
		<legend>Rechercher une pathologie</legend>
		<div>
			Mots-clefs : 
			<input type="text" name="keywords">
		</div>
		<div>
			Méridiens : 
			<select name="meridian">
				
			</select>
		</div>
		<div>
			Type de pathologie : 
			<select name="pathologyType">
				<option>méridien
				<option>organe/viscère
				<option>luo
				<option>merveilleux vaisseaux
				<option>jing jin
			</select>
		</div>
		<div>
			Caractéristiques : 
			<select name="feature">
				<option>plein
				<option>chaud
				<option>vide
				<option>froid
				<option>interne
				<option>externe
			</select>
		</div>
		<input type="submit" value="Rechercher">
	</fieldset>

	<ul>
		<?php 
		//TODO s'adresser au controlleur pour récupérer les données
		$pathologies = getPathologies($_POST['meridian'], $_POST['pathologyType'], $_POST['feature']);
		?>
	</ul>
</form>
