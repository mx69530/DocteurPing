<?php
	class Controller
	{
		private $_repo;

		/**
			Contructeur
		*/
		public function __construct() {
			include('lib/model/repository.php');
			$this->_repo = new Repository;
		}

		/**
			Affichage de la vue dans index.php
		*/
		public function currentView(){
			include('lib/view/header.php');


			
			echo "<div id='page'>" ;


			if (isset($_GET["current"])){
				$current=$_GET["current"];
				echo 'La page courante est : '.$current;
			}else{
				$current='';
			}
			
			if($current==''){				
				if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo']!=NULL)
				{
					echo 'Utilisateur deja connecté';
					echo 'Connect :'. $_SESSION['connect'];
					echo 'Pseudo :'.$_SESSION['pseudo'];
					
				}	
			}
			
			if($current=='logout'){
				$this->process_logout();
				header("Location:index.php?current=patho"); // Header nécessaire pour affichage du menu utilisateur deconecté
			}
			
			if($current=='connexion'){
					$this->process_login();
			}
				
			if($current=='login'){
					include('lib/view/login.php');
			}
			
			
			if($current=='signup'){
				include('lib/view/signup.php');
			}
			
			
			if($current=='account'){
			
				if (isset($_GET["action"])){
					$action=$_GET["action"];
				}else{
					$action=null;
				}

				if($action=="upDate"){
					$this->process_accountUpdate();
				}
				
				if (($userAccount=$this->_repo->getAccount())!=null) {
					include('lib/view/account.php');
				}else{
					echo'ERREUR : Impossible de récuperer les information du compte';
				}
				
			}
			
			
			if($current === 'consultation'){
				include('lib/view/consultation.php');
			}
			echo "</div>";
			include('lib/view/footer.php'); 
			
		}
		
		
		public function process_accountUpdate(){
			//Nouvelles Valeurs
			if (isset($_POST['pseudo'])) {$pseudo=$_POST['pseudo'];}else{$pseudo="";}
			if (isset($_POST['pass'])) {$pass=$_POST['pass'];}else{$pass="";}
			if (isset($_POST['nom'])) {$nom=$_POST['nom'];}else{$nom="";}
			if (isset($_POST['prenom'])) {$prenom=$_POST['prenom'];}else{$prenom="";}
			if (isset($_POST['mail'])) {$mail=$_POST['mail'];}else{$mail="";}
			
			$this->_repo->updateUser($pseudo,$pass,$nom,$prenom,$mail);
							
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

			if (($user=$this->_repo->checkUser($pseudo,$pass))!=null) 
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
	
			header("Location:index.php?current=patho"); // Header nécessaire pour affichage du menu utilisateur connecté
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

		
		public function getSearchedPathologies(){
			if (!isset($_GET["process"]) || $_GET["process"] != "search"){
				return array();
			}

			$meridians = array();
			$pathologyTypes = array();
			$features = array();
			
			if(!isset($_POST['keyword'])){
				$keyword = '';
			}else{
				$keyword = $_POST['keyword'];
			}
						
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 8) === 'meridian'){
					array_push($meridians, $value);
				}else if(substr($key, 0, 13) === 'pathologyType'){
					array_push($pathologyTypes, $value);
				}else if(substr($key, 0, 7) === 'feature'){
					array_push($features, $value);
				}
			}
			$datas = $this->_repo->findPathologyWithFilters($keyword, $meridians, $pathologyTypes, $features);
			$pathologies = $datas;
			return $pathologies;
		}
		
		public function getMeridianNames(){
			$meridians = $this->_repo->getMeridians();
			$meridianNames = array();
			foreach($meridians as $meridian){
				array_push($meridianNames, $meridian->getName());
			}
			return $meridianNames;
		}
		
		public function getCurrentKeywords(){
			if(!isset($_POST['keyword'])){
				return '';
			}else{
				return $_POST['keyword'];
			}
		}
		
		public function getSelectedMeridians(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 8) === 'meridian'){
					array_push($result, $value);
				}
			}
			
			return $result;
		}
		
		public function getSelectedPathologyTypes(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 13) === 'pathologyType'){
					array_push($result, $value);
				}
			}
			return $result;
		}
		
		public function getSelectedFeatures(){
			$result = array();
			foreach($_POST as $key=>$value){
				if(substr($key, 0, 7) === 'feature'){
					array_push($result, $value);
				}
			}
			return $result;
		}
	}

?>
