<?php
include '../model/user.php';
include '../controller/userC.php';
$error = "";

$user1 = null;

$userc = new userC();

if(isset($_POST["nom"])&&
    isset($_POST["prenom"])&&
    isset($_POST["email"])&&
    isset($_POST["mdp"])&&
    isset($_POST["tel"])&&
    isset($_POST["adresse"])&&
    isset($_POST["role"])
    )
    {
        if(!empty($_POST["nom"])&&
            !empty($_POST["prenom"])&&
            !empty($_POST["email"])&&
            !empty($_POST["mdp"])&&
            !empty($_POST["tel"])&&
            !empty($_POST["adresse"])&&
            !empty($_POST["role"])
            ){
        $user1 = new user(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["email"],
            $_POST["mdp"],
            $_POST["tel"],
            $_POST["adresse"],
            $_POST["role"],
        );
        $albumc->adduser($user1);
        header('Location:showuser.php');
    }
    else{
        $error= "missing info";
    }
}
?>
 <html>   
    