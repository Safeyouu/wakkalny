<?php

include "../controller/userC.php";
include_once '../Model/user.php';


$userc = new userC();

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
			<a href="index.html" title="SocialChef" class="logo"><img src="images/ico/logo.png" alt="SocialChef logo"  /></a>
			
			<nav class="main-nav" role="navigation" id="menu">
				<ul>
					<li><a href="index.html" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.html" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.html" title="Blog"><span>Blog</span></a>
						<ul>
							<li><a href="blog_single.html" title="Blog post">Blog post</a></li>
						</ul>
					</li>
					<li><a href="#" title="Pages"><span>Pages</span></a>
						<ul>
							<li><a href="login.html" title="Login page">Login page</a></li><li class="current-menu-item"><a href="register.html" title="Register page">Register page</a></li>
						</ul>
					</li>
					
					<li><a href="contact.html" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.html" title="Shop"><span>Shop</span></a></li>
				</ul>
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.html" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="medium"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
					<li class="dark"><a href="submit_recipe.html" title="Submit a recipe"><i class="icon icon-themeenergy_fork-spoon"></i> <span>Submit a recipe</span></a></li>
				</ul>
			</nav>
		</div>
		<!--//wrap-->
	</header>
	<!--//header-->

    

<?php
      $error = "";
                                    
        if(isset($_POST["nom"])&&
                                    
        isset($_POST["email"])&&
        isset($_POST["mdp"])&&
        isset($_POST["tel"])&&
        isset($_POST["adresse"])&&
        isset($_POST["role"])
        )
        {
        if(!empty($_POST["nom"])&&                              
        !empty($_POST["email"])&&
        !empty($_POST["mdp"])&&
        !empty($_POST["tel"])&&
        !empty($_POST["adresse"])&&
        !empty($_POST["role"])
        ){
            echo "<h1>test</h1>";
        $user1 = new user(
            $_POST["nom"],                               
            $_POST["email"],
            $_POST["mdp"],
            $_POST["tel"],
            $_POST["adresse"],
            $_POST["role"],
            );
            $userc->updateUser($user1, $_GET['id']);
            header('Location:my_profile.php');
            }                       
            else
                $error = "Missing information";
            }                   
            ?>

            <div class="tab-content" id="update">
                <?php
                    //if (isset($_GET['id'])){
                    //user1 = $userc->recupererUser($_GET['id']);
                ?>
                                        
                <!--content-->
                <form method="POST" action="my_profile.php">
                <section class="content center full-width">
                    <div class="modal container">
                        <h3>Modify user</h3>
                    <div class="f-row">
                        <input type="text" name="id" id="id" value = "<?php echo $user1['id'];?>" disabled  />
                    </div>
                    <div class="f-row">
                        <input type="text" name="nom" placeholder="Your name"  value = "<?php echo $user1['nom'];?>"  />
                    </div>                                                           
                    <div class="f-row">
                        <input type="email" name="email" placeholder="Your email"  value = "<?php echo $user1['email'];?>" />
                    </div>
                    <div class="f-row">
                        <input type="text" name="adresse" placeholder="Your adress"  value = "<?php echo $user1['adresse'];?>"  />
                    </div>
                    <div class="f-row">
                        <input type="number" name="tel" placeholder="Your phone number" value = "<?php echo $user1['tel'];?>" />
                    </div>
                    <div class="f-row">
                        <input type="text" name="role" placeholder="Your role" value = "<?php echo $user1['role'];?>" />
                    </div>
                    <div class="f-row bwrap">
                        <input type="submit" value="modifier" />
                    </div>
                    <div class="cta">
                        <a href="my_profile.php" class="button big">Cancel</a>
                    </div>
                    </div>
                </section>
                </form>
                <!--//content-->
                <?php
                //}
                ?>	
            </div>


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