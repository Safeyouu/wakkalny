<?PHP
	include "../controller/ingrediantC.php";

	$ingrediantc = new ingrediantC();

	
	if (isset($_POST["id"])){
		$ingrediantc->supprimeringrediant($_POST["id"]);
		header('Location:recipe.php');
	}

?>