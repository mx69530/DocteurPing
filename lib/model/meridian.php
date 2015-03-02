<?php
	class Meridian{
		private $_id;
		private $_name;
		private $_element;
		private $_yin;

		function __construct($id, $name, $element, $yin) {
			$this->_id = $id;
			$this->_name = $name;
			$this->_element = $element;
			$this->_yin = $yin;
		}
		
		public function getid(){
			return $this->_id;
		}

		public function setid($id){
			$this->_id = $id;
		}
		
		public function getname(){
			return $this->_name;
		}

		public function setname($name){
			$this->_name = $name;
		}
		
		public function getelement(){
			return $this->_element;
		}

		public function setelement($element){
			$this->_element = $element;
		}
		
		public function getyin(){
			return $this->_yin;
		}

		public function setyin($yin){
			$this->_yin = $yin;
		}
	}

?>
