<div class="errorCenter">
	{$errorsLog}
</div>
<div id='loginPage'> 
	<form name="loginForm" class="formBDD" method="post" onsubmit="return validateForm()" action="index.php?current=log&process=login">
      <fieldset>
 		<legend>Se connecter</legend>
   		    <label for="pseudo">Pseudo :</label>
    		   <input id="pseudo" onclick="checkPseudo();" onchange="checkPseudo();" type="text" name="pseudo" required />
		       <br />
		       <label for="pass">Mot de passe :</label>
		       <input id="pass" onclick="checkPass();" onchange="checkPass();" type="password" name="pass" required/>
			   <br />
      </fieldset>
      <input type="submit" value="Valider" />
	</form>
</div>
