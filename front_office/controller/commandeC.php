<?php    
	include "../config.php";
	require_once '../Model/commande.php';

	class commandeC {
		
		function ajoutercommande($commande){
			$sql="INSERT INTO commande ( product_client , client_name , email , adresse , phone) 
			VALUES (:product_name , :client_name , :email , :adresse , :phone)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			 
				$query->execute([
					'product_name' => $commande->getproduct_name(),
					'client_name' => $commande->getclient_name(),
					'email' => $commande->getemail(),
                    'adresse' => $commande->getadresse(),
                    'phone' => $commande->getphone(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
    }
    ?>