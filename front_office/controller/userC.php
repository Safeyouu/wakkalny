<?php
    include "../config.php";
    include_once "../model/user.php";
 
    class userC {
        function addUser($user){
            $sql="INSERT INTO user ( nom , prenom , email , mdp , adresse , tel , role , image) 
			VALUES (:nom , :prenom , :email , :mdp , :adresse , :tel , :role , :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $user->setrole("ROLE_USER");
				$query->execute([
					'nom' => $user->getnom(),
					'prenom' => $user->getprenom(),
					'email' => $user->getemail(),
                    'mdp' => $user->getmdp(),
                    'adresse' => $user->getadresse(),
                    'tel' => $user->gettel(),
                    'role' => $user->getrole(),
                    'image' => $user->getimage(),
				]);			
			}
          
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
            }
        }

        /* ************************************* */

        function showUser(){
			
			$sql="SELECT * FROM user";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

          /* ************************************* */

    
        public function getUserbyemail($email) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM user WHERE email = :email'
                );
                $query->execute([
                    'email' => $email
                ]);
                return $query->fetch();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }

        /* ************************************* */

        function deleteUser($id){
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM user WHERE id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            } catch (Exception $e) {
                die('Erreur: '.$e->getMessage());
            }
        }

            /* ************************************* */


        function updateUser($user,$id){
		    $sql="UPDATE user SET  nom=:nom,prenom=:prenom,email=:email,adresse=:adresse,tel=:tel,image=:image WHERE id=:id";
		
		    $db = config::getConnexion();
		    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{		
            $query=$db->prepare($sql);
            $nom=$user->getnom();
            $prenom=$user->getemail();
            $adresse=$user->getadresse();
            $tel=$user->gettel();
            $image=$user->getimage();
            $datas = array( 
                ':id'=>$id,
                ':nom'=>$nom,
                ':prenom'=>$prenom,
                ':email'=>$email,
                ':adresse'=>$adresse,
                ':tel'=>$tel,
                ':image'=>$image);
            $query->bindValue(':id',$id);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':prenom',$prenom);
            $query->bindValue(':email',$email);
            $query->bindValue(':adresse',$adresse);
            $query->bindValue(':tel',$tel);
            $query->bindValue(':image',$image);
            
                $s=$query->execute();
                
            // header('Location: index.php');
            }
            catch (Exception $e){
                echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
            }
            
        }

        /* ************************************* */


        function recupererUser($id){
            $sql="SELECT * from suer where id=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $album=$query->fetch();
                return $album;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

    }

?>
