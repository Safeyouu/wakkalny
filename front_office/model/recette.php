<?php

class recette
{

    private  $idrecette=null ;
    private  $titre=null ;
    private  $prept =null;
    private  $cookingt=null ;
    private  $difficulty=null ;
    private  $nb_ppl=null ;
    private  $category=null ;
    private  $descrption=null ;
    private  $photo=null ;
    private  $user=null ;


    public function __construct(string $titre,int $prept,int $cookingt,string $difficulty,int $nb_ppl,string $category,string $description,string $photo,string $user)
    {
        $this->titre=$titre;
        $this->prept=$prept;
        $this->cookingt=$cookingt;
        $this->difficulty=$difficulty;
        $this->nb_ppl=$nb_ppl;
        $this->category=$category;
        $this->description=$description;
        $this->photo=$photo;
		$this->user=$user;

    }
    function getidrecette():int{
		return $this->idrecette;
	}
	function gettitre():string{
		return $this->titre;
	}
	function getprept():int{
		return $this->prept;
	}
	function getcookingt():int{
		return $this->cookingt;
	} 
    function getdifficulty():string{
		return $this->difficulty;
	}
    function getnb_ppl():int{
		return $this->nb_ppl;
	}
    function getcategory():string{
		return $this->category;
	}
    function getdescription():string{
		return $this->description;
	}
    function getphoto():string{
		return $this->photo;
	}
	function getuser():string{
		return $this->user;
	}

    
	function settitre($titre):void{
		$this->titre=$titre;
	}
	function setprept($prept):void{
		$this->prept=$prept;
	}
	function setcookingt($cookingt):void{
		$this->cookingt=$cookingt;
	}
    function setdifficulty($difficulty):void{
		$this->difficulty=$difficulty;
	}
    function setnb_ppl($nb_ppl):void{
		$this->nb_ppl=$nb_ppl;
	}
    function setcategory($category):void{
		$this->category=$category;
	}
    function setdescription($description):void{
		$this->description=$description;
	}
    function setphoto($photo):void{
		$this->photo=$photo;
	}
	function setuser($user):void{
		$this->user=$user;
	}
}
?>