<?php
    include "../config.php";
    include_once "../model/user.php";
 
    class userC {
        function adduser($user){
            $sql="INSERT INTO user ( nom , prenom , email , mdp , adresse , tel , role) 
			VALUES (:nom , :prenom , :email , :mdp , :adresse , :tel , :role)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'nom' => $user->getnom(),
					'prenom' => $user->getprenom(),
					'email' => $user->getemail(),
                    'mdp' => $user->getmdp(),
                    'adresse' => $user->getadresse(),
                    'tel' => $user->gettel(),
                    'role' => $user->getrole(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
            }
        }
    }

?>
