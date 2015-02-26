<?php
session_start();
if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){
	$_SESSION['id']=Null;
	$_SESSION['pseudo']=Null;
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
	<?php 
		$current=$_GET["current"];
		echo 'La page courante est : '.$current;
	?>
	<?php include('lib/view/header.php'); ?>
 
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
		
		
		

	 </div>
	<?php include('lib/view/footer.php'); ?>
	 </body>
</html>
