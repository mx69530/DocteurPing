<?php
	class ControllerAccueil
	{
		private $user_manager;
		private $_smarty;
		
		public function __construct($smarty, $user_manager) {
		
		
		if(($_SESSION['pseudo'])){
			//$smarty->assign('mail', $userAccount->getMail());
			$smarty->display('lib/view/templates/accueil.tpl');

		}else{
			$smarty->display('lib/view/templates/log.tpl');
		}
		
			if(isset($_GET['process']) && $_GET['process']=='enregistrer'){
				$this->process_signup();
			}
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
	}
?>
