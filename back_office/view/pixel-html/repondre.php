<?php
session_start();

include '../../controller/contactC.php';
include_once "../../model/contact.php";
require_once('phpmailer/src/PHPMailer.php');


$contactc = new contactC();


$user=$contactc->getUserbyname($_SESSION['username']);
$listecontact=$contactc->showcontact();

$mail = isset($_GET['mail']) ? $_GET['mail'] : '';




if(isset($_POST['enyoyer']))
		{
			$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->isSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'ssl';
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = '465';
				$mail->isHTML();
				$mail->Username = 'wakkalny@gmail.com';
				$mail->Password = '55028849';
				$mail->setFrom("no-reply@gmail.com");
				$mail->Subject = "Reclamation";
				$mail->Body = '
<body style="background-color:#f8f8f8;">
  <div style="background-color:#f8f8f8;">
    
    
    
    <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
        <tbody>
          <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-left:0px;padding-right:0px;padding-top:0px;text-align:center;vertical-align:top;">
             
              <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tr>
                    <td style="font-size:0px;padding:10px 25px;padding-top:0px;padding-right:0px;padding-bottom:40px;padding-left:0px;word-break:break-word;">
                      <p style="border-top:solid 7px #f45424;font-size:1;margin:0px auto;width:100%;">
                      </p>
                     
                    </td>
                  </tr>
                  
                </table>
              </div>
             
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    
   
    <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%;">
        <tbody>
          <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-bottom:70px;padding-top:30px;text-align:center;vertical-align:top;">
             
              <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tr>
                    <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                      <div style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                        <h1 style="text-align:center; color: #000000; line-height:32px">Hi , Thanks for using Wakkalny.</h1>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                      <div style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                        <p style="margin: 10px 0; text-align: center;">We really appreciate you trusting us.&nbsp;</p>
                        <p style="margin: 10px 0; text-align: center;">'.$_POST['message'].'</p>
                      </div>
                    </td>
                  </tr>
                 
                  <tr>
                    <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word;">
                      <div style="font-family:Open Sans, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82;">
                        <p style="margin: 10px 0; text-align: center;"><b style="font-weight:700">Thanks,<br />The Wakkalny&nbsp;Team.</b></p>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              
            </td>
          </tr>
        </tbody>
      </table>
    </div>
   
    
    
  </div>
</body>';
				$mail->AddAddress($_POST['mail']);
				$mail->send();
                header('Location: contact.php');
				
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
                            <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">admin</b> </a>
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
                        <h4 class="page-title">Basic Table</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <p class="text-muted">Respond<code>.table</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <form method="post">
                                    <thead>
                                           <tr><label for="">Message</label></tr>
                                           <tr><label for=""></label></tr>

                                      
                                    </thead>
                                    <tbody>
                                    <td><input type="hidden" name="mail" value="<?php echo $mail ?>" ></td>
                                       <td><input type="textarea" name="message"  ></td>
                                       <td><input type="submit" name="enyoyer" value="Send"></td>
                                       <td><a href="Contact.php">Cancel</a><td>

                                    </tbody>
                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 
            <h5>Follow us</h5>
				
						<a href="https://www.facebook.com" title="facebook"><img src="../plugins/images/ico/fb.png" alt="facebook logo"  /></a>
						<a href="https://www.youtube.com" title="youtube"><img src="../plugins/images/ico/yo.png" alt="youtube logo"/></a></>
						<a href="https://www.linkedin.com" title="linkedin"><img src="../plugins/images/ico/li.png" alt="linkedin logo"/></a>
						<a href="https://www.twitter.com" title="twitter"><img src="../plugins/images/ico/tw.png" alt="twitter logo"/></a>
					    <a href="https://www.pinterest.com" title="pinterest"><img src="../plugins/images/ico/pi.png" alt="pinterest logo"/></i></a>
						<a href="https://www.instagram.com" title="vimeo"><img src="../plugins/images/ico/ig.png" alt="instagram logo"/></a>
					
            </footer>
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