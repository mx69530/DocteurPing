<?php
	class BDD
	{
		private $_bdd;

		function __construct() {
			$this->connect();
		}
	
		/**
			Connexion à la base de données
		*/
		private function connect(){
			try
			{
				$this->_bdd = new PDO('mysql:host=localhost;dbname=docteurping;charset=utf8', 'root', '');
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

			$query = $this->_bdd->prepare($preparedQuery);

			$query->execute($args);

			while ($data = $query->fetch())
			{
				array_push($result, $data);
			}
			$query->closeCursor();
			return $result;
		}
		
		public function updateBDD($sql, $args){
			if(!is_array($args)){
				return null;
			}
			//$sql de la forme : $sql = "UPDATE books SET title=?, author=? WHERE id=?";
			$query = $this->_bdd->prepare($sql);
			$query->execute($args);
			$query->closeCursor();
			return 1;
		}
		
		
		public function addRow($sql, $args){
// FONCTION A FAIRE 
		}
		
	}
?>
