<?php
	class Controller
	{
		private $_consultations;
		private $_user_manager;
		private $_smarty;

		/**
			Contructeur
		*/
		public function __construct() {
			//Init smarty
			require('Smarty/Smarty.class.php');
			$this->_smarty = new Smarty();

			$this->_smarty->setTemplateDir('lib/view/templates');
			$this->_smarty->setCompileDir('lib/view/templates_c');
			$this->_smarty->setCacheDir('lib/view/cache');
			$this->_smarty->setConfigDir('lib/view/configs');
			
			//Controleur de pied de page
			include('lib/ctrl/ctrl_header.php');
			new ControllerHeader($this->_smarty);
		}

		/**
			Affichage de la vue dans index.php
		*/
		public function currentView(){
						
			echo "<div id='page'>" ;


			if (isset($_GET["current"])){
				$current=$_GET["current"];
				/*echo 'La page courante est : '.$current;*/
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
			
			if($current=='log' || $current=='signup' || $current=='account'){
				include('lib/model/user_manager.php');
				$this->_user_manager = new UserManager;
			}
				
			//Controleur d'accueil
			if($current=='log' ||$current=='' ){
				include('lib/ctrl/ctrl_log.php');
				new ControllerLog($this->_smarty, $this->_user_manager);		
			}
			
			
			//Controleur de connexion
			if($current=='log'){
				
			}
			
			//Controleur d'enregistrement
			if($current=='signup'){
				include('lib/ctrl/ctrl_signup.php');
				new ControllerSignup($this->_smarty, $this->_user_manager);	
			}
			
			//Controleur de compte
			if($current=='account'){
				include('lib/ctrl/ctrl_account.php');
				new ControllerAccount($this->_smarty, $this->_user_manager);
			}
			
			//Controleur de consultation
			if($current === 'consultation'){
				include('lib/ctrl/ctrl_consultation.php');
				include('lib/model/consultations.php');
				
				$this->_consultations = new Consultations;
				new ControllerConsultation($this->_smarty, $this->_consultations);	
			}
			
			//Controleur de fluxrss
			if($current === 'fluxRSS'){
				include('lib/ctrl/ctrl_fluxrss.php');
				include('lib/model/fluxrss.php');
				
				$fluxrss = new FluxRSS;
				new ControllerFluxRSS($this->_smarty, $fluxrss);	
			}
			
			echo "</div>";
			
			//Controleur de bas de page
			include('lib/ctrl/ctrl_footer.php');
			new ControllerFooter($this->_smarty);	
			
		}
		
	}

?>
