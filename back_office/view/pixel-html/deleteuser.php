<?PHP
	include "../../controller/userC.php";

	$userc = new userC();

	
	if (isset($_POST["id"])){
		$userc->deleteUser($_POST["id"]);
		header('Location:Users.php');
	}

?>