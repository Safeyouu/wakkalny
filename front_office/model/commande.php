<?php
class Commande
{
    private  $id ;
    private  $product_name ;
    private  $client_name ;
    private  $email ;
    private  $adresse ;
    private  $phone ;

    public function __construct(int $id,string $product_name,string $client_name,string $email,string $adresse,int $phone)
    {
        $this->id=$id;
        $this->product_name=$product_name;
        $this->client_name=$client_name;
        $this->email=$email;
        $this->adresse=$adresse;
        $this->phone=$phone;
    }
    function getid(){
		return $this->id;
	}
	function getproduct_name(){
		return $this->product_name;
	}
	function getclient_name(){
		return $this->client_name;
	}
	function getemail(){
		return $this->email;
	}
    function getadresse(){
		return $this->adresse;
	}
    function getphone(){
		return $this->phone;
	}

	function setproduct_name($product_name){
		$this->product_name=$product_name;
	}
	function setclient_name($client_name){
		$this->client_name=$client_name;
	}
	function setemail($email){
		$this->email=$email;
	}
    function setadresse($adresse){
		$this->adresse=$adresse;
	}
    function setphone($phone){
		$this->phone=$phone;
	}
	
}
?>