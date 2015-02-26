<?php
	session_start();
	if (!isset($_SESSION['pseudo']) AND !isset($_SESSION['connect'])){
		$_SESSION['pseudo']="";
		$_SESSION['connect']=0;
	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  <!-- Meta data -->
	  <title>Page Title</title>
	  <meta charset="UTF-8">
	  <meta name="description" content="Truc de chinois">
	  <meta name="keywords" content="chinois, acuponcture">
	  <meta name="author" content="Tanguy Falconnet - Maxime Servettaz">
	  <link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
	
<<<<<<< HEAD
		include('lib/view/header.php'); ?>
 
	<div id='page'>
		<?php 
		if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])AND $_SESSION['pseudo']!=NULL  AND $_SESSION['id']!=NULL)
		{
				echo 'Utilisateur deja connecté';
				echo 'ID :'. $_SESSION['id'];
				echo 'Pseudo :'.$_SESSION['pseudo'];
	  
		}else{
			include('php/login.php');
			echo 'ID :'. $_SESSION['id'];
			echo 'Pseudo :'.$_SESSION['pseudo'];
	  
		}
		?>
		
		
		<?php include('lib/view/consultation.php'); ?>

	 </div>
	<?php include('lib/view/footer.php'); ?>
=======
	<?php 
		include('lib/view/header.php');
		echo "<div id='page'>" ;
			include('lib/ctrl/controler.php');
			$controller = new Controller;
			$controller->currentView();
		echo "</div>";
		include('lib/view/footer.php'); ?>
>>>>>>> 1f9f44c5626969e63dcd1e50c7a6c7f676a78417
	 </body>
</html>
