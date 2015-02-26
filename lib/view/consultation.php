<form action="" method="POST">
  <fieldset>
    <legend>Rechercher une pathologie</legend>
    <div>
      Mots-clefs : 
      <input type="text" name="keywords">
    </div>
    <div>
      Méridiens : 
      <select name="meridians">
	<?php
	  //TODO s'adresser au controlleur pour récupérer les données
	  //Affichage des méridiens comme options de la liste déroulante
	  $meridians = getMeridians();
	  foreach ($meridians as $value){
	      echo '<option>'.$value;
	  }
	?>
      </select>
    </div>
    <div>
      Type de pathologie : 
      <select name="pathologyTypes">
	<?php
		//TODO s'adresser au controlleur pour récupérer les données
		//Affichage des pathologies comme options de la liste déroulante
		$pathologyTypes = getPathologyTypes();
		foreach ($pathologyTypes as $value){
			echo '<option>'.$value;
		}
	?>
	</select>
    </div>
    <div>
      Caractéristiques : 
      <select name="features">
	<?php
	//TODO s'adresser au controlleur pour récupérer les données
	  //Affichage des caractéristiques comme options de la liste déroulante
	  $features = getFeatures();
	  foreach ($features as $value){
	      echo '<option>'.$value;
	  }
	?>
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
