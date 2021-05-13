<?php
session_start();
include "../../controller/blogC.php";

$blogc = new blogC();
$listeblogs=$blogc->afficherblog();



?>

<!DOCTYPE html>
<html lang="en">

<<>
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
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
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
</>

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
                                src="../plugins/images/pixeladmin-logo.png" alt="home" /></b><span
                            class="hidden-xs"><img src="../plugins/images/pixeladmin-text.png" alt="home" /></span></a>
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
                        <a class="profile-pic" href="../../../front_office/view/logout.php"> <b class="hidden-xs">logout</b> </a>
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
                        <a href="Profile.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li>
                        <a href="fontawesome.php" class="waves-effect"><i class="fa fa-font fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Icons</span></a>
                    </li>
                    <li>
                        <a href="Users.php" class="waves-effect"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Users</span></a>
                    </li>
                    <li>
                        <a href="ontact.php" class="waves-effect"><i class="fa  fa-phone-square fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Contact</span></a>
                    </li>
                    <li>
                        <a href="Blog.php" class="waves-effect"><i class="fa fa fa-reddit-alien fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Blog</span></a>
                    </li>
                    <li>
                        <a href="Recipes.html" class="waves-effect"><i class="fa fa-delicious fa-fw"
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
                <span class="hide-menu"><a href="../../../front_office/view" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Back to Wakkalny</a></span>

                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blog Table</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Blog Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->


                <!--imprimer tab des blogs de backoffice-->
                <script>
function imprimer(divName) {
 var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
  document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
 
                <div class="row" id="sectionAimprimer">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Blog Table</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first Name</th>
                                            <th>Title</th>
                                            <th>Subject</th>
                                            <th>picture</th>
                                        </tr>
                                    </thead>
                                    <?php
            foreach($listeblogs as $blog){
        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $blog ["idblog"] ?></td>
                                            <td><?php echo $blog ["nom"] ?></td>
                                            <td><?php echo $blog ["titre"] ?></td>
                                            <td><?php echo $blog ["sujet"] ?></td>
                                            <td><a href=""><img src="images/<?php echo $blog['image'];?>"Style="height:70px; width:100px;" /></a>  </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php
            }
            ?> 
            
                                </table>
                            </div>
                        </div>
                    </div>
               
        </div>
        </div>
                <div class="text-center">
            <button onclick="imprimer('sectionAimprimer')" class="btn btn-primary">print </button>
           
                <!-- /.row -->
            </div>



            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Pixel Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>