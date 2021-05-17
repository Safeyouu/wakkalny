<?php
    include "../../config.php";
    include_once "../../model/user.php";
 
    class userC {


        function addUser($user){
            $sql="INSERT INTO user (username , nom , prenom , email , mdp , adresse , tel , role , image ) 
			VALUES (:username , :nom  , :prenom , :email , :mdp , :adresse , :tel , :role , :image )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $user->setrole(false);
				$query->execute([
                    'username' => $user->getusername(),
					'nom' => $user->getnom(),
					'prenom' => $user->getprenom(),
					'email' => $user->getemail(),
                    'mdp' => $user->getmdp(),
                    'adresse' => $user->getadresse(),
                    'tel' => $user->gettel(),
                    'role' => $user->getrole(),
                    'image' => $user->getimage()


				]);			
			}
          
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
            }
        }



        public function Logedin($username,$mdp){
            $sql = "SELECT * FROM user WHERE username='$username' && mdp='$mdp'";

            $db = config::getConnexion();
    
            $logedin = $db->query($sql);
            return $logedin->fetchAll();
        }



        function checklogin($username,$mdp)
        {
            $sql="SELECT * FROM user WHERE username=:username AND mdp=:mdp LIMIT 1";
                $db = config::getConnexion();
            
                $query=$db->prepare($sql);
                 
                
                $query->execute(array(':username'=>$username, ':mdp'=>$mdp));
                $row=$query->fetch(PDO::FETCH_ASSOC);

              
                if( $query->rowCount() )
                {
                    if($username==$row["username"] AND $mdp==$row["mdp"]) 
                    {
                       return true ;
                    }
                    else
                    {
                        return false ;
                    }
                }
            
            
        }


        

        function checkpass($mdp)
        {
            $uppercase = preg_match('@[A-Z]@', $mdp);
            $lowercase = preg_match('@[a-z]@', $mdp);
            $number    = preg_match('@[0-9]@', $mdp);
            $specialChars = preg_match('@[^\w]@', $mdp);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($mdp) < 4) 
            {
               return false;
            }
            else
            {
                return true ;
            }
        }


        function checkname($username)
        {
            if (!ctype_alpha($username)) 
            {
               return false ;
            }
            else 
            {
                return true ;
            }
            }
        


        function checkusername($username)
        {
            $sql = "SELECT * FROM user WHERE username=:username LIMIT 1";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute(['username' => $username]);
            if($query->rowCount()){
                return false;
            }
            else 
            {
                return true;
            }
        }


        function checkemail($email)
        {
            $sql = "SELECT * FROM user WHERE email=:email LIMIT 1";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute(['email' => $email]);
            if($query->rowCount()){
                return false;
            }
            else 
            {
                return true;
            }
        }



        function sanitizeString($string)
        {
            $string = strip_tags($string);
            $string = str_replace(' ','',$string);
            return $string;
        }


        function sanitizePassworrd($string)
        {
            $string = md5($string);
            return $string;
        }


        
        
        
          


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


        



        function recupererUser($id){
            $sql="SELECT * from suer where id=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $user=$query->fetch();
                return $user;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

    }
    

?>
