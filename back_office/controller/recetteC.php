<?php

    include "../../config.php";
	require_once '../../model/recette.php';

    class recetteC 
    {

        function ajouterrecette($recette){
			$sql="INSERT INTO recette (titre , prept , cookingt , difficulty , nb_ppl , category , description , photo) 
			VALUES (:titre , :prept, :cookingt , :difficulty , :nb_ppl , :category , :description , :photo)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'titre' => $recette->gettitre(),
                    'prept' => $recette->getprept(),
                    'cookingt' => $recette->getcookingt(),
                    'difficulty' => $recette->getdifficulty(),
                    'nb_ppl' => $recette->getnb_ppl(),
                    'category' => $recette->getcategory(),
                    'description' => $recette->getdescription(),
                    'photo' => $recette->getphoto(),

						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function afficherrecette(){
			
			$sql="SELECT * FROM recette";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
    
		function supprimerrecette($idrecette){
			try {
				$pdo = config::getConnexion();
				$query = $pdo->prepare(
					'DELETE FROM recette WHERE idrecette = :idrecette'
				);
				$query->execute([
					'idrecette' => $idrecette
				]);
			} catch (Exception $e) {
				die('Erreur: '.$e->getMessage());
			}
		}



		function modifierrecette($recette,$idrecette){
			$sql="UPDATE recette SET  titre=:titre,prept=:prept,cookingt=:cookingt,difficulty=:difficulty,nb_ppl=:nb_ppl,category=:category,description=:description,photo=:photo WHERE idrecette=:idrecette";
			
			$db = config::getConnexion();
			
	try{		
			$query=$db->prepare($sql);
			$titre=$recette->gettitre();
			$prept=$recette->getprept();
			$cookingt=$recette->getcookingt();
			$difficulty=$recette->getdifficulty();
			$nb_ppl=$recette->getnb_ppl();
			$category=$recette->getcategory();
			$description=$recette->getdescription();
			$photo=$recette->getphoto();
			
			$datas = array( 
				':idrecette'=>$idrecette,
				 ':titre'=>$titre,
				 ':prept'=>$prept,
				 ':cookingt'=>$cookingt,
				 ':difficulty'=>$difficulty,
				 ':nb_ppl'=>$nb_ppl,
				 ':category'=>$category,
				 ':description'=>$description,
				 ':photo'=>$photo
				);

			$query->bindValue(':idrecette',$idrecette);
			$query->bindValue(':titre',$titre);
			$query->bindValue(':prept',$prept);
			$query->bindValue(':cookingt',$cookingt);
			$query->bindValue(':difficulty',$difficulty);
			$query->bindValue(':nb_ppl',$nb_ppl);
			$query->bindValue(':category',$category);
			$query->bindValue(':description',$description);
			$query->bindValue(':photo',$photo);


        	$s=$query->execute();
				
			  
			}
			catch (Exception $e){
				echo " Erreur ! ".$e->getMessage();
	   echo " Les datas : " ;
	  print_r($datas);
			}
			
		}
	
		function recuperrecette($idrecette){
			$sql="SELECT * from recette where idrecette=$idrecette";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$recette=$query->fetch();
				return $recette;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


		public function getUserbyname($titre) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM recette WHERE titre = :titre'
                );
                $query->execute([
                    'titre' => $titre
                ]);
                return $query->fetch();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }


		function checkname($titre)
        {
            $sql = "SELECT * FROM recette WHERE titre=:titre LIMIT 1";
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute(['titre' => $titre]);
            if($query->rowCount()){
                return false;
            }
            else 
            {
                return true;
            }
        }

		 function trie_titre(){
			$sql="SELECT * FROM recette order by titre ASC ";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}


		function trie_category(){
			$sql="SELECT * FROM recette order by category ASC ";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		
    }

?>