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

                       
                        function modifierblog($blog,$idblog){
                            $sql="UPDATE blog SET  nom=:nom,titre=:titre,sujet=:sujet,image=:image WHERE idbblog=:idblog";
                            
                            $db = config::getConnexion();
                            try{		
                            $query=$db->prepare($sql);
                            $nom=$blog->getnom();
                            $titre=$blog->gettitre();
                            $sujet=$blog->getsujet();
                            $image=$blog->getimage();
                            $datas = array( 
                                ':idbblog'=>$idblog,
                                ':nom'=>$nom,
                                ':titre'=>$titre,
                                 ':sujet'=>$sujet,
                                 ':image'=>$image);
                            $query->bindValue(':idblog',$idblog);
                            $query->bindValue(':nom',$nom);
                            $query->bindValue(':titre',$titre);
                            $query->bindValue(':sujet',$sujet);
                            $query->bindValue(':image',$image);
                            
                            
                                $s=$query->execute();
                            }
                            catch (Exception $e){
                                echo " Erreur ! ".$e->getMessage();
                       echo " Les datas : " ;
                      print_r($datas);
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
                    
  }
?>