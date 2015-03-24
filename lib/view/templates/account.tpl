<form class="formBDD" method="post" action="index.php?current=account&action=upDate">
  <fieldset>
	<legend>Informations personnels</legend>
	   <label for="nom">Nom :</label>
	   <input type="text" name="nom" id="nom" value="{$nom}" />
	   <br />
	   <label for="prenom">Prénom :</label>
	   <input type="text" name="prenom" id="prenom" value="{$prenom}"/>
	   <br />
	   <label for="mail">Adresse mail :</label>
	   <input type="text" name="mail" id="mail" value="{$mail}"/>
	   <br />
  </fieldset>
  
  <fieldset>
	<legend>Compte</legend>    
	   <label for="pseudo">Pseudo :</label>
	   <input type="text" name="pseudo" id="pseudo"  value="{$login}" disabled="disabled" />
	   <br />
	   <label for="pass">Mot de passe :</label>
	   <input type="password" name="pass" id="pass" value="{$pass}"/>
  </fieldset>
  <input type="submit" value="Valider" />
</form>
