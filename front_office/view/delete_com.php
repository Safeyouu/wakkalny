<?PHP
	include "../controller/commentaireC.php";

	$commentaireC = new commentaireC();

	
	if (isset($_POST["idcom"])){
		$commentaireC->supprimercommentaire($_POST["idcom"]);
		header('Location:blog.php');
	}

    
    ?>