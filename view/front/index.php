<?php
session_start();

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from www.themeenergy.com/themes/html/social-chef/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 21:54:57 GMT -->
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
<body class="home">
	<!--preloader-->
	<div class="preloader">
		<div class="spinner"></div>
	</div>
	<!--//preloader-->
	<?php  
			if(!isset($_SESSION['username']))  
			{  
		?>
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li class="current-menu-item"><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.php" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.php" title="Blog"><span>Blog</span></a>
						
					</li>
						
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
		<!--intro-->
		<div class="intro">
			<figure class="bg"><img src="images/intro.jpg" alt="" /></figure>
			
			<!--wrap-->
			<div class="wrap clearfix">
				<!--row-->
				<div class="row">
					<article class="three-fourth text">
						<h1>Welcome to Wakkalny!</h1>
						<p>Wakkalny is the ultimate <strong>cooking social community</strong>, where recipes come to life. Wanna know what you will gain by joining us?</p>
						<p>You will win awesome prizes, make new friends and share delicious recipes. </p>
						<a href="register.php" class="button white more medium">Join our community <i class="fa fa-chevron-right"></i></a>
						<p>Already a member? Click <a href="login.php">here</a> to login.</p>
					</article>
					<?php
					}
					
					else
					{ 
						include "../../controller/userC.php";
						include_once "../../model/user.php";

						$userc = new userC();
						$user=$userc->getUserbyname($_SESSION['username']);
					?>
	<!--header-->
	<header class="head" role="banner">
		<!--wrap-->
		<nav class="main-nav" role="navigation" id="menu">
			<li>
				<li style="color:white; font-size:15px;text-transform: lowercase" >
					<img src="../admin/plugins/images/user.ico"  alt="" width="25" height="25" ><i></i><?php echo $_SESSION['username']; ?> 
				</li>
				<li  
					style=" font-size:10px;text-transform: lowercase; text-color:white;"> <a href="logout.php" id="logout"><span class="" ><button  style="padding: 10px 10px; text-align: center; font-size:10px;">Logout</button></span></a> 
				
				</li>
				<?php
				if($user['role'] == 1)
				{

				
				?>
				<li style=" font-size:10px;text-transform: lowercase; text-color:white;"> <a href="../admin" id="logout"><span class="" ><button  style="padding: 10px 10px; text-align: center; font-size:10px;">dachboard</button></span></a> 
				</li>
				<?php
					}
					?>
			</li>
		</nav>
		
		<div class="wrap clearfix">
			<a href="index.php" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li class="current-menu-item"><a href="index.php" title="Home"><span>Home</span></a></li>
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
					<form method="POST">
					<li class="medium"><a href="my_profile.php" title="My account" name="my_account" ><i class="icon icon-themeenergy_chef-hat"></i> <span >My account</span></a></li>
					<li class="dark"><a href="submit_recipe.php" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
					</form>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->
		<!--main-->
	<main class="main" role="main">
		<!--intro-->
		<div class="intro">
			<figure class="bg"><img src="images/intro.jpg" alt="" /></figure>
			
			<!--wrap-->
			<div class="wrap clearfix">
				<!--row-->
				<div class="row">
					<article class="three-fourth text">
						<h1>Welcome to Wakkalny!</h1>
						<p><strong style="color: #85b4d0;font-size:25px"><?php echo $_SESSION['username']; ?></strong> you are  now one of the <strong>cooking social community</strong>, we hope you have a great experience with us.</p>
						
					</article>
					<?php  
					}
					
					?>
					<!--search recipes widget-->
					<div class="one-fourth">
						<div class="widget container">
							<div class="textwrap">
								<h3>Search for recipes</h3>
								<p>All you need to do is enter an igredient, a dish or a keyword. </p>
								<p>You can also select a specific category from the dropdown.</p>
								<p>There’s sure to be something tempting for you to try.</p> 
								<p>Enjoy!</p>
							</div>
							<form action="http://www.themeenergy.com/themes/html/social-chef/find_recipe.php">
								<div class="f-row">
									<input type="text" placeholder="Enter your search term" />
								</div>
								<div class="f-row">
									<select>
										<option>or select a category</option>
										<option>Apetizers</option>
										<option>Cocktails</option>
										<option>Deserts</option>
										<option>Main courses</option>
										<option>Snacks</option>
										<option>Soups</option>
									</select>
								</div>
								<div class="f-row bwrap">
									<input type="submit" value="Start cooking!" />
								</div>
							</form>
						</div>
					</div>
					<!--//search recipes widget-->
				</div>
				<!--//row-->
			</div>
			<!--//wrap-->
		</div>
		<!--//intro-->
		
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<section class="content full-width">
					<div class="icons dynamic-numbers">
						
							<div class="cta">
								<!--<a href="login.php" class="button big">Join us!</a>-->
							</div>
						</div>
						<!--//row-->
					</div>
				</section>
				<!--//content-->
			
				<!--content-->
				<section class="content three-fourth">
					<!--cwrap-->
					<div class="cwrap">
						<!--entries-->
						<div class="entries row">
							<!--featured recipe-->
							<div class="featured two-third">
								<header class="s-title">
									<h2 class="ribbon">Recipe of the Day</h2>
								</header>
								<article class="entry">
									<figure>
										<img src="images/img2.jpg" alt="" />
										<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.php">Honey Cake</a></h2>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
										<div class="actions">
											<div>
												<a href="#" class="button">See the full recipe</a>
												<div class="more"><a href="recipes2.php">See past recipes of the day</a></div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!--//featured recipe-->
							
							<!--featured member-->
							<div class="featured one-third">
								<header class="s-title">
									<h2 class="ribbon star">Featured member</h2>
								</header>
								<article class="entry">
									<figure>
										<img src="images/avatar1.jpg" alt="" />
										<figcaption><a href="my_profile.php"><i class="icon icon-themeenergy_eye2"></i> <span>View member</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="my_profile.php">Kimberly C.</a></h2>
										<blockquote><i class="fa fa-quote-left"></i>Traditional dishes and fine bakery products accompanied by beautiful photographs to bend around and attract the tryout! Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</blockquote>
										<div class="actions">
											<div>
												<a href="#" class="button">Check out her recipes</a>
												<div class="more"><a href="#">See past featured members</a></div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!--//featured member-->
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<h2 class="ribbon bright">Latest recipes</h2>
						</header>
						
						<!--entries-->
						<div class="entries row">
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img6.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Thai fried rice with fruit and vegetables</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img5.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Spicy Morroccan prawns with cherry tomatoes</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img8.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Super easy blueberry cheesecake</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img7.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Refreshing banana split with a twist for adults</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img3.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Sushi mania: this is the best sushi you have ever tasted</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img4.jpg" alt="" />
									<figcaption><a href="recipe.php"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="recipe.php">Princess puffs - an old classic at its best</a></h2> 
									<div class="actions">
										<div>
											<div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
											<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="recipe.php#comments">27</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--item-->
							
							<div class="quicklinks">
								<a href="#" class="button">More recipes</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				
					<!--cwrap-->
					<div class="cwrap">
						<header class="s-title">
							<h2 class="ribbon bright">Latest articles</h2>
						</header>
						<!--entries-->
						<div class="entries row">
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img12.jpg" alt="" />
									<figcaption><a href="blog_single.php"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="blog_single.php">Barbeque party</a></h2> 
									<div class="actions">
										<div>
											<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.php#comments">27</a></div>
										</div>
									</div>
									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img11.jpg" alt="" />
									<figcaption><a href="blog_single.php"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="blog_single.php">How to make sushi</a></h2> 
									<div class="actions">
										<div>
											<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.php#comments">27</a></div>
										</div>
									</div>
									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
									</div>
								</div>
							</div>
							<!--item-->
							
							<!--item-->
							<div class="entry one-third">
								<figure>
									<img src="images/img10.jpg" alt="" />
									<figcaption><a href="blog_single.php"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
								</figure>
								<div class="container">
									<h2><a href="blog_single.php">Make your own bread</a></h2> 
									<div class="actions">
										<div>
											<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
											<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.php#comments">27</a></div>
										</div>
									</div>
									<div class="excerpt">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
									</div>
								</div> 	
							</div>
							<!--item-->
							
							<div class="quicklinks">
								<a href="#" class="button">More recipes</a>
								<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
							</div>
						</div>
						<!--//entries-->
					</div>
					<!--//cwrap-->
				</section>
				<!--//content-->
		
			
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Recipe Categories</h3>
						<ul class="boxed">
							<li class="light"><a href="recipes.php" title="Appetizers"><i class="icon icon-themeenergy_pasta"></i> <span>Apetizers</span></a></li>
							<li class="medium"><a href="recipes.php" title="Cocktails"><i class="icon icon-themeenergy_margarita2"></i> <span>Cocktails</span></a></li>
							<li class="dark"><a href="recipes.php" title="Deserts"><i class="icon icon-themeenergy_cupcake"></i> <span>Deserts</span></a></li>
							
							<li class="medium"><a href="recipes.php" title="Cocktails"><i class="icon icon-themeenergy_eggs"></i> <span>Eggs</span></a></li>
							<li class="dark"><a href="recipes.php" title="Equipment"><i class="icon icon-themeenergy_blender"></i> <span>Equipment</span></a></li>
							<li class="light"><a href="recipes.php" title="Events"><i class="icon icon-themeenergy_turkey"></i> <span>Events</span></a></li>
						
							<li class="dark"><a href="recipes.php" title="Fish"><i class="icon icon-themeenergy_fish2"></i> <span>Fish</span></a></li>
							<li class="light"><a href="recipes.php" title="Ftness"><i class="icon icon-themeenergy_biceps"></i> <span>Fitness</span></a></li>
							<li class="medium"><a href="recipes.php" title="Healthy"><i class="icon icon-themeenergy_apple2"></i> <span>Healthy</span></a></li>
							
							<li class="light"><a href="recipes.php" title="Asian"><i class="icon icon-themeenergy_sushi"></i> <span>Asian</span></a></li>
							<li class="medium"><a href="recipes.php" title="Mexican"><i class="icon icon-themeenergy_peper"></i> <span>Mexican</span></a></li>
							<li class="dark"><a href="recipes.php" title="Pizza"><i class="icon  icon-themeenergy_pizza-slice"></i> <span>Pizza</span></a></li>
							
							<li class="medium"><a href="recipes.php" title="Kids"><i class="icon icon-themeenergy_happy"></i> <span>Kids</span></a></li>
							<li class="dark"><a href="recipes.php" title="Meat"><i class="icon icon-themeenergy_meat"></i> <span>Meat</span></a></li>
							<li class="light"><a href="recipes.php" title="Snacks"><i class="icon icon-themeenergy_fried-potatoes"></i> <span>Snacks</span></a></li>
							
							<li class="dark"><a href="recipes.php" title="Salads"><i class="icon icon-themeenergy_eggplant"></i> <span>Salads</span></a></li>
							<li class="light"><a href="recipes.php" title="Storage"><i class="icon icon-themeenergy_soup2"></i> <span>Soups</span></a></li>
							<li class="medium"><a href="recipes.php" title="Vegetarian"><i class="icon icon-themeenergy_plant-symbol"></i> <span>Vegetarian</span></a></li>
						</ul>
					</div>
												
					<!--<div class="widget members">
						<h3>Our members</h3>
						<div id="members-list-options" class="item-options">
						</div>
						<ul class="boxed">
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar1.jpg" alt="" /><span>Kimberly C.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar2.jpg" alt="" /><span>Alex J.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar3.jpg" alt="" /><span>Denise M.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar9.jpg" alt="" /><span>Jason H.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar8.jpg" alt="" /><span>Jennifer W.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar4.jpg" alt="" /><span>Anabelle Q.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar7.jpg" alt="" /><span>Thomas M.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar5.jpg" alt="" /><span>Michelle S.</span></a></div></li>
							<li><div class="avatar"><a href="my_profile.php"><img src="images/avatar6.jpg" alt="" /><span>Bryan A.</span></a></div></li>
						</ul>
					</div>-->
						
					<div class="widget">
						<a href="contact.php"><h3>Advertisment</h3></a>
						<a href="#"><img src="images/advertisment.jpg" alt="" /></a>
					</div>
				</aside>
			</div>
			<!--//right sidebar-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
	<!--call to action-->
	<section class="cta">
		<div class="wrap clearfix">
		</div>
	</section>
	<!--//call to action-->
	
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
	<script src="js/home.js"></script>	
</body>

<!-- Mirrored from www.themeenergy.com/themes/html/social-chef/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 21:55:27 GMT -->
</html>


