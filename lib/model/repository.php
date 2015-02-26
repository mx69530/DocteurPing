<?php
	class Repository{
		private $bdd;

		/**
			Constructeur
		*/
		function __construct() {
			$bdd = new BDD;
		}
		
		/**

		*/
		function findPathologyWithFilters($meridian, $pathologyType, $feature){
			if(!is_array($meridian) || !is_array($pathologyType) || !is_array($feature)){
				return null;
			}
			$query = "SELECT p.idP, p.mer, p.type, p.desc, s.desc FROM patho as p";
			$query .= "INNER JOIN symptPatho as sp ON  p.idP = sp.idP";
			$query .= "INNER JOIN symptome as s ON  sp.idS = s.idS";
			$query .= "INNER JOIN meridien as m ON  m.code = p.mer";
			$query .= "WHERE m.name like ?";
			$query .= "AND p.desc like ?";
			$query .= "AND p.desc like ?";
			$data = $bdd->executeQuery($query,array($meridian, $pathologyType, $feature));
		}
	}
?>
