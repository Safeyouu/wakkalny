<?PHP
	include "../../controller/blogC.php";

	$blogC = new blogC();

	
	if (isset($_POST["idblog"])){
		$blogC->supprimerblog($_POST["idblog"]);
		header('Location:blog.php');
	}

?>