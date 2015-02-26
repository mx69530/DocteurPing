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
	
	<?php 
		include('lib/view/header.php');
		echo "<div id='page'>" ;
			include('lib/ctrl/controler.php');
			$controller = new Controller;
			$controller->currentView();
		echo "</div>";
		include('lib/view/footer.php'); ?>
	 </body>
</html>
