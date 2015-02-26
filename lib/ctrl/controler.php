<?php
	class Controller
	{
		private $_variable;

		/**
			Contructeur
		*/
		public function __construct() {
			
		}

		/**
			Affichage de la vue dans index.php
		*/
		public function currentView(){

			if (isset($_GET["current"])){
				$current=$_GET["current"];
				echo 'La page courante est : '.$current;
			}else{
				$current='';
			}
			
			if($current=='connexion' OR $current=='' OR $current=='logout'){
				if($current=='connexion'){
					$this->process_login();
				}
				if($current=='logout'){
					$this->process_logout();
				}
				
				if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo']!=NULL)
				{
					echo 'Utilisateur deja connecté';
					echo 'Connect :'. $_SESSION['connect'];
					echo 'Pseudo :'.$_SESSION['pseudo'];
				}else{
				
					include('lib/view/login.php');			  
				}
			}
			
			if($current=='signup'){
				include('lib/view/signup.php');
			}
			
			if($current=='account'){
				include('lib/view/account.php');
			}
			
		}
		
		
		public function process_login(){
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
				echo 'Pseudo :'.$_SESSION['pseudo'];
				echo '<br>PAGE A AFFICHER CAR CONNECTE<br>';
			}else{
				echo "<br>Vous n'êtes pas connecté<br>";
			}
		
		}
		
		public function process_logout(){
			// Suppression des variables de session et de la session
			$_SESSION = array();
			session_destroy();
		}
		
		public function process_signup(){
			if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mail=$_POST['mail'];
				$pseudo=$_POST['pseudo'];
				$pass=$_POST['pass'];
			}
		}		
		
		public function getMeridiansName(){
			return array();
		}	
	}

?>
