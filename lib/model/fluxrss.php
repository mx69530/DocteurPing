<?php
	class FluxRSS
	{
		private $flux;
		
		/**
			Contructeur
		*/
		public function __construct() {
			include('lib/model/bdd.php');
			$this->flux = array();

			$bdd = new BDD;
			
			$query = "SELECT name, file FROM fluxrss";
			$datas = $bdd->executeQuery($query,array());
			
			foreach($datas as $row){
				$this->flux[$row['name']] = $row['file'];
			}
		}
		
		/**
			Getter
		*/
		public function getFlux(){
			return $this->flux;
		}
	}
?>