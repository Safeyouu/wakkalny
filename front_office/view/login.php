<?php
session_start();

include '../model/user.php';
include '../controller/userC.php';
$error = "";

$user1 = null;

$userc = new userC();





if(isset($_POST['login']))
    {
        
        if(!empty($_POST["username"])&&
            !empty($_POST["mdp"]))
			{
				
                $Logedin = $userc->Logedin(
					($_POST["username"]),
					($_POST["mdp"])
			);

			$username=$_POST["username"];
			$mdp=$_POST["mdp"];
        
			if($userc->checklogin($username,$mdp))
			{
				
			$_SESSION['id']=$_POST['id'];
			$_SESSION['username']=$_POST['username'];
			$_SESSION['nom']=$_POST['nom'];
			$_SESSION['prenom']=$_POST['prenom'];
			$_SESSION['adresse']=$_POST['adresse'];
			$_SESSION['tel']=$_POST['tel'];
			$_SESSION['email']=$_POST['email'];
			$_SESSION['role']=$_POST['role'];
				
					header('Location:index.php');

				
				
			}
			else
			{
				$error= "The username and / or password are incorrect";
			}


			
		}
		else{
			$error= "Wrong input";
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
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
					<li><a href="recipes.html" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.html" title="Blog"><span>Blog</span></a>
						<ul>
							<li><a href="blog_single.html" title="Blog post">Blog post</a></li>
						</ul>
					</li>
						
					</li>
					
					<li><a href="shop.html" title="Shop"><span>Shop</span></a></li>
					
				</ul>
				
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.html" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="dark"><a href="submit_recipe.html" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
	
	
	
	
			
		<div class="col-lg-12">
		
		<?php
		/*if(isset($message))
		{
			foreach($message as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
	
	*/
		?>   
			
			<body>
				<div class="header">
					<h2>Login Page</h2>
				</div>
				<form method="post" action="login.php">

					

					<div class="input-group">
					<i style="color: red;"><?php echo $error;?></i>

						<label>Username </label>
						<input type="text" name="username" placeholder="Enter username" required>
					</div>
					<div class="input-group">
						<label>Password</label>
						<input type="password" name="mdp" placeholder="Enter passowrd" required>
					</div>
					
					<div class="input-group">
						<button type="submit" class="btn" name="login" >Login</button>
					</div>
					<p>
					You don't have a account register here? <a href="register.php"><p class="text-info">Register Account</p></a>
					</p>
				</form>
			</body>
			
		</div>
		
	
			
	
				
	</body>
</html>