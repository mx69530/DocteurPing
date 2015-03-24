<?php
	class ControllerAccount
	{
		private $_user_manager;
		
		/**
			Contructeur
		*/
		public function __construct($smarty, $user_manager) {
			$this->_user_manager = $user_manager;
		
			if (isset($_GET["action"])){
				$action=$_GET["action"];
			}else{
				$action=null;
			}

			if($action=="upDate"){
				$this->process_accountUpdate();
			}
			
			if (($userAccount=$this->_repo->getAccount())!=null) {
				$smarty->assign('nom', $userAccount->getNom());
				$smarty->assign('prenom', $userAccount->getPrenom());
				$smarty->assign('mail', $userAccount->getMail());
				$smarty->assign('login', $userAccount->getLogin());
				$smarty->assign('pass', $userAccount->getPass());
				$smarty->display('lib/view/templates/account.tpl');
			}else{
				echo'ERREUR : Impossible de récuperer les information du compte';
			}
		}
		
		public function process_accountUpdate(){
			//Nouvelles Valeurs
			if (isset($_POST['pseudo'])) {$pseudo=$_POST['pseudo'];}else{$pseudo="";}
			if (isset($_POST['pass'])) {$pass=$_POST['pass'];}else{$pass="";}
			if (isset($_POST['nom'])) {$nom=$_POST['nom'];}else{$nom="";}
			if (isset($_POST['prenom'])) {$prenom=$_POST['prenom'];}else{$prenom="";}
			if (isset($_POST['mail'])) {$mail=$_POST['mail'];}else{$mail="";}
			
			$this->_user_manager->updateUser($pseudo,$pass,$nom,$prenom,$mail);			
		}
		
	}
?>
