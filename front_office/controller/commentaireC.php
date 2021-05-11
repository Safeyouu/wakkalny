<?php
 include_once "../config.php";
 require_once '../Model/commentaire.php';

 
 
 
 class commentaireC
  {
		
                 function ajoutercommentaire($commentaire)
                 {
                    $sql="INSERT INTO commentaire ( nom ,prenom ,email,date, commentaire ) 
                    VALUES (:nom , :prenom ,:email ,:date, :commentaire)";
                    $pdo = config::getConnexion();
                    try
                    {
                       $query = $pdo->prepare($sql);
         
                       $query->execute([
                      'nom' => $commentaire->getnom(),
                      'prenom' => $commentaire->getprenom(),
                      'email' => $commentaire->getemail(),
                      'date' => $commentaire->getdate(),

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
                          echo 'test modif C' ;
                          $db = config::getConnexion();
                          $query = $db->prepare(
                            'UPDATE commentaire SET                     
                              nom = :nom, 
                              prenom = :prenom, 
                              email = :email,
                              date = :date, 
                             commentaire= :commentaire  	
                            WHERE idcom = :idcom '
                          );
                          $query->bindValue('nom' , $commentaire->getnom()) ;
                          $query->bindValue('prenom' , $commentaire->getprenom());
                          $query->bindValue('email' , $commentaire->getemail());
                          $query->bindValue('date' , $commentaire->getdate());
                          $query->bindValue('commentaire' , $commentaire->getcommentaire());
                          $query->bindValue('idblog' , $idblog);
                          try {
                          $query->execute();
                          echo "test" ;
                          echo $query->rowCount() . " records UPDATED successfully <br>";
                        } catch (PDOException $e) {
                          echo $e->getMessage();
                        }
                            
                        }

                        function recuperercommentaire($idcom){
                            $sql="SELECT * from commentaire where idcom=$idcom";
                            $db = config::getConnexion();
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
                    
  }
?>