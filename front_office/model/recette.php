<?php

class recette
{

    private  $idrecette ;
    private  $titre ;
    private  $prept ;
    private  $cookingt ;
    private  $difficulty ;
    private  $nb_ppl ;
    private  $category ;
    private  $descrption ;
    private  $photo ;


    public function __construct(string $titre,string $prept,string $cookingt,string $difficulty,int $nb_ppl,string $category,string $description,string $photo)
    {
        $this->titre=$titre;
        $this->prept=$prept;
        $this->cookingt=$cookingt;
        $this->difficulty=$difficulty;
        $this->nb_ppl=$nb_ppl;
        $this->category=$category;
        $this->description=$description;
        $this->photo=$photo;
    }
    function getrecette(){
		return $this->idrecette;
	}
	function gettitre(){
		return $this->titre;
	}
	function getprept(){
		return $this->prept;
	}
	function getcookingt(){
		return $this->cookingt;
	}
    function getdifficulty(){
		return $this->difficulty;
	}
    function getnb_ppl(){
		return $this->nb_ppl;
	}
    function getcategory(){
		return $this->category;
	}
    function getdescription(){
		return $this->description;
	}
    function getphoto(){
		return $this->photo;
	}

    
	function settitre($titre){
		$this->titre=$titre;
	}
	function setprept($prept){
		$this->prept=$prept;
	}
	function setcookingt($cookingt){
		$this->cookingt=$cookingt;
	}
    function setdifficulty($difficulty){
		$this->difficulty=$difficulty;
	}
    function setnb_ppl($nb_ppl){
		$this->nb_ppl=$nb_ppl;
	}
    function setcategory($category){
		$this->category=$category;
	}
    function setdescription($description){
		$this->description=$description;
	}
    function setphoto($photo){
		$this->photo=$photo;
	}
}
?>