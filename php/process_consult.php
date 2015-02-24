<?php
  //Affichage des données de la base de donnée
  function getFeatures(){
    //Accès BDD
    return array("c1", "c2");
  }

  function getMeridians(){
    //Accès BDD
    return array("m1", "m2");
  }
  
  function getPathologyTypes(){
    //Accès BDD
    return array("t1", "t2");
  }
  
  function getPathologies($meridian, $pathologyType, $feature){
    $query = 'SELECT * FROM table1 INNER JOIN table2 ON table1.a = table2.b INNER JOIN table3 on table2.a = table3.b WHERE ';
    if(!is_empty($meridian)){
      $query = $query.'table1.name = "'.$meridian.'"';
    }else{
    
    }
    if(!is_empty($pathologyType)){
      $query = $query.'table2.name = "'.$pathologyType.'"';
    }else{
    
    }
    if(!is_empty($feature)){
      $query = $query.'table3.name = "'.$feature.'"';
    }else{
    
    }
  }

?>