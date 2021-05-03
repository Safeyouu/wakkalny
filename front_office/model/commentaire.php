<?php
class commentaire
{
    private  $idcom=null;
    private  $nom=null ;
    private  $prenom =null;
    private  $email =null;
    private  $commentaire=null;

    public function __construct(string $nom,string $prenom,string $email ,string $commentaire)
    {
        
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->commentaire=$commentaire;
    }
    function getidcom():int{
		return $this->idcom;
	}
    function getnom():string{
		return $this->nom;
	}
	function getprenom():string{
		return $this->prenom;
	}
    function getemail():string{
		return $this->email;
	}
	function getcommentaire():string{
		return $this->commentaire;
	}


/* ************************* */



    function setnom($nom):void{
		$this->nom=$nom;
	}

	function setprenom($prenom):void{
		$this->prenom=$prenom;
	}
    function setemail($email):void{
		$this->email=$email;
	}
	function setcommentaire($commentaire):void{
		$this->commentaire=$commentaire;
	}
	
	
}
?>