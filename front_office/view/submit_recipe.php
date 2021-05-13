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
		if(!$recettec->checkname($_POST['titre']))
			{
				echo ' <p> . the title <p style="color: red;">' . $_POST['titre'] . ' </p>  already exists. Please try a new one . </p>';
			}
else {
        $recettec->ajouterrecette($recette1);
        header('Location:recipes.php');
	}
    }}
    else{
        $error= "missing info";
      
    }

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
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li"><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
						<ul>
							<li><a href="blog_single.php" title="Blog post">Blog post</a></li>
						</ul>
					</li>
					<li><a href="#" title="Pages"><span>Pages</span></a>
						<ul>
							<li><a href="login.php" title="Login page">Login page</a></li><li><a href="register.php" title="Register page">Register page</a></li>
						</ul>
					</li>
					
					<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.php" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.php" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark current-menu-item"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
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
					<li><a href="submit_ingrediant.php" >submit an ingrediant</a></li>
					<li>Submit a recipe</li>
					
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new recipe</h1>
				</header>
				<form method="POST" action="">
				<!--content-->
				<section class="content full-width">
					
					<div class="submit_recipe container">
						
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="full"><input type="text"   placeholder="Recipe title" id="titre" name="titre" required /></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text" placeholder="Preparation time"  name="prept" id="prept" required /></div>
									<div class="third"><input type="text"  placeholder="Cooking time" id="cookingt" name="cookingt" required  /></div>
									<div class="third"><input type="text"  placeholder="Difficulty" id="difficulty"  name="difficulty" required /></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text"  placeholder="Serves how many people?" id="nb_ppl" name="nb_ppl" required  /></div>
									<div class="third"><input type="text"  placeholder="category" id="category" name="category" required  /></div>
								
									
								</div>
							</section>
							
							<section>
								<h2>Description</h2>
								<div class="f-row">
									<div class="full"><textarea  placeholder="Recipe title"  id="description" name="description" required  ></textarea></div>
								</div>
							</section>	
							
						
							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" name="photo" id="photo" required  />
								</div>
							</section>	
							 
							
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Publish this recipe" />
							</div>
						
					</div>
				
				</section>
				<!--//content-->
			</form>
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


