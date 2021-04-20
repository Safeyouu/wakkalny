<?php
include '../model/blog.php';
include '../controller/blogC.php';
$error = "";

$blog1 = null;

$blogc = new blogC();

if(isset($_POST["nom"])&&
    isset($_POST["titre"])&&
    isset($_POST["sujet"])&&
    isset($_POST["image"])
    )
    {
        if(!empty($_POST["nom"])&&
            !empty($_POST["titre"])&&
            !empty($_POST["sujet"])&&
            !empty($_POST["image"])
            ){
        $blog1 = new blog(
            $_POST["nom"],
            $_POST["titre"],
            $_POST["sujet"],
            $_POST["image"]
        );
        $blogc->ajouterblog($blog1);
        header('Location:blog.php');
    }
    else{
        $error= "missing info";
    }
}
?>