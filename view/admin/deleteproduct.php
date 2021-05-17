<?PHP
	include "../../controller/shopC.php";

	$shop = new shopC();

	
	if (isset($_POST["id"])){
		$shop->deleteprod($_POST["id"]);
		header('Location:Products.php');
	}

?>