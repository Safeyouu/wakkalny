<?php
include '../model/user.php';
include '../controller/userC.php';
$error = "";

$user1 = null;

$userc = new userC();




if(isset($_POST["username"])&&
    isset($_POST["nom"])&&
    isset($_POST["prenom"])&&
    isset($_POST["email"])&&
    isset($_POST["mdp"])&&
    isset($_POST["mdp1"])&&
    isset($_POST["adresse"])&&
    isset($_POST["tel"])&&
   
    isset($_POST["image"])

    )
    {
        
        if(!empty($_POST["username"])&&
            !empty($_POST["nom"])&&
            !empty($_POST["prenom"])&&
            !empty($_POST["email"])&&
            !empty($_POST["mdp"])&&
            !empty($_POST["adresse"])&&
            !empty($_POST["tel"])&&
            !empty($_POST["image"])
            ){
                $user1 = new user(
            $_POST["username"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["email"],
            $_POST["mdp"],
            $_POST["adresse"],
            $_POST["tel"],
          
            $_POST["image"]
        );
        
        

        

        $userc->addUser($user1);
        header('Location:my_profile.php');
    }
    else{
        $error= "missing info";
    }
}
?>
    