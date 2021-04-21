<?php
include '../model/commande.php';
include '../controller/commandeC.php';
$error = "";

$commande1 = null;

$commandec = new commandeC();

if(isset($_POST["product_name"])&&
    isset($_POST["client_name"])&&
    isset($_POST["email"])&&
    isset($_POST["adresse"])&&
    isset($_POST["phone"])
    )
    {
        if(!empty($_POST["product_name"])&&
            !empty($_POST["client_name"])&&
            !empty($_POST["email"])&&
            !empty($_POST["adresse"])&&
            !empty($_POST["phone"])
            ){
        $commande1 = new commande(
            $_POST["product_name"],
            $_POST["client_name"],
            $_POST["email"],
            $_POST["adresse"],
            $_POST["phone"]
        );
        $commandec->ajoutercommande($commande1);
        header('Location:showcommande.php');
    }
    else{
        $error= "missing info";
    }
}
?>
 <html>   
    