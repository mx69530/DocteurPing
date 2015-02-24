<?php
  
  function executeQuery($query){
    $result = array();
    try
    {
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
	    die('Erreur : '.$e->getMessage());
    }
    $answer = $bdd->query('SELECT nom FROM jeux_video');
    
    
    while ($data = $answer->fetch())
    {
	array_push($result, $data);
    }
    $answer->closeCursor();
    return $data;
  }
?>