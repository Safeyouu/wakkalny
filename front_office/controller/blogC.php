<?php
 include "../config.php";
 require_once '../Model/blog.php';

 
 
 
 class blogC
  {
		
                 function ajouterblog($blog)
                 {
                    $sql="INSERT INTO blog ( nom ,titre , sujet , image) 
                    VALUES (:nom , :titre , :sujet , :image)";
                    $db = config::getConnexion();
                    try
                    {
                       $query = $db->prepare($sql);
         
                       $query->execute([
                      'nom' => $blog->getnom(),
                      'titre' => $blog->gettitre(),
                       'sujet' => $blog->getsujet(),
                       'image' => $blog->getimage()]);			
                    }
                    catch (Exception $e)
                    {
                       echo 'Erreur: '.$e->getMessage();
                    }			
                  }

                          /* *********************** */

                          public function afficherblog()
                          {
			
                           
                            try
                              { $pdo=config::getConnexion();
                                $query= $pdo ->prepare(
                                  'SELECT * FROM blog'
                              );
                              $query->execute();
                              $result = $query->fetchAll();

                                return $result;
                              }
                              catch (PDOException $e)
                              {
                                die('Erreur: '.$e->getMessage());
                              }
                           } 
                      



                      /* ****************************** */
                      
                      function supprimerblog($idblog)
                      {
                          try
                           {
                               $pdo = config::getConnexion();
                                $query = $pdo->prepare(
                                'DELETE FROM blog WHERE idblog = :idblog' );
                                $query->execute([
                                'idblog' => $idblog ]);
                            }
                              catch (Exception $e)
                           {
                               die('Erreur: '.$e->getMessage());
                           }
                       }
                       
                       
          
                       /* **************************** */

                       
                       function modifierblog($blog, $idblog){
			
                        echo 'test modif C' ;
                          $db = config::getConnexion();
                          $query = $db->prepare(
                            'UPDATE blog SET                     
                              nom = :nom, 
                              titre = :titre, 
                                          sujet = :sujet, 
                                          image= :image  	
                            WHERE idblog = :idblog '
                          );
                          $query->bindValue('nom' , $blog->getnom()) ;
                          $query->bindValue('titre' , $blog->gettitre());
                          $query->bindValue('sujet' , $blog->getsujet());
                          $query->bindValue('image' , $blog->getimage());
                          $query->bindValue('idblog' , $idblog);
                          try {
                          $query->execute();
                          echo "test" ;
                          echo $query->rowCount() . " records UPDATED successfully <br>";
                        } catch (PDOException $e) {
                          echo $e->getMessage();
                        }
                      }

                        function recupererblog($idblog){
                          $sql="SELECT * from blog where idblog=$idblog";
                          $db = config::getConnexion();
                          try{
                              $query=$db->prepare($sql);
                              $query->execute();
                  
                              $blog=$query->fetch();
                              return $blog;
                          }
                          catch (Exception $e){
                              die('Erreur: '.$e->getMessage());
                          }
                      }
                    




                     /*  **************************** */
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