<!DOCTYPE html>
<html lang="fr"> 
<head>
  <title>Login - Docteur Ping</title>
  <meta name="description" content="DocteurPing">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form method="post" action="process_login.php">
      <fieldset>
 		<legend>Se connecter</legend>
   		    <label for="pseudo">Pseudo :</label>
    		   <input type="text" name="pseudo" id="pseudo" />
		       <br />
		       <label for="pass">Mot de passe :</label>
		       <input type="password" name="pass" id="pass" />
			   <br />
      </fieldset>
      <input type="submit" value="Valider" />
</form>
<a href="signup.php">S'inscrire</a>
</body>
</html>