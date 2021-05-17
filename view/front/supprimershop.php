<?PHP
	include "../../controller/shopC.php";

	$shopC=new shopC();
	
	if (isset($_POST["id"])){
		$shopC->supprimershop($_POST["id"]);
		header('Location:shop.php');
	}

?>