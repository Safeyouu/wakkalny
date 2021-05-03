<?php
class user {
    private $id;
	private $sujet;
    private $tel;
    private $email;
   
    public function __construct(string $sujet,int $tel,string $email)
    {
        $this->sujet=$sujet;
		$this->tel=$tel;
        $this->email=$email;
       

    }


    function getid(){
		return $this->id;
	}
	function getsujet(){
		return $this->sujet;
	}
	function gettel(){
		return $this->tel;
	}
	function getemail(){
		return $this->email;
	}
 

	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	function settel($tel){
		$this->tel=$tel;
	}
	function setemail($email){
		$this->email=$email;
	}
	

}

?>