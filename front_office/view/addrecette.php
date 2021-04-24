<?php
include '../model/recette.php';
include '../controller/recetteC.php';


$error = "";

$recette1 = null;

$recettec = new recetteC();

if(
    isset($_POST["titre"])&&
    isset($_POST["prept"])&&
    isset($_POST["cookingt"])&&
    isset($_POST["difficulty"])&&
    isset($_POST["nb_ppl"])&&
    isset($_POST["category"])&&
    isset($_POST["description"])&&
    isset($_POST["photo"])
    )
    {
        if(!empty($_POST["titre"])&&
            !empty($_POST["prept"])&&
            !empty($_POST["cookingt"])&&
            !empty($_POST["difficulty"])&&
            !empty($_POST["nb_ppl"])&& 
            !empty($_POST["category"])&&
            !empty($_POST["description"])&&
            !empty($_POST["photo"])
            ){
        $recette1 = new recette(
            $_POST["titre"],
            $_POST["prept"],
            $_POST["cookingt"],
            $_POST["difficulty"],
            $_POST["nb_ppl"],
            $_POST["category"],
            $_POST["description"],
            $_POST["photo"]
        );
        $recettec->ajouterrecette($recette1);
        header('Location:recipes.html');
    }}
    else{
        $error= "missing info";
      
    }

?>
 <html>   
     