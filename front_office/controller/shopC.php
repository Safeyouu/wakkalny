<?PHP
	include "../config.php";
	require_once '../Model/shopC.php';

	class shopC {
		
		function ajoutershop($shop){
			$sql="INSERT INTO shop (nom,description,nb_stock,nbr_like,nbr_commentaire) 
			VALUES (:nom,:description,:image,:nb_stock,:nbr_like,:nbr_commentaire)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql); //pour preparer la requete
			
				$query->execute([
					'nom' => $shop->getnom(),
					'description' => $shop->getdescription(),
					'nb_stock' => $shop->getnb_stock(),
                    'nbr_like' => $shop->getnbr_like(),
                    'nbr_commentaire' => $shop->getnbr_commentaire(),

			
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
            //$e:on peut avour des erreurs 	au niveau de la base de données (table ou colomne n'existe pas)		
		}
		
		function affichershop(){
			
			$sql="SELECT * FROM shop";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimershop($id){
			$sql="DELETE FROM shop WHERE idshop= :id";
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
		function modifiershop($shop, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE Album SET
                        id = : id,  
						description = :description, 
                        nb_stock = :nb_stock, 
                        nbr_like= :nbr_like, 
						nbr_commentaire = :nbr_commentaire,
						
					WHERE idshop = :id'
				);
				$query->execute([
					'nom' => $shop->getnom(),
					'description' => $shop->getdescription(),
					'nb_stock' => $shop->getnb_stock(),
                    'nbr_like' => $shop->getnbr_like(),
                    'nbr_commentaire' => $shop->getnbr_commentaire(),
                    'id' => $id

				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperershop($id){
			$sql="SELECT * from shop where idshop=$id";    
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

		function recuperershop1($id){
			$sql="SELECT * from shop where idshop=$id";
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
