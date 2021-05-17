<?php
    include "../../config.php";
    include_once "../../model/contact.php";
 
    class contactC {
        function addContact($contact){
            $sql="INSERT INTO contact (sujet , message , mail ) 
			VALUES (:sujet , :message , :mail  )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    'sujet' => $contact->getsujet(),
                    'message' => $contact->getmessage(),
                    'mail' => $contact->getmail()]);
			}
          
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
            }
        }



          


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


		function getUserbyname($username) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE username = :username'
                );
                $query->execute([
                    'username' => $username
                ]);
                return $query->fetch();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }


        function deleteContact($id){
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM contact WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                } catch (Exception $e) {
                    die('Erreur: '.$e->getMessage());
                }
            }
    
	}
