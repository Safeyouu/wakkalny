<?php
class ingrediants
{
    private  $id=null ;
	private  $nom=null ;
    private  $quantite=null ;
  

    public function __construct(string $nom ,string $quantite )
    {   $this->nom=$nom;
        $this->quantite=$quantite;
       
    }
    function getid():int{
		return $this->id;
	}
	function getnom():string{
		return $this->nom;
	}
	function getquantite():string{
		return $this->quantite;
	}
	

	function setnom($nom):void{
		$this->nom=$nom;
	}
	function setquantite($quantite):void{
		$this->quantite=$quantite;
	
	}
}
?>