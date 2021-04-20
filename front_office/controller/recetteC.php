<?php

    include "../config.php";
	require_once '../model/recette.php';

    class recetteC 
    {

        function ajouterrecette($recette){
			$sql="INSERT INTO recette ( titre , prept , cookingt , difficulty , nb_ppl , category , description , photo) 
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





    }

?>