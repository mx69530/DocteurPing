<?php
	class UserManager{
		private $_bdd;
		
		/**
			Constructeur
		*/
		function __construct() {
			include('lib/model/bdd.php');
			include('lib/model/user.php');

			$this->_bdd = new BDD;
		}
		
		public function checkUser($login, $pass){
			$pass=md5($pass);
			$parameters=array();
			array_push($parameters, $login);
			array_push($parameters, $pass);
			$query="SELECT * FROM users WHERE login like ? and mdp like ?";
			$datas = $this->_bdd->executeQuery($query, $parameters);
				
			if(empty($datas[0])){
				return null;
			}else{
				$user = new User($login, $datas[0]['mdp'] , $datas[0]['idUser'],$datas[0]['prenom'],$datas[0]['nom'],$datas[0]['mail']);
				return $user;
			}		
		}
		
		public function getAccount(){
			$parameters=array();
			array_push($parameters, $_SESSION['idUser']);
			$query="SELECT * FROM users WHERE idUser like ?";
			$datas = $this->_bdd->executeQuery($query, $parameters);
			if(empty($datas[0])){
				return null;
			}else{
				$user = new User($datas[0]['login'], $datas[0]['mdp'] , $datas[0]['idUser'],$datas[0]['prenom'],$datas[0]['nom'],$datas[0]['mail']);
				return $user;
			}	
		}
		
		
		public function getLogin($login){
			$parameters=array();
			array_push($parameters, $login);
			$query="SELECT * FROM users WHERE login like ?";
			$datas = $this->_bdd->executeQuery($query, $parameters);
			if(empty($datas[0])){
				return false; //l'usager n'existe pas
			}else{
				return true; // l'usager existe deja
			}	
		}
		
		
		
		
		public function updateUser($pseudo,$pass,$nom,$prenom,$mail){
			$parameters=array();
			array_push($parameters, $_SESSION['idUser']);
			$query="SELECT mdp FROM users WHERE idUser like ?";
			$datas = $this->_bdd->executeQuery($query, $parameters);
			$oldPass = $datas[0]['mdp'];


			$newParameters=array();
			array_push($newParameters,$prenom);
			array_push($newParameters,$nom);
			array_push($newParameters,$mail);
			if($oldPass!=$pass){array_push($newParameters,md5($pass));}
			array_push($newParameters,$_SESSION['idUser']);
			
			if($oldPass!=$pass){
				$sql = "UPDATE users SET prenom=?, nom=?, mail=?, mdp=? WHERE idUser=?";
			}else{
				$sql = "UPDATE users SET prenom=?, nom=?, mail=? WHERE idUser=?";
			}
			
			$this->_bdd->executeQuery($sql,$newParameters);
			
		}

		public function insertUser($pseudo,$pass,$nom,$prenom,$mail){
			if(!is_string($pseudo) || !is_string($pass) || !is_string($nom) || !is_string($prenom) || !is_string($mail)){
				return;
			}
			$parameters=array();
			array_push($parameters, $prenom);
			array_push($parameters, $nom);
			array_push($parameters, $mail);
			array_push($parameters, $pseudo);
			array_push($parameters, $pass);

			$sql = 'INSERT INTO docteurping.users (prenom, nom, mail, login, mdp)';
			$sql .= 'VALUES (?, ?, ?, ?, ?);';
			
			$this->_bdd->executeQuery($sql,$parameters);
		}
	}
?>
