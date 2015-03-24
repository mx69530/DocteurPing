<?php
	class ControllerHeader
	{
		private $_repo;
		private $_smarty;
		
		public function __construct($smarty, $repo) {
			$compte=" ";
			if(($_SESSION['pseudo'])){
				$compte .= '<li>';
				$compte .= ' <a href="index.php?current=account">Mon compte</a>';
				$compte .= '</li>';
			}
			
			$connexion = ' ';
			if(($_SESSION['pseudo'])){
				$connexion .=' <a href="index.php?current=log&process=logout">Deconnexion</a>';
			}else{
				$connexion .= ' <a href="index.php?current=log">Connexion</a>';
			}

			$smarty->assign('compte', $compte);
			$smarty->assign('connexion', $connexion);
			$smarty->display('lib/view/templates/header.tpl');
		}
		
	}
?>
