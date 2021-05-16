<?php
session_start();
include '../model/recette.php';
include_once '../controller/recetteC.php';


$error = "";


$recetteC = new recetteC();
$user=$recetteC->getUserbyname($_SESSION['username']);



    if ( 
    isset($_POST["titre"])&&
    isset($_POST["prept"])&&
    isset($_POST["cookingt"])&&
    isset($_POST["difficulty"])&&
    isset($_POST["nb_ppl"])&&
    isset($_POST["category"])&&
    isset($_POST["description"])&&
    isset($_POST["photo"] )&&
	isset($_GET['idrecette'] )
	)
	{
        $recette1 = new recette(
           
            $_POST["titre"],
            $_POST["prept"],
            $_POST["cookingt"],
			$_POST["difficulty"],
			$_POST["nb_ppl"],
			$_POST["category"],
			$_POST["description"],
			$_POST["photo"],
			$_POST["user"]

        );
        $recetteC->modifierrecette($recette1, $_GET['idrecette']);   
             header('location: recipes.php ');
	}

    else
        $error= "missing info";
?>


   <!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="Wakkalny - Social Recipe HTML Template" />
		<meta name="description" content="Wakkalny - Social Recipe HTML Template">
		<meta name="author" content="themeenergy.com">
		
		<title>Wakkalny</title>
		
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/icons.css" />
		<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800" rel="stylesheet">
		<script src="../../../../use.fontawesome.com/e808bf9397.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico" />
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
	<!--preloader-->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!--//preloader-->
	
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		
		<nav class="main-nav" role="navigation" id="menu">
			<li>
				<li style="color:white; font-size:15px;text-transform: lowercase" >
					<img src="../../back_office/view/plugins/images/user.ico"  alt="" width="25" height="25" ><i></i><?php echo $_SESSION['username']; ?> 
				</li>
				<li  
					style=" font-size:10px;text-transform: lowercase; text-color:white;"> <a href="logout.php" id="logout"><span class="" ><button  style="padding: 10px 10px; text-align: center; font-size:10px;">Logout</button></span></a> 
				
				</li>
			</li>
		</nav>
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
						
					</li>
					
					
					<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.php" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark "><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
		
	<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<nav class="breadcrumbs">
				<ul>
					<li><a href="index.php" title="Home">Home</a></li>
					<li>Submit a recipe</li>
					
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
			
				</header>
               
				<section class="content full-width">
					
					<div class="submit_recipe container">
					<?php
			
			$recette1 = $recetteC->recuperrecette($_GET['idrecette']);
			
	?>
			<form name="myform" method="POST" >
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
								<div class="full"><input type="text" placeholder="titre" id="titre" name="titre" value="<?php echo $recette1['titre']; ?>" required /></div>
								</div>
								<div class="f-row">
									<div class="full"><input type="text" placeholder="Preparation time"  name="prept" id="prept"  value = "<?php echo $recette1['prept'];?>"required /></div>
									<div class="full"><input type="text"  placeholder="Cooking time" id="cookingt" name="cookingt"  value = "<?php echo $recette1['cookingt'];?>" required/></div>
									<div class="full"><input type="text"  placeholder="Difficulty" id="difficulty"  name="difficulty"  value = "<?php echo $recette1['difficulty'];?>" required/></div>
								</div>

								<div class="f-row">
									<div class="full"><input type="text"  placeholder="Serves how many people?" id="nb_ppl" name="nb_ppl"  value = "<?php echo $recette1['nb_ppl'];?>" required/></div>
									<div class="full"><input type="text"  placeholder="category" id="category" name="category"  value = "<?php echo $recette1['category'];?>"required  /></div>
									<div class="f-row">
									<div class="third"><input type="hidden" placeholder="user" id="user" name="user" value="<?php echo $user['id'];?>" /></div>
								</div>
							
									
								</div>
								
							</section>
							
							<section>
								<h2>Description</h2>
								<div class="f-row">
									<div class="full"><textarea  placeholder="Recipe title"  id="description" name="description"  value = "<?php echo $recette1['description'];?>" required ></textarea></div>
								</div>
							</section>	
							
							<section>
								
								<h2 for="image">Photo</h2>
								<div class="f-row full">
								<img src="images/<?php echo $recette1['photo'];?>" Style=  " display: block; margin-left: auto; margin-right: auto; width: 30%;" /> <br>	
									 <input type="file" id="photo" name="photo" value="<?php echo $recette1['photo']; ?>"required/>

								</div>
								
							</section>	
							 
							
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Publish this recipe" />
								</form>
							<form action="recipes.php">
								<input type="submit" class="button" id="submitRecipe" style="left:35px;" value="Cancel" />
								</form>
							</div>
							
					</div>
				
				</section>
				<!--//content-->
			
			
			
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	
<!--footer-->
<footer class="foot" role="contentinfo">
	<div class="wrap clearfix">
		<div class="row">
			<article class="one-half">
				<h5>About Wakkalny Community</h5>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
			</article>
			<article class="one-fourth">
				<h5>Need help?</h5>
				<p>Contact us via phone or email</p>
				<p><em>T:</em>  +116 52 717 009<br /><em>E:</em>  <a href="#">Wakkalny@gmail.com</a></p>
			</article>
			<article class="one-fourth">
				<h5>Follow us</h5>
				<ul class="social">
					<li><a href="https://www.facebook.com" title="facebook"><img src="images/ico/fb.png" alt="facebook logo"  /></a></li>
					<li><a href="https://www.youtube.com" title="youtube"><img src="images/ico/yo.png" alt="youtube logo"/></a></li>
					<li><a href="https://www.linkedin.com" title="linkedin"><img src="images/ico/li.png" alt="linkedin logo"/></a></li>
					<li><a href="https://www.twitter.com" title="twitter"><img src="images/ico/tw.png" alt="twitter logo"/></a></li>
					<li><a href="https://www.pinterest.com" title="pinterest"><img src="images/ico/pi.png" alt="pinterest logo"/></i></a></li>
					<li><a href="https://www.instagram.com" title="vimeo"><img src="images/ico/ig.png" alt="instagram logo"/></a></li>
				</ul>
			</article>
			
			<div class="bottom">
				
				
				<nav class="foot-nav">
					<ul>
						<li><a href="index.php" title="Home">Home</a></li>
						<li><a href="recipes.php" title="Recipes">Recipes</a></li>
						<li><a href="blog.php" title="Blog">Blog</a></li>
						<li><a href="contact.php" title="Contact">Contact</a></li>    
						<li><a href="find_recipe.php" title="Search for recipes">Search for recipes</a></li>
						<li><a href="login.php" title="Login">Login</a></li>	<li><a href="register.php" title="Register">Register</a></li>													
					</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>
<!--//footer-->

	
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>


