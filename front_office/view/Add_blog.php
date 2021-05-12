
<?php
session_start();

include '../model/blog.php';
include '../controller/blogC.php';
$error = "";

$blog1 = null;

$blogc = new blogC();


$user=$blogc->getUserbyname($_SESSION['username']);

$nom = $user['nom'];

if(isset($nom)&&
    isset($_POST["titre"])&&
    isset($_POST["sujet"])&&
    isset($_POST["image"])
    )
    {
        if(!empty($nom)&&
            !empty($_POST["titre"])&&
            !empty($_POST["sujet"])&&
            !empty($_POST["image"])
            ){
        $blog1 = new blog(
            $nom,
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
                            <li class="current-menu-item"><a href="Add_blog.php" title="Add blog">Add blog</a></li>

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
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
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
                    <li><a href="blog.php" title="Blog">blog</a></li>
                    <li>Submit a blog</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new blog</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_blog container">
						<form  name="myForm" method="POST" action="" >
 
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="full"><input type="text"  id="nom" name="nom" value="<?php echo $user['nom'];?>" disabled/></div>
								</div>
								<div class="f-row">
									<div class="third"><input type="text" placeholder="titre" id="titre" name="titre" /></div>
								</div>
								
							</section>
							
							<section>
								<h2>Description</h2>
								<div class="f-row">
									<div class="full"><textarea placeholder="sujet" id="sujet" name="sujet"></textarea></div>
								</div>
							</section>	
							
							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" id="image" name="image" />
								</div>
							</section>	
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitblog" value="Publish this blog" />
							</div>
						</form>
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

