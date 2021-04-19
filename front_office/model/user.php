<?php
class user {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $adresse;
    private $tel;
    private $role;
    public function __construct(string $nom,string $prenom,string $email,string $mdp,string $adresse,int $tel,string $role)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->adresse=$adresse;
        $this->tel=$tel;
        $this->rol=$role;
    }
    function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->prenom;
	}
	function getprenom(){
		return $this->prix;
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
	

}

?>