<?php
	class Pathology
	{
		private $id;
		private $mer;
		private $type;
		private $desc;

		function __construct() {
			
		}


		public getmeridian(){
			return $this->meridian;
		}

		public setmeridian($meridian){
			$this->meridian = $meridian;
		}

		public getpathologyType(){
			return $this->pathologyType;
		}

		public setpathologyType($pathologyType){
			$this->pathologyType = $pathologyType;
		}

		public getfeature(){
			return $this->feature;
		}

		public setfeature($feature){
			$this->feature = $feature;
		}


	}


?>
