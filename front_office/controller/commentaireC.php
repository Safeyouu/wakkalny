<?php
 include_once "../config.php";
 require_once '../Model/commentaire.php';

 
 
 
 class commentaireC
  {
		
                 function ajoutercommentaire($commentaire)
                 {
                    $sql="INSERT INTO commentaire ( nom ,prenom ,email,date, commentaire,user ) 
                    VALUES (:nom , :prenom ,:email ,:date, :commentaire,:user)";
                    $pdo = config::getConnexion();
                    try
                    {
                       $query = $pdo->prepare($sql);
         
                       $query->execute([
                      'nom' => $commentaire->getnom(),
                      'prenom' => $commentaire->getprenom(),
                      'email' => $commentaire->getemail(),
                      'date' => $commentaire->getdate(),
                      'user' => $commentaire->getuser(),

                     'commentaire' => $commentaire->getcommentaire()]);
                  }
                    catch (Exception $e)
                    {
                       echo 'Erreur: '.$e->getMessage();
                    }			
                  }

                          /* *********************** */



                          
                          public function affichercommentaire()
                          {
			
                            $sql="SELECT * FROM commentaire";
                            $pdo = config::getConnexion();
                            try{
                              $liste= $pdo->query($sql);
                              return $liste;
                            }
                            catch (Exception $e){
                              die('Erreur: '.$e->getMessage());
                            }	
                          }



                      /* ****************************** */
                      
                      function supprimercommentaire($idcom)
                      {
                          try
                           {
                               $pdo = config::getConnexion();
                                $query = $pdo->prepare(
                                'DELETE FROM commentaire WHERE idcom = :idcom' );
                                $query->execute([
                                'idcom' => $idcom ]);
                            }
                              catch (Exception $e)
                           {
                               die('Erreur: '.$e->getMessage());
                           }
                       }
                       
                       
                       
                       
                       
                       
                       
                       
                       /* **************************** */

                        function modifiercommentaire($commentaire,$idcom){
                            $sql="UPDATE commentaire SET  nom=:nom,prenom=:prenom,email=:email,date=:date,commentaire=:commentaire WHERE idcom=:idcom";
                            
                            $pdo = config::getConnexion();
                            try{		
                            $query=$db->prepare($sql);
                            $nom=$commentaire->getnom();
                            $prenom=$commentaire->getprenom();
                            $email=$commentaire->getemail();
                            $date=$commentaire->getdate();
                            $commentaire=$commentaire->getcommentaire();
                            $datas = array( 
                                ':idbblog'=>$idcom,
                                ':nom'=>$nom,
                                ':prenom'=>$prenom,
                                ':email'=>$email,
                                ':date'=>$date,
                                 ':commentaire'=>$commentaire);
                                 
                            $query->bindValue(':idcom',$idcom);
                            $query->bindValue(':nom',$nom);
                            $query->bindValue(':prenom',$prenom);
                            $query->bindValue(':email',$email);
                            $query->bindValue(':date',$date);
                            $query->bindValue(':commentaire',$commentaire);
                            
                            
                            
                                $s=$query->execute();
                            }
                            catch (Exception $e){
                                echo " Erreur ! ".$e->getMessage();
                       echo " Les datas : " ;
                      print_r($datas);
                            }
                            
                        }

                        function recuperercommentaire($idcom){
                          $sql="SELECT * from commentaire where idcom=$idcom";
                          $pdo = config::getConnexion();
                          try{
                              $query=$db->prepare($sql);
                              $query->execute();
                  
                              $commentaire=$query->fetch();
                              return $commentaire;
                          }
                          catch (Exception $e){
                              die('Erreur: '.$e->getMessage());
                          }
                      }
                    

                      /* **************************** */
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
  }
?>