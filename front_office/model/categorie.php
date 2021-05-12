<?php
class Categorie {
private  $id=null;
private  $nom=null;


public function __construct(  string $nom) 
//construct:pour exagerer tous les attributs de saisir (intialisation)
{
$this->nom=$nom;
}

 function getid():int {
  return $this->id;
}
 function getnom():string{
  return $this->nom ;
}
 
   function setnom($nom):void{
    $this->nom=$nom;
  }
    
}


?>