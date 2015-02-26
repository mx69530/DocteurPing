<?php
	session_start();// À placer obligatoirement avant tout code HTML.
	$_SESSION['connect']=0; //Initialise la variable 'connect'.
	if (isset($_POST['pseudo'])) {
		$pseudo=$_POST['pseudo'];
	}else{
		$pseudo="";
	}
	if (isset($_POST['pass'])) {
		$pass=$_POST['pass'];
	}else{
		$pass="";
	}


	if (($pseudo === "maxime" AND $pass=== "maxime")) 
	{
	    $_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
	    $_SESSION['pseudo']=$pseudo;// Permet de récupérer le login afin de personnaliser la navigation.
		// On affiche la page cachée.
	  $_SESSION['id']='123';
	  echo 'ID :'. $_SESSION['id'];
	  echo 'Pseudo :'.$_SESSION['pseudo'];
	  sleep(3);
	  header('Location: ../index.php');      

	}else{
		echo "LOOSER";
	}
?>