<?php
	class ControllerLog
	{
		private $_user_manager;
		
		public function __construct($smarty, $user_manager) {
			$this->_user_manager=$user_manager;
			
			
			if($_SESSION['pseudo']){
				
			}else{
				$smarty->display('lib/view/templates/log.tpl');
			}
			
			if(isset($_GET['process']) && $_GET['process']=='login'){
				$this->process_login();
			}
			
			if(isset($_GET['process']) && $_GET['process']=='logout'){
				$this->process_logout();
				header("Location:index.php?current=log"); // Header nécessaire pour affichage du menu utilisateur deconecté
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

			if (($user=$this->_user_manager->checkUser($pseudo,$pass))!=null) 
			{
				$_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
				$_SESSION['pseudo']=$pseudo;// Permet de récupérer le login afin de personnaliser la navigation.
				$_SESSION['nom']=$user->getNom();
				$_SESSION['prenom']=$user->getPrenom();
				$_SESSION['idUser']=$user->getId();
				echo '<br>Pseudo :'.$_SESSION['pseudo'];
				echo '<br>Nom :'.$_SESSION['nom'];
				echo '<br>Prenom :'.$_SESSION['prenom'];
				echo '<br>ID User:'.$_SESSION['idUser'];
				echo '<br>PAGE A AFFICHER CAR CONNECTE<br>';
			}else{
				echo "<br>Vous n'êtes pas connecté<br>";
			}
	
			header("Location:index.php?current=log"); // Header nécessaire pour affichage du menu utilisateur connecté
		}
		
		public function process_logout(){
			// Suppression des variables de session et de la session
			$_SESSION = array();
			session_destroy();
		}
	}
?>
