<?php
    include "../config.php";
    include_once "../model/contact.php";
 
    class userC {
        function addUser($contact){
            $sql="INSERT INTO contact (sujet , tel , email) 
			VALUES (:sujet , :tel  , :email )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $user->setrole("ROLE_USER");
				$query->execute([
                    'sujet' => $contact->getsujet(),
                    'tel' => $contact->gettel(),
					'email' => $contact->getemail(),
                    
                    
				]);			
			}
          
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
            }
        }



          

        /* ************************************* */

        function showcontact(){
			
			$sql="SELECT * FROM contact";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
