<?php

    include_once "../../config.php";
	require_once '../../model/ingrediant.php';

    class ingrediantC
    {

        function ajouteringrediants($ingrediant){
			$sql="INSERT INTO ingrediants (nom, quantite,user ) 
			VALUES (:nom , :quantite ,:user )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'nom' => $ingrediant->getnom(),
					'quantite' => $ingrediant->getquantite(),
					'user' => $ingrediant->getuser()


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


		function modifieringrediant($ingrediant, $id){
			
			echo 'test modif C' ;
			  $db = config::getConnexion();
			  $query = $db->prepare(
				'UPDATE ingrediants SET                     
				
				 nom=:nom,
				 
				quantite=:quantite 	
				WHERE id = :id '
			  );
		
			  
		
				$query->bindValue('nom',$ingrediant->getnom());
				
				$query->bindValue('quantite',$ingrediant->getquantite());
				
				$query->bindValue('id',$id);
	
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