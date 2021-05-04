<?PHP
	include "../controller/recetteC.php";

	$recettec = new recetteC();

	
	if (isset($_POST["idrecette"])){
		$recettec->supprimerrecette($_POST["idrecette"]);
		header('Location:recipes.php');
	}

?>