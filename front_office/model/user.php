<?php
class user {
    private $id = null;
	private $username = null;
    private $nom = null;
	private $prenom = null;
    private $email = null;
    private $mdp = null;
    private $adresse = null;
    private $tel = null;
    private $role = null;
	private $image = null;
	
	
    public function __construct(string $username,string $nom,string $prenom,string $adresse,int $tel,string $email,string $mdp,string $image,int $role )
    {
        $this->username=$username;
		$this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->adresse=$adresse;
        $this->tel=$tel;
		$this->image=$image;
		$this->role=$role;


    }

	public function login(string $username,string $mdp)
    {
        $this->username=$username;
        $this->mdp=$mdp;
        

    }


    function getid(){
		return $this->id;
	}
	function getusername(){
		return $this->username;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
    function getmdp(){
		return $this->mdp;
	}
    function getadresse(){
		return $this->adresse;
	}
    function gettel(){
		return $this->tel;
	}
    function getrole(){
		return $this->role;
	}
	function getimage(){
		return $this->image;
	}

	function setusername($username){
		$this->username=$username;
	}
	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setmdp($mdp){
		$this->mdp=$mdp;
	}
	function setadresse($adresse){
		$this->adresse=$adresse;
	}
	function settel($tel){
		$this->tel=$tel;
	}
	function setrole($role){
		$this->role=$role;
	}
	function setimage($image){
		$this->image=$image;
	}

}

?>