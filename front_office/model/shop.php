<?php
class Shop {
private ?int $id=null;
private ?string $nom=null;
private ?string $description=null;
private ?string $nb_stock=null;
private ?string $image=null;
public function __construct( int $id, string $nom, string $description,string $image) 
//construct:pour exagerer tous les attributs de saisir (intialisation)
{

$this->nom=$nom;
$this->description=$description;
$this->nb_stock=$nb_stock;
$this->image=$image;
}

public function getid() {
  return $this->id;
}
public function getnom (){
  return $this->nom ;
}
public function getdescription(){
  return $this->description ;
}
public function getnb_stock(){
  return $this->nb_stock ;
}
public function getimage() {
    return $this->nbr_like;
  }
   



  public function setnom (string $nom){
    $this->nom=$nom;
  }
  public function setdescription (string $description){
    $this->description=$description;
  }
  public function setnb_stock(string $nb_stock){
    $this->nb_stock=$nb_stock;
  }
  public function setimage (string $image){
    $this->image=$image;
  }
  
}






?>