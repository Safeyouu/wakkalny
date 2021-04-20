<?php
class Shop {
private ?int $id=null;
private ?string $nom=null;
private ?string $description=null;
private ?string $nb_stock=null;
private ?string $nbr_like=null;
private ?string $nbr_commentaire=null;
public function __construct( int $id, string $nom, string $description,string $nb_stock ,string $nbr_like, string $nbr_commentaire) 
//construct:pour exagerer tous les attributs de saisir (intialisation)
{

$this->nom=$nom;
$this->description=$description;
$this->nb_stock=$nb_stock;
$this->nbr_like=$nbr_like;
$this->nbr_commentaire=$nbr_commentaire;
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
public function getnbr_like() {
    return $this->nbr_like;
  }
  public function getnbr_commentaire() {
    return $this->nbr_commentaire;
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
  public function setnbr_like (string $nbr_like){
    $this->nbr_like=$nbr_like;
  }
  public function setnbr_commentaire (string $nbr_commentaire){
    $this->nbr_commentaire=$nbr_commentaire;
  }


  


 
  




 
  



  



 



  

}






?>