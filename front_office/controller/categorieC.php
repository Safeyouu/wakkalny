<?PHP
	include_once "../config.php";
	require_once '../Model/categorie.php';

	class categorieC {
		
		function ajoutercategorie($categorie){
			$sql="INSERT INTO categorie (nom) 
			VALUES (:nom)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql); //pour preparer la requete
				$query->bindValue('nom', $categorie->getnom());
				$query->execute();			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
            //$e:on peut avour des erreurs 	au niveau de la base de données (table ou colomne n'existe pas)		
		}
		
		function affichercategorie(){
			
			$sql="SELECT * FROM categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimercategorie($id){
			$sql="DELETE FROM categorie WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiercategorie($categorie, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE shop SET
                        id = :id,  
						nom = :nom, 
                        
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $categorie->getnom(),
					
                    'id' => $id

				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperercategorie($id){
			$sql="SELECT * from categorie where id=$id";    
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

		function recuperercategorie1($id){
			$sql="SELECT * from categorie where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>
