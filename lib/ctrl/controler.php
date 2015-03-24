<?php
	class Controller
	{
		private $_repo;
		private $_smarty;

		/**
			Contructeur
		*/
		public function __construct() {
			include('lib/model/repository.php');
			$this->_repo = new Repository;
			
			//Init smarty
			require('Smarty/Smarty.class.php');
			$this->_smarty = new Smarty();

			$this->_smarty->setTemplateDir('lib/view/templates');
			$this->_smarty->setCompileDir('lib/view/templates_c');
			$this->_smarty->setCacheDir('lib/view/cache');
			$this->_smarty->setConfigDir('lib/view/configs');

			if(($_SESSION['pseudo'])){
				$compte = '<li>';
				$compte += ' <a href="index.php?current=account">Mon compte</a>';
				$compte += '</li>';
			}
			
			$connexion = '';
			if(($_SESSION['pseudo'])){
				$connexion += ' <a href="index.php?current=logout">Deconnexion</a>';
			}else{
				$connexion += ' <a href="index.php?current=login">Connexion</a>';
			}

			$this->_smarty->assign('compte', $compte);
			$this->_smarty->assign('connexion', $connexion);
			$this->_smarty->display('lib/view/templates/header.tpl');
		}

		/**
			Affichage de la vue dans index.php
		*/
		public function currentView(){
			


			
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
					$this->_smarty->display('lib/view/templates/login.tpl');
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
					$this->_smarty->assign('nom', $userAccount->getNom());
					$this->_smarty->assign('prenom', $userAccount->getPrenom());
					$this->_smarty->assign('mail', $userAccount->getMail());
					$this->_smarty->assign('login', $userAccount->getLogin());
					$this->_smarty->assign('pass', $userAccount->getPass());
					$this->_smarty->display('lib/view/templates/account.tpl');
				}else{
					echo'ERREUR : Impossible de récuperer les information du compte';
				}
				
			}
			
			
			if($current === 'consultation'){
				$keyword = '';
				if(($_SESSION['pseudo'])){
					$keyword += '<h3>Mots-clef : </h3>';
					$keyword += '<input class="groupBox" type="text" name="keyword" value="'.$this->getCurrentKeywords().'">';	
				}
				$this->_smarty->assign('keyword', $keyword);
				
				$meridians = '';
				$checkeds = $this->getSelectedMeridians();
				$datas = $this->getMeridianNames();
				foreach($datas as $key=>$element){
					$meridians = '<span class="ckBox"><label><input  type="checkbox" name="meridian'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							$meridians += "checked ";
						}
					}
					$meridians += 'value="'.$element.'"/>'.$element.'</label></span>';
				}
				$this->_smarty->assign('meridians', $meridians);
				
				$pathologies = '';
				$checkeds = $this->getSelectedPathologyTypes();
				$datas = array('méridien', 'organe/viscère', 'luo', 'merveilleux vaisseaux', 'jing jin');
				foreach($datas as $key=>$element){
					$pathologies += '<span class="ckBox"><label><input type="checkbox" name="pathologyType'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							$pathologies += "checked ";
						}
					}
					$pathologies += 'value="'.$element.'">'.$element.'</label></span>';
				}
				$this->_smarty->assign('pathologies', $pathologies);
				
				$features = '';
				$checkeds = $this->getSelectedFeatures();
				$datas = array('plein', 'chaud', 'vide', 'froid', 'interne', 'externe');
				foreach($datas as $key=>$element){
					$features += '<span class="ckBox"><input type="checkbox" name="feature'.$key.'" ';
					foreach($checkeds as $checked){
						if($checked === $element){
							$features += "checked ";
						}
					}
					$features += 'value="'.$element.'">'.$element.'</label></span>';
				}
				$this->_smarty->assign('features', $features);
				
				$results = '';
				$datas = $this->getSearchedPathologies();
				if(isset($_GET['process'])){
					if($_GET['process']=='search'){
						$results += '<h2>Résultats:</h2>';
						$results += '<table class="resultPatho">';
						$results += '<tr>';
						$results += '<td>Description</td>';
						$results += '<td>Meridien</td>';
						$results += '<td>Symptomes</td>';
						$results += '</tr>';
						foreach($datas as $element){
							$results +=  '<tr>'.
									'<td>'.$element->getdesc().'</td>'.
										'<td>'.
										'<br>Nom : '.$element->getmeridian()->getname().
										'<br>Catégorie : '.$element->getmeridian()->getyin().
										'</td>'.
									'<td>';
							foreach($element->getsymptoms() as $element2){
								$results +=  '<br>'.$element2->getdesc();
							}
							$results +=  '</td>';
							$results +=  '</tr>';
						}
						$results += '</table>';
					}
				}
				$this->_smarty->assign('result', $result);
			
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
				
				//$this->_repo->insertUser($pseudo,$pass,$nom,$prenom,$mail);
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
