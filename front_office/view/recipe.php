<?php

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
	
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		<div class="wrap clearfix">
			<a href="index.html" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li><a href="index.html" title="Home"><span>Home</span></a></li>
					<li class="current-menu-item"><a href="recipes.html" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.html" title="Blog"><span>Blog</span></a>
						<ul>
							<li><a href="blog_single.html" title="Blog post">Blog post</a></li>
						</ul>
					</li>
					<li><a href="#" title="Pages"><span>Pages</span></a>
						<ul>
							<li><a href="login.html" title="Login page">Login page</a></li><li><a href="register.html" title="Register page">Register page</a></li>
						</ul>
					</li>
					
					<li><a href="contact.html" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.html" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.html" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="medium"><a href="my_profile.html" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark"><a href="submit_recipe.html" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
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
					<li><a href="index.html" title="Home">Home</a></li>
					<li><a href="#" title="Recipes">Recipes</a></li>
					<li><a href="recipes.html" title="Cocktails">Deserts</a></li>
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
					<form method="POST" action="deleteingrediant.php">
                    <input type="submit" name="supprimer" value="supprimer">
	                <input type="hidden" value="<?PHP echo $ingrediants ['id']; ?>" name="id">
					<a href="modifieringrediant.php?id=<?php echo $ingrediants['id'];?>">Modifier</a>

	
									</dl>
									<?php } ?>
							<div class="actions">
								<div>
								<div class="third bwrap">
								<a href="submit_ingrediant.php" class="button white more medium">add ingrediant<i class="fa fa-chevron-right"></i></a>
									</div>
									
								</div>
							</div>
						</div>


									
								</article>
								<!--//one-third-->
							</div>
						</div>
						<?php } ?>
						<!--//recipe-->
							
						<!--comments-->
						<div class="comments" id="comments">
							<h2>5 comments </h2>
							<ol class="comment-list">
								<!--comment-->
								<li class="comment depth-1">
									<div class="avatar"><a href="my_profile.html"><img src="images/avatar1.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<strong>Kimberly C.</strong> said 1 month ago <a href="#" class="comment-reply-link"> Reply</a>
										</div>
										<div class="comment-text">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
										</div>
									</div> 
								</li>
								<!--//comment-->
								
								<!--comment-->
								<li class="comment depth-1">
									<div class="avatar"><a href="my_profile.html"><img src="images/avatar2.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<strong>Alex J.</strong> said 1 month ago <a href="#" class="comment-reply-link"> Reply</a>
										</div>
										<div class="comment-text">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
										</div>
									</div> 
								</li>
								<!--//comment-->
								
								<!--comment-->
								<li class="comment depth-2">
									<div class="avatar"><a href="my_profile.html"><img src="images/avatar1.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<strong>Kimberly C.</strong> said 1 month ago <a href="#" class="comment-reply-link"> Reply</a>
										</div>
										<div class="comment-text">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
										</div>
									</div> 
								</li>
								<!--//comment-->
								
								<!--comment-->
								<li class="comment depth-3">
									<div class="avatar"><a href="my_profile.html"><img src="images/avatar2.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<strong>Alex J.</strong> said 1 month ago <a href="#" class="comment-reply-link"> Reply</a>
										</div>
										<div class="comment-text">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
										</div>
									</div> 
								</li>
								<!--//comment-->
								
								<!--comment-->
								<li class="comment depth-1">
									<div class="avatar"><a href="my_profile.html"><img src="images/avatar3.jpg" alt="" /></a></div>
									<div class="comment-box">
										<div class="comment-author meta"> 
											<strong>Denise M.</strong> said 1 month ago <a href="#" class="comment-reply-link"> Reply</a>
										</div>
										<div class="comment-text">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
										</div>
									</div> 
								</li>
								<!--//comment-->
							</ol>
						</div>
						<!--//comments-->
						
						<!--respond-->
						<div class="comment-respond" id="respond">
							<h2>Leave a reply</h2>
							<div class="container">
								<p><strong>Note:</strong> Comments on the web site reflect the views of their authors, and not necessarily the views of the socialchef internet portal. Requested to refrain from insults, swearing and vulgar expression. We reserve the right to delete any comment without notice explanations.</p>
								<p>Your email address will not be published. Required fields are signed with <span class="req">*</span></p>
								<form>
									<div class="f-row">
										<div class="third">
											<input type="text" placeholder="Your name" />
											<span class="req">*</span>
										</div>
										
										<div class="third">
											<input type="email" placeholder="Your email" />
											<span class="req">*</span>
										</div>
										
										<div class="third">
											<input type="text" placeholder="Your website" />
										</div>
									
									</div>
									<div class="f-row">
										<textarea></textarea>
									</div>
									
									<div class="f-row">
										<div class="third bwrap">
											<input type="submit" value="Submit comment" />
										</div>
									</div>
									
									<div class="bottom">
										<div class="f-row checkbox">
											<input type="checkbox" id="ch1" />
											<label for="ch1">Notify me of replies to my comment via e-mail</label>
										</div>
										<div class="f-row checkbox">
											<input type="checkbox" id="ch2" />
											<label for="ch2">Notify me of new articles by email.</label>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--//respond-->
				</section>
				<!--//content-->
				
					
					<div class="widget share">
						<ul class="boxed">
							<li class="light"><a href="#" title="Facebook"><i class="fa fa-facebook"></i> <span>Share on Facebook</span></a></li>
							<li class="medium"><a href="#" title="Twitter"><i class="fa fa-twitter"></i> <span>Share on Twitter</span></a></li>
							<li class="dark"><a href="#" title="Favourites"><i class="fa fa-heart"></i> <span>Add to Favourites</span></a></li>
						</ul>
					</div>
					
					<div class="widget members">
						<h3>Members who liked this recipe</h3>
						<ul class="boxed">
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar1.jpg" alt="" /><span>Kimberly C.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar2.jpg" alt="" /><span>Alex J.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar3.jpg" alt="" /><span>Denise M.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar9.jpg" alt="" /><span>Jason H.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar8.jpg" alt="" /><span>Jennifer W.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar4.jpg" alt="" /><span>Anabelle Q.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar7.jpg" alt="" /><span>Thomas M.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar5.jpg" alt="" /><span>Michelle S.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.html"><img src="images/avatar6.jpg" alt="" /><span>Bryan A.</span></a></div></li>
						</ul>
					</div>
				</aside>
				<!--//right sidebar-->
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
							<li><a href="index.html" title="Home">Home</a></li>
							<li><a href="recipes.html" title="Recipes">Recipes</a></li>
							<li><a href="blog.html" title="Blog">Blog</a></li>
							<li><a href="contact.html" title="Contact">Contact</a></li>    
							<li><a href="find_recipe.html" title="Search for recipes">Search for recipes</a></li>
							<li><a href="login.html" title="Login">Login</a></li>	<li><a href="register.html" title="Register">Register</a></li>													
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


