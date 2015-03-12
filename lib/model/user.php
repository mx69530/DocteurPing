<?php			
	class User{
		private $_bdd;
		private $login;
		private $pass;
		private $idUser;
		private $prenom;
		private $nom;
		private $mail;

		function __construct($login, $pass, $idUser,$prenom,$nom,$mail) {
			//include('lib/model/bdd.php');
			$this->_bdd = new BDD;
			$this->login = $login;
			$this->pass = $pass;
			$this->idUser = $idUser;
			$this->prenom = $prenom;
			$this->nom = $nom;
			$this->mail = $mail;
		}
		
		public function getNom()
		{
			return $this->nom;
		}
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getMail()
		{
			return $this->mail;
		}
		
		public function getId()
		{
			return $this->idUser;
		}		

		public function getLogin()
		{
			return $this->login;
		}	

		public function getPass()
		{
			return $this->pass;
		}			
	
	}

?>