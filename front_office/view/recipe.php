<?php
session_start();
include "../controller/recetteC.php";
include "../controller/ingrediantC.php";

$recettec= new recetteC();


//$id = $_GET['idrecette'];
$id = isset($_GET['idrecette']) ? $_GET['idrecette'] : '';
    
        $pdo=config::getConnexion();
        $query= $pdo ->prepare("select * from recette where idrecette= '$id'");
        $query->execute();
         $result = $query->fetchAll();
		 
$ingrediantc=new ingrediantC();
 $listingrediant= $ingrediantc->afficheringrediants();
		 

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
<body class="recipePage">
	<!--preloader-->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!--//preloader-->
	<?php  
if(isset($_SESSION['username']))  
{

	$user=$recettec->getUserbyname($_SESSION['username']);
	
	?>
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		<nav class="main-nav" role="navigation" id="menu">
			<li>
				<li style="color:black; font-size:15px;text-transform: lowercase" >
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
					<li class="current-menu-item"><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
					</li>
					
					
					<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.php" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
				<li class="light "><a href="submit_ingrediant.php" title="Submit an ingrediant"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit an ingrediant</span></a></li>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
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
					<li><a href="#" title="Recipes">Recipes</a></li>
					<li>Recipe</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<?php

				foreach ($result as $recette) {

					
				

					
			?>
			<div class="row">
				<header class="s-title">
					<h1> <?php echo $recette ['titre']; ?></h1>
				</header>
				<!--content-->
				<section class="content three-fourth">

					<!--recipe-->
				
					<div class="recipe">
							<div class="row">
								<!--two-third-->
								<article class="two-third">

									<div class="photo"><a href="#"><img src=" images/<?php echo $recette ['photo']; ?> "Style="height:500px; width:800px;"/></a></div>
									<div class="intro"><p><strong><?php echo $recette ['description']; ?></p></div>
									
								</article>
								<!--//two-third-->
								
								<!--one-third-->
								<article class="one-third">
									<dl class="basic">
										<dt>Preparation time</dt>
										<dd> <?php echo $recette ['prept']; ?></dd>
										<dt>Cooking time</dt>
										<dd> <?php echo $recette ['cookingt']; ?></dd>
										<dt>Difficulty</dt>
										<dd> <?php echo $recette ['difficulty']; ?></dd>
										<dt>Serves</dt>
										<dd> <?php echo $recette ['nb_ppl']; ?></dd>
									</dl>
									
									<dl class="user">
										<dt>Category</dt>
										<dd> <?php echo $recette ['category']; ?></dd>
										
									</dl>

        <?php 
		foreach ($listingrediant as $ingrediants)
		 {
			if($user['id'] != $recette['user'])
			{

			 ?>
									<dl class="ingredients">
										<dt><?php echo $ingrediants ['nom']; ?></dt>
										<dd><?php echo $ingrediants ['quantite']; ?></dd>
										
										<?php
						}
						else
						{
							?>
										<dl class="ingredients">
										<dt><?php echo $ingrediants ['nom']; ?></dt>
										<dd><?php echo $ingrediants ['quantite']; ?></dd>
										<form method="POST" action="deleteingrediant.php">
										<input type="submit" name="supprimer" value="supprimer">
										<input type="hidden" value="<?PHP echo $ingrediants ['id']; ?>" name="id">
										<a href="modifieringrediant.php?id=<?php echo $ingrediants['id'];?>">Modifier</a>
										</form>
							<?php
						}
						?>
									</dl>
									<?php } ?>
							<div class="actions">
								<div>
								<?php
						if($user['id'] != $recette['user'])
						{

						?>
								<div class="third bwrap">
								
									</div>
									<?php
						}
						
							?>
						
								</div>
							</div>
						</div>		
								</article>
								<!--//one-third-->
							</div>
						</div>
						<?php } ?>
						<!--//recipe-->
							
						
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	<?php
	}
					else
					{
				?>



<!--header-->
<header class="head" role="banner">
		<!--wrap-->
		<nav class="main-nav" role="navigation" id="menu">
			<li>
				<li  
					style=" font-size:10px;text-transform: lowercase; text-color:white;"> <a href="login.php" id="login"><span class="" ><button  style="padding: 10px 10px; text-align: center; font-size:10px;">Login</button></span></a> 
				</li>
				<li  
					style=" font-size:10px;text-transform: lowercase; text-color:white;"> <a href="register.php" id="register"><span class="" ><button  style="padding: 10px 10px; text-align: center; font-size:10px;">Sign up</button></span></a> 
				</li>
			</li>
		</nav>
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li><a href="index.php" title="Home"><span>Home</span></a></li>
					<li class="current-menu-item"><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
					</li>
					
					
					<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.php" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			
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
					<li><a href="#" title="Recipes">Recipes</a></li>
					<li><a href="recipes.php" title="Cocktails">Deserts</a></li>
					<li>Recipe</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<?php

foreach ($result as $recette) { ?>
			<div class="row">
				<header class="s-title">
					<h1> <?php echo $recette ['titre']; ?></h1>
				</header>
				<!--content-->
				<section class="content three-fourth">

					<!--recipe-->
				
					<div class="recipe">
							<div class="row">
								<!--two-third-->
								<article class="two-third">

									<div class="photo"><a href="#"><img src=" images/<?php echo $recette ['photo']; ?>"  /></a></div>
									<div class="intro"><p><strong><?php echo $recette ['description']; ?></p></div>
									
								</article>
								<!--//two-third-->
								
								<!--one-third-->
								<article class="one-third">
									<dl class="basic">
										<dt>Preparation time</dt>
										<dd> <?php echo $recette ['prept']; ?></dd>
										<dt>Cooking time</dt>
										<dd> <?php echo $recette ['cookingt']; ?></dd>
										<dt>Difficulty</dt>
										<dd> <?php echo $recette ['difficulty']; ?></dd>
										<dt>Serves</dt>
										<dd> <?php echo $recette ['nb_ppl']; ?></dd>
									</dl>
									
									<dl class="user">
										<dt>Category</dt>
										<dd> <?php echo $recette ['category']; ?></dd>
										
									</dl>

        <?php foreach ($listingrediant as $ingrediants) { ?>
									<dl class="ingredients">
										<dt><?php echo $ingrediants ['nom']; ?></dt>
										<dd><?php echo $ingrediants ['quantite']; ?></dd>
					
	
									</dl>
									<?php } ?>
							<div class="actions">
								<div>
								
									
								</div>
							</div>
						</div>


									
								</article>
								<!--//one-third-->
							</div>
						</div>
						<?php } ?>
						<!--//recipe-->
							
						
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	<?php
					}
					?>
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


