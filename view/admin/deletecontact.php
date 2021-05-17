<?PHP
	include "../../controller/contactC.php";

	$contact = new contactC();

	
	if (isset($_POST["id"])){
		$contact->deleteContact($_POST["id"]);
		header('Location:Contact.php');
	}

?>