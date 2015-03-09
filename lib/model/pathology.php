<?php
	class Pathology
	{
		private $_id;
		private $_meridian;
		private $_desc;
		private $_symptoms;

		function __construct($id, $desc, $meridian = null, $symptoms = array()) {
			$this->_id = $id;
			$this->_meridian = $meridian;
			$this->_desc = $desc;
			$this->_symptoms = $symptoms;
		}


		public function getmeridian(){
			return $this->_meridian;
		}

		public function setmeridian($meridian){
			$this->_meridian = $meridian;
		}
		
		public function getid(){
			return $this->_id;
		}

		public function setid($id){
			$this->_id = $id;
		}
		
		public function getdesc(){
			return $this->_desc;
		}

		public function setdesc($desc){
			$this->_desc = $desc;
		}
		
		public function getsymptoms(){
			return $this->_symptoms;
		}

		public function addsymptom($symptom){
			array_push($this->_symptoms,$symptom);
		}
	}


?>
