<?php
class contact {
    private $id = null;
	private $sujet = null;
    private $message = null;
   
    public function __construct(string $sujet,string $message,string $mail)
    {
        $this->sujet=$sujet;
		$this->message=$message;
		$this->mail=$mail;
       

    }


    function getid(){
		return $this->id;
	}
	function getsujet(){
		return $this->sujet;
	}
	function getmessage(){
		return $this->message;
	}
	function getmail(){
		return $this->mail;
	}
	
 

	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	function setmessage($message){
		$this->message=$message;
	}
	function setmail($mail){
		$this->mail=$mail;
	}
	

}

?>