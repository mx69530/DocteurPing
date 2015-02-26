<?php
	class BDD
	{
		private $_bdd;

		function __construct() {
			connect();
		}

		/**
			Connexion à la base de données
		*/
		private function connect(){
			try
			{
				$_bdd = new PDO('mysql:host=localhost;dbname=docteurping;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		}

		/**
			Exécution d'une requête
		*/
		public function executeQuery($preparedQuery, $args)
		{
			if(!is_array($args)){
				return null;
			}
			$result = array();
			
			$query = $bdd->prepare($preparedQuery);
			$answer = $query->execute($arg);

			while ($data = $answer->fetch())
			{
				array_push($result, $data);
			}
			$answer->closeCursor();
			return $data;
		}
	}
?>
