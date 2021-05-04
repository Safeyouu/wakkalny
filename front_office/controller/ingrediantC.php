<?php

    include_once "../config.php";
	require_once '../model/ingrediant.php';

    class ingrediantC
    {

        function ajouteringrediants($ingrediant){
			$sql="INSERT INTO ingrediants (nom, quantite ) 
			VALUES (:nom , :quantite )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'nom' => $ingrediant->getnom(),
					'quantite' => $ingrediant->getquantite()
                   

						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function afficheringrediants(){
			
			$sql="SELECT * FROM ingrediants";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
    
		function supprimeringrediant($id){
			try {
				$pdo = config::getConnexion();
				$query = $pdo->prepare(
					'DELETE FROM ingrediants WHERE id = :id'
				);
				$query->execute([
					'id' => $id
				]);
			} catch (Exception $e) {
				die('Erreur: '.$e->getMessage());
			}
		}

		function modifieringrediant($ingrediant,$id){
			$sql="UPDATE ingrediants SET  nom=:nom,quantite=:quantite WHERE id=:id";
			
			$db = config::getConnexion();
			
	try{		
			$query=$db->prepare($sql);
			$nom=$ingrediant->getnom();
			$quantite=$ingrediant->getquantite();
		
			$datas = array( 
				':id'=>$id,
				 ':nom'=>$nom,
				 ':quantite'=>$quantite);
			$query->bindValue(':id',$id);
			$query->bindValue(':nom',$nom);
			$query->bindValue(':quantite',$quantite);
		
			
			
				$s=$query->execute();
				
			   // header('Location: index.php');
			}
			catch (Exception $e){
				echo " Erreur ! ".$e->getMessage();
	   echo " Les datas : " ;
	  print_r($datas);
			}
			
		}
	
		function recupereringrediant($id){
			$sql="SELECT * from ingrediants where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$ingrediant=$query->fetch();
				return $ingrediant;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		public function getUserbyname($nom) {
            try {
                $pdo = config::getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM ingrediants WHERE nom = :nom'
                );
                $query->execute([
                    'nom' => $nom
                ]);
                return $query->fetch();
            } catch (Exception $e) {
                $e->getMessage();
            }
        }


    }

?>