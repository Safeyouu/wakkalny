<?php
session_start();
include "../../controller/userC.php";
include_once "../../model/user.php";

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
			header('Location:profile.php');
            exit();
            
        }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();

           
            
            }
}

?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords"
            content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, pixel  design, pixel  dashboard bootstrap 4 dashboard template">
        <meta name="description"
            content="Pixel Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
        <meta name="robots" content="noindex,nofollow">
        <title>wakkalny</title>
        
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.ico">
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
        <!-- toast CSS -->
        <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
        <!-- morris CSS -->
        <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
        <!-- animation CSS -->
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    
    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                        href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                            class="fa fa-bars"></i></a>
                    <div class="top-left-part"><a class="logo" href="index.php"><b><img
                                    src="plugins/images/pixeladmin-logo.png" alt="home" /></b><span
                                class="hidden-xs"><img src="plugins/images/pixeladmin-text.png" alt="home" /></span></a>
                    </div>
                    <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                        <li>
                            <form role="search" class="app-search hidden-xs">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                        class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                        <a class="profile-pic" href="profile.php">  <i class="fa fa-user fa-fw" aria-hidden="true"></i><b class="hidden-xs"><?php echo $_SESSION['username']; ?></b> </a>
                        </li>
                        <li>
                        <a class="profile-pic" href="../front/logout.php"> <b class="hidden-xs">logout</b> </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Left navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                    <ul class="nav" id="side-menu">
                        <li style="padding: 10px 0 0;">
                            <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="profile.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        
                        <li>
                            <a href="Users.php" class="waves-effect"><i class="fa fa-users fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Users</span></a>
                        </li>
                        <li>
                            <a href="Contact.php" class="waves-effect"><i class="fa  fa-phone-square fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Contact</span></a>
                        </li>
                        <li>
                            <a href="Blog.php" class="waves-effect"><i class="fa fa fa-reddit-alien fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Blog</span></a>
                        </li>
                        <li>
                            <a href="Recipes.php" class="waves-effect"><i class="fa fa-delicious fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Recipes</span></a>
                        </li>
                        <li>
                            <a href="Classes.html" class="waves-effect"><i class="fa fa-table fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Classes</span></a>
                        </li>
                        <li>
                            <a href="Orders.html" class="waves-effect"><i class="fa fa-reorder (alias) fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                        </li>
                        <li>
                            <a href="Products.php" class="waves-effect"><i class="fa fa-shopping-cart fa-fw"
                                    aria-hidden="true"></i><span class="hide-menu">Products</span></a>
                        </li>
    
                        
                    </ul>
                    <div class="center p-20">
                    <span class="hide-menu"><a href="../front" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Back to Wakkalny</a></span>

                    </div>
                </div>
            </div>
            <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Profile page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="plugins/images/users/avatar6.jpg"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $user['username']; ?></h4>
                                        <h5 class="text-white"><?php echo $user['email']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
				if (isset($_SESSION['username']))
                {
				?>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" >
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" value="<?php echo $user['nom'].' '.$user['prenom'] ;?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email" value="<?php echo $user['email']; ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?php echo $user['mdp']; ?>" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Adress</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Adress"
                                            class="form-control form-control-line" value="<?php echo $user['adresse']; ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone Number</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line" value="<?php echo $user['tel']; ?>"> </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    
                                    <div class="f-row bwrap">
										<input type="submit" value="Update" name="update" />
									</div>
									                        
                                    <span class="hide-menu"><a href="profile.php" target="_blank" ><button>Cancel</button> </a></span>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
				}
				?>
                </div>
               
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 
            <h5>Follow us</h5>
				
						<a href="https://www.facebook.com" title="facebook"><img src="plugins/images/ico/fb.png" alt="facebook logo"  /></a>
						<a href="https://www.youtube.com" title="youtube"><img src="plugins/images/ico/yo.png" alt="youtube logo"/></a></>
						<a href="https://www.linkedin.com" title="linkedin"><img src="plugins/images/ico/li.png" alt="linkedin logo"/></a>
						<a href="https://www.twitter.com" title="twitter"><img src="plugins/images/ico/tw.png" alt="twitter logo"/></a>
					    <a href="https://www.pinterest.com" title="pinterest"><img src="plugins/images/ico/pi.png" alt="pinterest logo"/></i></a>
						<a href="https://www.instagram.com" title="vimeo"><img src="plugins/images/ico/ig.png" alt="instagram logo"/></a>
					
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>