<?php
	class ControllerHeader
	{
		
		public function __construct($smarty) {
			$compte=" ";
			if(($_SESSION['pseudo'])){
				$compte .= '<li>';
				$compte .= ' <a href="index.php?current=account">Mon compte</a>';
				$compte .= '</li>';
			}
			
			$connexion = ' ';
			if(($_SESSION['pseudo'])){
				$connexion .=' <a href="index.php?current=log&amp;process=logout">Deconnexion</a>';
			}else{
				$connexion .=' <a href="index.php?current=signup">S\'inscrire</a>';
			}

			$smarty->assign('compte', $compte);
			$smarty->assign('connexion', $connexion);
			$smarty->display('lib/view/templates/header.tpl');
		}
		
	}
?>
