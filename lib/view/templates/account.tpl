
<form class="formBDD" method="post" action="index.php?current=account&action=upDate">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" value="<?php echo $userAccount->getNom(); ?>" />
	   <br />
	   <label for="prenom">Prénom :</label>
	   <input type="text" name="prenom" id="prenom" value="<?php echo $userAccount->getPrenom(); ?>"/>
	   <br />
	   <label for="mail">Adresse mail :</label>
	   <input type="text" name="mail" id="mail" value="<?php echo $userAccount->getMail(); ?>"/>
	   <br />
  </fieldset>
	  <!-- <label for="dob">Date de naissance :</label>
	   <input type="date" name="dob" id="dob">
	   <br />
	  -->
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  value="<?php echo $userAccount->getLogin(); ?>" disabled="disabled" />
	   <br />
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass" value="<?php echo $userAccount->getPass(); ?>"/>
  </fieldset>
  <input type="submit" value="Valider" />

</form>