<!DOCTYPE html>
<html lang="fr"> 
<head>
  <title>Login - Docteur Ping</title>
  <meta name="description" content="DocteurPing">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form class="formBDD" method="post" action="process_signup.php">
      <fieldset>
        <legend>Informations personnels</legend>
           <label for="nom">Nom :</label>
           <input type="text" name="nom" id="nom" />
           <br />
           <label for="prenom">Prénom :</label>
           <input type="text" name="prenom" id="prenom" />
           <br />
           <label for="mail">Adresse mail :</label>
           <input type="text" name="mail" id="mail" />
           <br />
      </fieldset>
          <!-- <label for="dob">Date de naissance :</label>
           <input type="date" name="dob" id="dob">
           <br />
          -->
      <fieldset>
        <legend>Compte</legend>    
           <label for="pseudo">Pseudo :</label>
           <input type="text" name="pseudo" id="pseudo" />
           <br />
           <label for="pass">Mot de passe :</label>
           <input type="password" name="pass" id="pass" />
      </fieldset>
      <input type="submit" value="Valider" />

</form>

</body>
</html>
