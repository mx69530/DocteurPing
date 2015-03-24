<?php
	class ControllerAccount
	{
		private $_repo;
		
		/**
			Contructeur
		*/
		public function __construct($smarty, $repo) {
			$this->_repo = $repo;
		
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
			
			$this->_repo->updateUser($pseudo,$pass,$nom,$prenom,$mail);			
		}
		
	}
?>
