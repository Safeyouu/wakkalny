<?php
session_start();

include "../controller/userC.php";
include_once "../model/user.php";
$error = "";

$user1 = null;

$userc = new userC();      
$user=$userc->getUserbyname($_SESSION['username']);


if (isset($_POST['update']) )
{
       


        
        $id=$_POST['id'];
        $username=$_POST['username'];
		$nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $image=$_POST['image'];
       


        $sql="UPDATE user SET id='$id',username='$username',nom='$nom',prenom='$prenom',adresse='$adresse',tel='$tel',email='$email',mdp='$mdp',image='$image' where id='$id'";
            $db = config::getConnexion();
            try{
            $req=$db->prepare($sql);
            $req->execute();
			header('Location:my_profile.php');
            exit();
            
        }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();

           
            
            }
}


?>

<?php

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
					<li><a href="index.php" title="Home"><span>Home</span></a></li>
					<li><a href="recipes.html" title="Recipes"><span>Recipes</span></a>
						
					</li>
					<li><a href="blog.html" title="Blog"><span>Blog</span></a>
						<ul>
							<li><a href="blog_single.html" title="Blog post">Blog post</a></li>
						</ul>
					</li>
						
					</li>
					
					<li><a href="contact.html" title="Contact"><span>Contact</span></a></li>
					<li><a href="shop.html" title="Shop"><span>Shop</span></a></li>
					<?php  
					if(isset($_SESSION['username']))  
					{  
					?>
						<li style="color:coral; font-size:10px;text-transform: lowercase" >
							<img src="../../back_office/view/plugins/images/user.ico"  alt="" width="20" height="20" ><i  style="color:black; font-size:17px;">*</i><?php echo $_SESSION['username']; ?>
							
							 
						</li>
						<li  style=" font-size:13px;text-transform: lowercase"> <a href="logout.php" id="logout"><span class="" >Logout</span></a> </li>

					<?php  
					}
					?>
				</ul>
				
			</nav>
			
			<nav class="user-nav" role="navigation">
				<ul>
					<li class="light"><a href="find_recipe.html" title="Search for recipes"><i class="icon icon-themeenergy_search"></i> <span>Search for recipes</span></a></li>
					<li class="medium current-menu-item"><a href="my_profile.php" title="My account"><i class="icon icon-themeenergy_chef-hat"></i> <span>My account</span></a></li>
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
					<li><a href="index.php" title="Home">Home</a></li>
					<li><a href="my_profile.php" title="Home">My account</a></li>
					<li>Update Profile</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
		
			<!--content-->
						
			<section class="content">
				<!--row-->
				<div class="row">
					<!--profile left part-->
						
					<div class="my_account one-fourth" >
						
						
					</div>
					
					<!--//profile left part-->
					
					
					
                    
						
						<!--about-->
						
						<div class="tab-content" id="about" style="text-align: center">
							<div class="row" >
							
                            <?php
								if (isset($_SESSION['username'])){
								//$user1 = $userU->recupererUser($_SESSION['id']);
							?>
								
										<!--content-->
										<form method="POST" action="updateuser.php">
											<section class="content center full-width" >
												<div class="modal container">
													<h3>Edit Profile</h3>
													<div class="f-row">
													
														<input type="hidden" name="id" placeholder="Your Username"  value = "<?php echo $user['id']; ?>"  />
													</div>
													<div class="f-row">
													<label for=""> Username :</label>
														<input type="text" name="username" placeholder="Your Username"  value = "<?php echo $user['username']; ?>"  />
													</div>
													<div class="f-row">
													<label for="">First Name :</label>
														<input type="text" name="nom" placeholder="Your first name"  value = "<?php echo $user['nom']; ?>"  />
													</div>
													<div class="f-row">
													<label for="">Last Name :</label>
														<input type="text" name="prenom" placeholder="Your last name"  value = "<?php echo $user['prenom']; ?>"  />
													</div>
													<div class="f-row">
													<label for="">Email :</label>
														<input type="email" name="email" placeholder="Your email"  value = "<?php echo $user['email']; ?>" />
													</div>
													<div class="f-row">
													<label for="">Password :</label>
														<input type="text" name="mdp" placeholder="Your password"  value = "<?php echo $user['mdp']; ?>" />
													</div>
													<div class="f-row">
													<label for="">Adress :</label>
														<input type="text" name="adresse" placeholder="Your adress"  value = "<?php echo $user['adresse']; ?>"  />
													</div>
													<div class="f-row">
													<label for="">Phone Number :</label> <br>
														<input type="tel" name="tel" placeholder="Your phone number" pattern="[2-9]{2}[0-9]{3}[0-9]{3}" maxlength="8" value = "<?php echo $user['tel']; ?>" />
													</div>
													<section>
													<h42>Photo</h4>
													<div class="f-row full">
														<input type="file" name="image" />
													</div>
													</section>
													<div class="f-row bwrap">
														<input type="submit" value="Update" name="update" />
													</div>
													<div class="cta">
														<a href="my_profile.php" class="button big">Cancel</a>
													</div>
												</div>
											</section>
										</form>
										<!--//content-->
								<?php
								}
								?>	
							
								
								<!--<div class="one-third">
									<ul class="boxed gold">
										<li class="light"><a href="#" title="Best recipe"><i class="icon icon-themeenergy_crown"></i> <span>Had a best recipe</span></a></li>
										<li class="medium"><a href="#" title="Was featured"><i class="icon icon-themeenergy_top-rankings"></i> <span>Was featured</span></a></li>
										<li class="dark"><a href="#" title="Added a first recipe"><i class="icon  icon-themeenergy_medal-first-place"></i> <span>Added a first recipe</span></a></li>
										
										<li class="medium"><a href="#" title="Added 10-20 recipes"><i class="icon icon-themeenergy_medal-8"></i> <span>Added 10-20 recipes</span></a></li>
										<li class="dark"><a href="recipes.html" title="Events"><i class="icon icon-themeenergy_pencil"></i> <span>Wrote a blog post</span></a></li>
										<li class="light"><a href="recipes.html" title="Fish"><i class="icon icon-themeenergy_chat-bubbles"></i> <span>Wrote a comment</span></a></li>
										
										<li class="dark"><a href="recipes.html" title="Fish"><i class="icon icon-themeenergy_cup2"></i> <span>Won a contest</span></a></li>
										<li class="light"><a href="recipes.html" title="Healthy"><i class="icon icon-themeenergy_share3"></i> <span>Shared a recipe</span></a></li>
										<li class="medium"><a href="#" title="Was featured"><i class="icon icon-themeenergy_top-rankings"></i> <span>Was featured</span></a></li>
									</ul>
								</div>-->
							</div>
						</div>
						<!--//about-->

						

					
						<!--update profile-->
						
						<?php
							/*$error = "";
							$userU = new userC();
							
							
							if(isset($_POST["update"]))
							{
								if(!empty($_POST["username"])&&
									!empty($_POST["nom"])&&
									!empty($_POST["prenom"])&&
									!empty($_POST["email"])&&
									!empty($_POST["mdp"])&&
									!empty($_POST["tel"])&&
									!empty($_POST["adresse"])&&
									!empty($_POST["role"])
									){
										echo "<h1>test</h1>";
								$user1 = new user(
									$_POST["username"],
									$_POST["nom"],
									$_POST["prenom"],
									$_POST["email"],
									$_POST["mdp"],
									$_POST["tel"],
									$_POST["adresse"],
									$_POST["role"],
								);


								 
								$userc->haja($user1);


								$userc->update($user1,$_POST['id']);
								
									$_SESSION['username']=$_POST['username'];
									header('Location:my_profile.php');
								
									}
								else
									$error = "Missing information";
							}
								*/
						?>

						
						</div>
						<!--//update profile-->
						 
					
						
						<!--my favorites-->
						<div class="tab-content" id="favorites">
							<div class="entries row">
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img6.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Thai fried rice with fruit and vegetables</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
												<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img5.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Spicy Morroccan prawns with cherry tomatoes</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-hard"></i><a href="#">hard</a></div>
												<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
								
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img8.jpg" alt="" />
										<figcaption><a href="recipe.html"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="recipe.html">Super easy blueberry cheesecake</a></h2> 
										<div class="actions">
											<div>
												<div class="difficulty"><i class="ico i-easy"></i><a href="#">easy</a></div>
												<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="recipe.html#comments">27</a></div>
											</div>
										</div>
									</div>
								</div>
								<!--item-->
							</div>
						</div>
						<!--//my favorites-->
						
						<!--my posts-->
						<div class="tab-content" id="posts">
							<!--entries-->
							<div class="entries row">
								<!--item-->
								<div class="entry one-third">
									<figure>
										<img src="images/img12.jpg" alt="" />
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">Barbeque party</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
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
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">How to make sushi</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
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
										<figcaption><a href="blog_single.html"><i class="icon icon-themeenergy_eye2"></i> <span>View post</span></a></figcaption>
									</figure>
									<div class="container">
										<h2><a href="blog_single.html">Make your own bread</a></h2> 
										<div class="actions">
											<div>
												<div class="date"><i class="fa fa-calendar"></i><a href="#">22 Dec 2014</a></div>
												<div class="comments"><i class="fa fa-comment"></i><a href="blog_single.html#comments">27</a></div>
											</div>
										</div>
										<div class="excerpt">
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. Lorem ipsum dolor sit amet . . . </p>
										</div>
									</div>
								</div>
								<!--item-->
							</div>
							<!--//entries-->
						</div>
						<!--//my posts-->
					
				</div>
				<!--//row-->
			</section>
			<!--//content-->
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


