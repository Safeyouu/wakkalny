<?php

    include "../config.php";
	require_once '../model/recette.php';

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

		 function getrecettebyname($idrecette) {            
			$sql = "SELECT * from recette where idrecette=:idrecette"; 
			$db = config::getConnexion();
			try {
				$query = $db->prepare($sql);
				$query->execute([
					'idrecette' => $recette->getidrecette(),
				]); 
				$result = $query->fetchAll(); 
				return $result;
			}
			catch (Exception $e) {
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
    

	function modifierrecette($recette, $idrecette){
			
		echo 'test modif C' ;
		  $db = config::getConnexion();
		  $query = $db->prepare(
			'UPDATE recette SET                     
			
			 titre=:titre,
			 prept=:prept,
		     cookingt=:cookingt,
			difficulty=:difficulty,
			nb_ppl=:nb_ppl,
			category=:category,
			description=:description,
			photo=:photo 	
			WHERE idrecette = :idrecette '
		  );
	
		  
	
			$query->bindValue('titre',$recette->gettitre());
			$query->bindValue('prept',$recette->getprept());
			$query->bindValue('cookingt',$recette->getcookingt());
			$query->bindValue('difficulty',$recette->getdifficulty());
			$query->bindValue('nb_ppl',$recette->getnb_ppl());
			$query->bindValue('category',$recette->getcategory());
			$query->bindValue('description',$recette->getdescription());
			$query->bindValue('photo',$recette->getphoto());
			
			$query->bindValue('idrecette',$idrecette);

		  try {
		  $query->execute();
		  echo "test" ;
		  echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
		  echo $e->getMessage();
		}
	  }


	}
?>