<?php
class Shop { 
private  $id=null;
private  $nom=null;
private  $description=null;
private  $nb_stock=null;
private  $prix=null;
private  $image=null;
private  $idCategorie=null;

public function __construct(  string $nom, string $description,int $nb_stock ,string $prix,string $image , int $idCategorie) 
//construct:pour exagerer tous les attributs de saisir (intialisation)
{
$this->nom=$nom;
$this->description=$description;
$this->nb_stock=$nb_stock;
$this->prix=$prix;
$this->image=$image;
$this->idCategorie = $idCategorie ;
}

 function getid():int {
  return $this->id;
}
 function getnom ():string{
  return $this->nom ;
}
 function getdescription():string{
  return $this->description ;
}
 function getnb_stock():int{
  return $this->nb_stock ;
}
function getprix():string {
  return $this->prix;
}
 function getimage():string {
    return $this->image;
  }
   

  function getidCategorie():int {
    return $this->idCategorie;
  }





   function setnom ( $nom):void{
    $this->nom=$nom;
  }
   function setdescription ( $description):void{
    $this->description=$description;
  }
  function setnb_stock( $nb_stock):void{
    $this->nb_stock=$nb_stock;
  }
  function setprix ( $prix):void{
    $this->prix=$prix;
  }

  function setimage ( $image):void{
    $this->image=$image;
  }

  function setiDCategorie( $idCategorie):void{
    $this->idCategorie=$idCategorie;
  }
  
}


?>