<?php
	class Symptom
	{
		private $_id;
		private $_desc;

		function __construct($id, $desc) {
			$this->_id = $id;
			$this->_desc = $desc;
		}

		public function getdesc(){
			return $this->_desc;
		}

		public function setdesc($desc){
			$this->_desc = $desc;
		}

		public function getid(){
			return $this->_id;
		}

		public function setid($id){
			$this->_id = $id;
		}
	}


?>