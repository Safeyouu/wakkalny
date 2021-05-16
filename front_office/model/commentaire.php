<?php
class commentaire
{
    private  $idcom=null;
    private  $nom=null ;
    private  $prenom =null;
    private  $email =null;
    private  $date =null;
    private  $commentaire=null;
    private  $user=null;

    public function __construct(string $nom,string $prenom,string $email ,string $date,string $commentaire,string $user)
    {
        
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
		$this->date=$date;
        $this->commentaire=$commentaire;
		$this->user=$user;

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
	function getdate():string{
		return $this->date;
	}
	function getcommentaire():string{
		return $this->commentaire;
	}

	function getuser():string{
		return $this->user;
	}
/* ************************* */
function setuser($user):void{
	$this->user=$user;
}




    function setnom($nom):void{
		$this->nom=$nom;
	}

	function setprenom($prenom):void{
		$this->prenom=$prenom;
	}
    function setemail($email):void{
		$this->email=$email;
	}
	function setdate($date):void{
		$this->date=$date;
	}
	function setcommentaire($commentaire):void{
		$this->commentaire=$commentaire;
	}
	
	
}
?>