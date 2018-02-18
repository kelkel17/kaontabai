<?php

    include '../../Controller/dbconn.php';


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KaonTaBai!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <!--<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css"/>

        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--<div class='preloader'><div class='loaded'>&nbsp;</div></div>-->
        <header id="home" class="navbar-fixed-top">
           <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                  </button>
                                    <a class="navbar-brand our_logo" href="#"><!--<img src="assets/images/logo.png" alt="" /></a>-->
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-left">
                                        <li><a href="../../index.php">Home</a></li>
                                        <li><a href="restaurant.php">Restaurants</a></li>
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <li><a href="mostordered.php">Most Ordered</a></li>
                                        <li><a href="events.php">News & Events</a></li>
                                        <li><a href="blog.php">Blogs</a></li>
                                        
                                    </ul>
                                      <ul class="nav navbar-nav navbar-right">
                                            <li><a href="login.php" class="booking">Sign Up & Login</a></li>
                                     </ul> 
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>	
        </header> <!-- End Header Section -->
        
        

                        <?php 
                            $rows = viewAllOwners();

                        ?>
<?php foreach ($rows as $row) {?>
        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" align="top" alt=""/>'; ?>
                            </div>
                        </div>
                            <br clear="center"/>
                            <br clear="center"/>
                            <br clear="center"/>
                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">

                                <h4><?php echo $row['restaurant_name']; ?></h4>
                              
                                <p><?php echo substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) >= 500) ? '...' : ''); ?></p>

                                     
                             
                         
                              
                              <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>" class="btn btn-primary">More Info</a>
                            

                                 <a href="../Customer/restaurantinfo.php" class="btn btn-primary">Book A Table</a>
                            

                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>


        
      
      
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>		
        <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>
    </body>
</html>
