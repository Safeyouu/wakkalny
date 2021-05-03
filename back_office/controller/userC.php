<?php
    include "../../config.php";
    include_once "../../model/user.php";
 
    class userC {
        function addUser($user){
            $sql="INSERT INTO user (username , nom , prenom , email , mdp , adresse , tel , role , image) 
			VALUES (:username , :nom  , :prenom , :email , :mdp , :adresse , :tel , :role , :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $user->setrole("ROLE_USER");
				$query->execute([
                    'username' => $user->getusername(),
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

    
        public function getUserbyname($username) {
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
		    $sql="UPDATE user SET  username=:username,nom=:nom,prenom=:prenom,email=:email,adresse=:adresse,tel=:tel,image=:image WHERE id=:id";
		
		    $db = config::getConnexion();
		    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{		
            $query=$db->prepare($sql);
            $username=$user->getusername();
            $nom=$user->getnom();
            $prenom=$user->getprenom();
            $prenom=$user->getemail();
            $adresse=$user->getadresse();
            $tel=$user->gettel();
            $image=$user->getimage();
            $datas = array( 
                ':id'=>$id,
                ':username'=>$username,
                ':nom'=>$nom,
                ':prenom'=>$prenom,
                ':email'=>$email,
                ':adresse'=>$adresse,
                ':tel'=>$tel,
                ':image'=>$image);
            $query->bindValue(':id',$id);
            $query->bindValue(':username',$username);
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

        /*public function updateThread($user, $id) {
            try {
                $db = config::getConnexion();
                $sql="UPDATE user SET  username=:username,nom=:nom,prenom=:prenom,email=:email,adresse=:adresse,tel=:tel,image=:image WHERE id=:id";
                $query = $db->prepare($sql);
                $query->bindValue(':id', $id);
                $username=$user->getusername();
                $nom=$user->getnom();
                $prenom=$user->getprenom();
                $prenom=$user->getemail();
                $adresse=$user->getadresse();
                $tel=$user->gettel();
                $image=$user->getimage();
                $query->bindValue(':username',$username);
                $query->bindValue(':nom',$nom);
                $query->bindValue(':prenom',$prenom);
                $query->bindValue(':email',$email);
                $query->bindValue(':adresse',$adresse);
                $query->bindValue(':tel',$tel);
                $query->bindValue(':image',$image);
                
                    $query->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }*/

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

        /* ************************************* */

        function desactiverClient($mail)

        {
            $sql="UPDATE user SET etat=:etat WHERE mail='$mail'";
                $db = config::getConnexion();
    
                try{		
            $req=$db->prepare($sql);
           
    
            
            $req->bindValue(':etat',"Non");
            
            
                $s=$req->execute();
                
               // header('Location: index.php');
            }
            catch (Exception $e){
                echo " Erreur ! ".$e->getMessage();
       
            }
    
        }

      

    }

?>
