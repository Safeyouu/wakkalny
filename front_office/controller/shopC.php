<?PHP
	include_once "../config.php";
	require_once '../Model/shop.php';

	class shopC {
		
		function ajoutershop($shop){
			$sql="INSERT INTO shop (nom,description,nb_stock,prix,image , idCategorie) 
			VALUES (:nom,:description,:nb_stock,:prix,:image , :idCategorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql); //pour preparer la requete
				$query->bindValue('nom', $shop->getnom());
				$query->bindValue('description',  $shop->getdescription());
				$query->bindValue('nb_stock',  $shop->getnb_stock());
				$query->bindValue('prix',  $shop->getprix());
				$query->bindValue('image',  $shop->getimage(),PDO::PARAM_LOB);
				$query->bindValue('idCategorie',  $shop->getidCategorie());
				$query->execute();			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
            //$e:on peut avour des erreurs 	au niveau de la base de données (table ou colomne n'existe pas)		
		}
		
		function affichershop(){

			$sql="SELECT id,nom,description,nb_stock,prix,image FROM shop";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function searchShopByCategorie($idCategorie){

			$sql="SELECT id,nom,description,nb_stock,prix,image FROM shop where idCategorie = ".$idCategorie;

			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}


		function getProductNumberPerCategories(){

			$sql="SELECT c.nom as nom , count(s.id) as qqt FROM shop s join categorie c on c.id = s.idCategorie group by c.id";

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
			$sql="DELETE FROM shop WHERE id= :id";
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
			
			echo 'test modif C' ;
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE shop SET                     
						nom = :nom, 
						description = :description, 
                        nb_stock = :nb_stock, 
                        image= :image  	
					WHERE id = :id '
				);
				$query->bindValue('nom' , $shop->getnom()) ;
				$query->bindValue('description' , $shop->getdescription());
				$query->bindValue('nb_stock' , $shop->getnb_stock());
				$query->bindValue('image' , $shop->getimage());
				$query->bindValue('id' , $id);
				try {
				$query->execute();
				echo "test" ;
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		function recuperershop($id){
			$sql="SELECT * from shop where id=$id";    
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$shop=$query->fetch();
				return $shop;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recuperershop1($id){
			$sql="SELECT * from shop where id=$id";
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
