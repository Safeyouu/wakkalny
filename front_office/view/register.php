<?php
session_start();

include '../model/user.php';
include '../controller/userC.php';


$error = "";

$user1 = null;

$userc = new userC();



if(isset($_POST["register"]))
    {
        
        if(!empty($_POST["username"])&&
            !empty($_POST["nom"])&&
            !empty($_POST["prenom"])&&
			!empty($_POST["adresse"])&&
            !empty($_POST["tel"])&&
            !empty($_POST["email"])&&
            !empty($_POST["mdp"])&&
			!empty($_POST["image"]))
			{
                $user1 = new user(
				$userc->sanitizeString($_POST["username"]),
				$userc->sanitizeString($_POST["nom"]),
				$_POST["prenom"],
				$userc->sanitizeString($_POST["adresse"]),
				$_POST["tel"],
				$userc->sanitizeString($_POST["email"]),
				$_POST["mdp"],
				$_POST["image"],
			);



			
			
			 if(!$userc->checkusername($_POST['username']))
			{
				$error= ' <h2>  the Username (' . $_POST['username'] . ') already exists. Please try a new one . </h2>';
			}
			else if(!$userc->checkname($_POST['nom']))
			{
				$error= ' <h2>  Your First Name should have only LETTERS </h2>';
			}
			else if(!$userc->checkname($_POST['prenom']))
			{
				$error= ' <h2>  Your Last Name should have only LETTERS </h2>';
			}
			else if(!$userc->checkemail($_POST['email']))
			{
				$error= ' <h2>  The Email (' . $_POST['email'] . ') already exists. Please try a new one . </h2> ';
			}
			else if(!$userc->checkpass($_POST['mdp']))
			{
				$error= ' <h2>  should be at least 4 characters in length and should include at least one upper case letter, one number, and one special character.</h2> ';
			}
			else
			{
        
				$userc->addUser($user1);
				$_SESSION['id']=$_POST['id'];
				$_SESSION['username']=$_POST['username'];
				$_SESSION['nom']=$_POST['nom'];
				$_SESSION['prenom']=$_POST['prenom'];
				$_SESSION['adresse']=$_POST['adresse'];
				$_SESSION['tel']=$_POST['tel'];
				$_SESSION['email']=$_POST['email'];
				$_SESSION['role']=$_POST['role'];
				$_SESSION['image']=$_POST['image'];

				header('Location:index.php');

			}

			
		}
		else{
			$error= "Fill in the blanks ";
		}
	
		
	}


	
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Wakkalny</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/icons.css" />
<link rel="stylesheet" href="cssR/style1.css"/>
<link rel="shortcut icon" href="images/favicon.ico" />
<script src="js1/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

		
</head>
 
<body style="background-image: url(images/bgr/aa.jpg); background-repeat: no-repeat; background-size: cover ">
<!--header-->
<header class="head" role="banner">
		<!--wrap-->
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
						
					</li>
						
					</li>
					<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.php" title="Shop"><span>Shop</span></a></li>
					
				</ul>
				
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.php" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
		<div class="header">
			<h2>Register</h2>
		</div>

		<div id="section_lading">
					
				
				 
				
				
		<form method="post" action="register.php">
			
			<div class="input-group">
			<i style="color: red;"><?php echo $error;?></i>
				<label>Username</label>
				<input type="text" name="username" placeholder="Your Username" >
			</div>
			<div class="input-group">
				<label>First name</label>
				<input type="text" name="nom"  placeholder="Your First name" >
			</div>
			<div class="input-group">
				<label>Last name</label>
				<input type="text" name="prenom"  placeholder="Your Last name" >
			</div>
			<div class="input-group">
				<label>Adress</label>
				<input type="text" name="adresse" placeholder="Your Adress" >
			</div>
			<div class="input-group">
				<label>Phone number</label>
				<input type="tel" name="tel" placeholder="Your phone number" pattern="[2-9]{2}[0-9]{3}[0-9]{3}" maxlength="8" >
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email"  placeholder="Your email" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="mdp"  placeholder="Your password" >
			</div>
			<section>
					<h42>Photo</h4>
					<div class="f-row full">
						<input type="file" name="image" />
					</div>
			</section>
			
			<div class="input-group">
				<button type="submit" class="btn" name="register">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
			</div>

			
	</body>

</html>