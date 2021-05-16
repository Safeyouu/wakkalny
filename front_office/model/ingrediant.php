<?php
class ingrediants
{
    private  $id=null ;
	private  $nom=null ;
    private  $quantite=null ;
	private  $user=null ;


    public function __construct(string $nom ,string $quantite,string $user )
    {   $this->nom=$nom;
        $this->quantite=$quantite;
		$this->user=$user;

       
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
	function getuser():string{
		return $this->user;
	}

	function setnom($nom):void{
		$this->nom=$nom;
	}
	function setquantite($quantite):void{
		$this->quantite=$quantite;
	
	}
	function setuser($user):void{
		$this->user=$user;
	}
	
}
?>