<?php
class blog
{
    private  $idblog=null;
    private  $nom=null ;
    private  $titre =null;
    private  $sujet=null;
    private  $image=null;

    public function __construct(string $nom,string $titre,string $sujet,string $image)
    {
        
        $this->nom=$nom;
        $this->titre=$titre;
        $this->prix=$sujet;
        $this->image=$image;
    }
    function getidblog():int{
		return $this->idblog;
	}
    function getnom():string{
		return $this->nom;
	}
	function gettitre():string{
		return $this->titre;
	}
	function getsujet():string{
		return $this->prix;
	}
	function getimage():string{
		return $this->image;
	}

/* ************************* */



    function setnom($nom):void{
		$this->nom=$nom;
	}

	function settitre($titre):void{
		$this->titre=$titre;
	}
	function setsujet($sujet):void{
		$this->sujet=$sujet;
	}
	function setimage($image):void{
		$this->image=$image;
	}
	
}
?>