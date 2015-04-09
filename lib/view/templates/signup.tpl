<div class="error">
	{$errors}
</div>
<form class="formBDD" action="index.php?current=signup&process=enregistrer" method="POST">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" />
	   <br />
	   <label for="prenom">Prénom :</label>
	   <input type="text" name="prenom" id="prenom" />
	   <br />
	   <label for="mail">Adresse mail :</label>
	   <input type="email" name="mail" id="mail" required />
	   <br />
  </fieldset>
	  <!-- <label for="dob">Date de naissance :</label>
	   <input type="date" name="dob" id="dob">
	   <br />
	  -->
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  />
	   <br />
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass"  />
  </fieldset>
  <input type="submit" value="Valider" />
</form>

