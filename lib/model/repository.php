<?php
	class Repository{
		private $_bdd;
		private $_meridians;
		private $_pathologies;

		/**
			Constructeur
		*/
		function __construct() {
			include('lib/model/bdd.php');
			include('lib/model/meridian.php');
			include('lib/model/pathology.php');
			include('lib/model/symptom.php');
			$this->_bdd = new BDD;
			$this->_pathologies = array();
			$this->_meridians = array();
			$this->_symptpatho = array();
			$this->_symptoms = array();
		}
		
		/**
			Trouve une pathologie à l'aide de filtres
		*/
		public function findPathologyWithFilters($meridian, $pathologyType, $feature){
			$meridian = "%".$meridian."%";
			$pathologyType = "%".$pathologyType."%";
			$feature = "%".$feature."%";

			$query = "SELECT p.idP, p.type, p.desc as descP, s.idS, s.desc as descS, m.code, m.nom, m.element, m.yin FROM patho as p ";
			$query .= "INNER JOIN symptpatho as sp ON  p.idP = sp.idP ";
			$query .= "INNER JOIN symptome as s ON  sp.idS = s.idS ";
			$query .= "INNER JOIN meridien as m ON  m.code = p.mer ";
			$query .= "WHERE m.nom like ? ";
			$query .= "AND p.desc like ? ";
			$query .= "AND p.desc like ? ";
			$query .= "LIMIT 10";
			$datas = $this->_bdd->executeQuery($query,array($meridian, $pathologyType, $feature));

			//TODO instancier les objets
			foreach($datas as $row){
				if($row['yin'] === '0'){
					$row['yin'] = 'yang';
				}else{
					$row['yin'] = 'yin';
				}
				$meridian = new Meridian($row['code'], $row['nom'], $row['element'], $row['yin']);
				$symptom = new Symptom($row['idS'], $row['descS']);
				
				if($pathology = $this->_isPathologyLoaded($row['idP'])){
					$loaded = false;
					foreach($pathology->getsymptoms() as $element){
						if($element->getid() === $symptom->getid()){
							$loaded = true;
						}
					}
					if(!$loaded){
						$pathology->addsymptom($symptom);
					}
				}else{
					$pathology = new Pathology($row['idP'], $row['descP'], $meridian, array($symptom));
					array_push($this->_pathologies, $pathology);
				}
							
			}
			
			return $this->_pathologies;
		}

		
		public function getMeridians(){
			$query = "SELECT code, nom, element, yin FROM meridien";
			$datas = $this->_bdd->executeQuery($query,array());
			
			foreach($datas as $row){
				if(!$this->_isMeridianLoaded($row['code'])){
					array_push($this->_meridians, new Meridian($row['code'], $row['nom'], $row['element'], $row['yin']));
				}
			}
			
			return $this->_meridians;
		}
		
		private function _isMeridianLoaded($id){
			foreach($this->_meridians as $element){
				if($element->getid() === $id){
					return $element;
				}
			}
			return false;
		}
		
		private function _isPathologyLoaded($id){
			foreach($this->_pathologies as $element){
				if($element->getid() === $id){
					return $element;
				}
			}
			return false;
		}
	}
?>
