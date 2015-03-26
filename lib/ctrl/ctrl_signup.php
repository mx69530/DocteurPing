<?php
	class ControllerSignup
	{
		private $_user_manager;
		private $_smarty;
		private $_errors;
		
		public function __construct($smarty, $user_manager) {	
			$this->_user_manager = $user_manager;
			$this->_smarty = $smarty;
			$this->_errors = '';
			if(isset($_GET['process']) && $_GET['process']=='enregistrer'){
				$this->process_signup();
			}
			$this->_smarty->assign('errors',$this->_errors);
			$this->_smarty->display('lib/view/templates/signup.tpl');
		}
		
		public function process_signup(){
			if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mail=$_POST['mail'];
				$pseudo=$_POST['pseudo'];
				$pass=md5($_POST['pass']);
				$passlog=$_POST['pass'];// varibale n"cessaire pour la fonction process_login()
				
				if($this->_user_manager->getLogin($pseudo)==false){
					if(strlen($nom)>2 && strlen($prenom)>2 && $this->ckmail($mail)&& strlen($pseudo)>5 && strlen($passlog)>5){
						//AJOUT donnée
						$this->_user_manager->insertUser($pseudo,$pass,$nom,$prenom,$mail);
						$this->process_login($pseudo,$passlog);
					}else{
						if(strlen($nom)<=2){
							$this->_errors.="<br>Votre nom est trop court";
						}
						if(strlen($prenom)<=2){
							$this->_errors.="<br>Votre prenom est trop court";
						}
						if(!$this->ckmail($mail)){
							$this->_errors.="<br>Votre mail n'est pas correct";
						}
						if(strlen($pseudo)<=5){
							$this->_errors.="<br>Votre pseudo doit contenir au moin 5 caractères";
						}
						if(strlen($passlog)<=5){
							$this->_errors.="<br>Votre mot de passe doit contenir au moin 5 caractères<br>";
						}	
					}
				}else{
					$this->_errors.="<br>Le pseudo est déja utilisé<br>";
				}		
			} 
		}

		public function ckMail($mail){
		
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			//L'email est bonne
				return true;
			}else{
				return false;
			}
		}
		
		public function process_login($pseudo,$pass){

			$_SESSION['connect']=0; //Initialise la variable 'connect'.
			if (($user=$this->_user_manager->checkUser($pseudo,$pass))!=null) 
			{
				$_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
				$_SESSION['pseudo']=$pseudo;// Permet de récupérer le login afin de personnaliser la navigation.
				$_SESSION['nom']=$user->getNom();
				$_SESSION['prenom']=$user->getPrenom();
				$_SESSION['idUser']=$user->getId();
				header("Location:index.php?current=log"); // Header nécessaire pour affichage du menu utilisateur connecté
			}else{
				echo "<br>Erreur de connexion<br>";
			}
		
		}
	
	}
?>
