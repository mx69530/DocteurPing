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
		public function findPathologyWithFilters($keyword, $meridians, $pathologyTypes, $features){
			if(!is_string($keyword) || !is_array($meridians) || !is_array($pathologyTypes) || !is_array($features)){
				return array();
			}
			
			if(empty($meridians)){
				array_push($meridians, "%");
			}
			if(empty($pathologyTypes)){
				array_push($pathologyTypes, "%");
			}
			if(empty($features)){
				array_push($features, "%");
			}
			
			$keyword = "%".$keyword."%";
			foreach($pathologyTypes as $key=>$pathologyType){
				$pathologyTypes[$key] = "%".$pathologyType."%";
			}			
			foreach($features as $key=>$feature){
				$features[$key] = "%".$feature."%";
			}

			$parameters = array();
			
			//Preparation de la requête
			$query = "SELECT DISTINCT p.idP, p.type, p.desc as descP, s.idS, s.desc as descS, m.code, m.nom, m.element, m.yin FROM patho as p ";
			$query .= "INNER JOIN symptpatho as sp ON  p.idP = sp.idP ";
			$query .= "INNER JOIN symptome as s ON  sp.idS = s.idS ";
			$query .= "INNER JOIN meridien as m ON  m.code = p.mer ";
			$query .= "INNER JOIN keysympt as ks ON  ks.idS = s.idS ";
			$query .= "INNER JOIN keywords as kw ON  kw.idK = ks.idK ";
			
			$query .= "WHERE (";
			$query .= "kw.name like ? ";
			array_push($parameters, $keyword);
			$query .= ") AND (";
			foreach($meridians as $key=>$meridian){
				if($key != 0){
					$query .= "OR ";
				}
				$query .= "m.nom like ? ";
				array_push($parameters, $meridian);
			}
			$query .= ") AND (";
			foreach($pathologyTypes as $key=>$pathologyType){
				if($key != 0){
					$query .= "OR ";
				}
				$query .= "p.desc like ? ";
				array_push($parameters, $pathologyType);
			}
			$query .= ") AND (";
			foreach($features as $key=>$feature){
				if($key != 0){
					$query .= "OR ";
				}
				$query .= "p.desc like ? ";
				array_push($parameters, $feature);
			}
			$query .= ")";
			
			$datas = $this->_bdd->executeQuery($query, $parameters);
			//Instancie les objets
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
