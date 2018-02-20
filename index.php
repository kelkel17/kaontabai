<?php
  include 'Controller/signin.php';
?>

<!doctype html>
<!-- test -->
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

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       <link href="assets/fonts/css.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/animate/animate.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style3.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="shortcut icon" href="assets/img/logo.png">
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <header id="home" class="navbar-fixed-top">
            <div class="main_menu_bg2">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                  </button>
                                    <a class="navbar-brand our_logo" href="#"><!--<img src="assets/images/logo.png" alt="" /></a>-->
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-left">
                                        <li><a href="#index.php">Home</a></li>
                                        <li><a href="#abouts">Restaurants</a></li>
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <!-- <li><a href="#portfolio">Most Ordered Food</a></li> -->
                                        <li><a href="#ourPakeg">News & Events</a></li>
                                        <li><a href="#team">The Team</a></li>
                                       <!--  <li><a href="#mobaileapps">Blogs</a></li>   -->
                                    </ul> 
                                          
                                             <form action="Controller/signin.php" method="post">
                                           <ul class="nav navbar-nav navbar-right main-nav">
                                                    
                                                    
                                                    <li><input type="email" class="form-control booking" name="email"  placeholder="Email" required></li>
                                                    <li><input type="password" class="form-control" name="password"   placeholder="Password" required></li>
                                                    <button class="btn btn-primary" type="submit" name="login">
                                                        <li>
                                                        <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In
                                                    </button>
                                                        </li>
                                                        <a href="#footer_widget" class="btn btn-primary"> Sign Up</a> 
                                                        
                                            </ul>
                                             </form>
                                          <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->
                                                 
                                </div><!-- /.navbar-collapse -->   
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->
    

                
                   

       <section id="slider" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                   <!--  <h3>KaonTaBai</h3>
                                    <p>Satisfying people's hunger in life's simple pleasure</p> -->
                                    
                                </div>
                            </div>  
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <img src="assets/images/ab.png" alt="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4>Restaurants</h4>
                               
                                <p>A restaurantor an eatery, is a business which prepares and serves food and drinks to customers in exchange for money. Meals are generally served and eaten on the premises, but many restaurants also offer take-out and food delivery services, and some offer only take-out and delivery. Restaurants vary greatly in appearance and offerings, including a wide variety of cuisines and service models ranging from inexpensive fast food restaurants and cafeterias to mid-priced family restaurants, to high-priced luxury establishments.</p>

                               
                                <a href="View/Customer/restaurant.php" class="btn btn-primary">Find a Restaurant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="features">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_features_content_area wow fadeIn" data-wow-duration="3s">
                            <div class="col-md-12">
                                <div class="main_features_content text-left">
                                    <div class="col-md-6">
                                        <div class="single_features_text">
                                            <h4>Special Cooking</h4>
                                            <h3>Taste of Precious</h3>
                                            <p>Cooking or cookery is the art, technology, science and craft of preparing food for consumption with or without the use of heat. Cooking techniques and ingredients vary widely across the world, from grilling food over an open fire to using electric stoves, to baking in various types of ovens, reflecting unique environmental, economic, and cultural traditions and trends. <!-- The ways or types of cooking also depend on the skill and type of training an individual cook has. Cooking is done both by people in their own dwellings and by professional cooks and chefs in restaurants and other food establishments. Cooking can also occur through chemical reactions without the presence of heat, such as in ceviche, a traditional South American dish where fish is cooked with the acids in lemon or lime juice. --></p>
                                            
                                            <a href="View/Customer/restaurant.php" class="btn btn-primary">Book a Table</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <h2>Most ordered foods</h2>
                                
                            </div>
                            <?php 
                                    $con = con();
                                    $query = "SELECT SUM(od.order_qty) AS total_quantity,m.m_name as name,m.m_image as image, m.m_price as price FROM order_details as od, orders as o, menus as m WHERE od.order_id = o.order_id AND od.menu_id = m.menu_id GROUP BY od.menu_id ORDER BY od.order_qty desc LIMIT 8";
                                    $data = $con->prepare($query);
                                    $data->execute(); 
                                    $info = $data->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($info as $ro) {
                                ?>
                            <div class="main_portfolio_content">
                                 <div class="col-md-3 col-sm-4 col-xs-6 single_portfolio_text">
                                    <?php 
                                        $filename = 'Image/'.$ro['image'].'';
                                        if($ro['image'] == '' || !(file_exists($filename))){?>
                                        <img src="Image/icon3.png" alt="blank">
                                        <?php }else{ ?>
                                        
                                        <img src="Image/<?php echo $ro['image']?>" alt="blank">
                                        <?php } ?>
                                    <div class="portfolio_images_overlay text-center">
                                        <h6><?php echo $ro['name']?></h6>
                                        <p class="product_price">&#8369;<?php echo $ro['price']?></p>
                                        <a href="login.php" class="btn btn-primary">Order Now</a>
                                    </div>
                            </div>
                               <?php } ?>  
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="ourPakeg" class="ourPakeg">
            <div class="container">
                <div class="main_pakeg_content">
                    <div class="row">
                        <div class="head_title text-center">
                            <h2 >Latest News & Events</h2>               
                        </div>
                            <div class="pakeg_title">
                                    <?php  
                                    $con = con();
                                    $query = "SELECT * FROM combo_meals as m, restaurants as r WHERE m.restaurant_id = r.restaurant_id AND m.status = 'Available' GROUP BY m.restaurant_id ORDER BY m.created DESC LIMIT 1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($view as $row) {
                                    
                                ?>    
                                    <!-- <div class="pakeg_title text-right"> -->
                                        <h4>Newest Combo Meal</h4>
                                        <?php 
                                        $filename = 'Image/'.$row['image'].'';
                                        if($row['image'] == '' || !(file_exists($filename))){?>
                                        <img src="Image/icon3.png" alt="blank" style="width: 305px; height: 300px;">
                                        <?php }else{ ?>
                                        
                                        <img src="Image/<?php echo $row['image']?>" alt="blank" style="width: 305px; height: 300px;">
                                        <?php } ?>
                                        <h5><?php echo $row['restaurant_name'];?>'s <?php echo $row['cm_name'];?></h5>
                                        <h6>&#8369; <?php echo $row['price']?></h6>
                                        <a href="View/Customer/menu.php?cid=<?php echo $row['restaurant_id']?>" class="btn btn-primary" style="margin-right: -3px;">Click for more Info</a>
                                    <!-- </div> -->
                                <?php } ?> 
                            </div>
                            <div class="pakeg_title2">
                                 <?php  
                                    $con = con();
                                    $query = "SELECT * FROM menus as m, restaurants as r, events as e WHERE m.restaurant_id = r.restaurant_id AND r.restaurant_id = e.restaurant_id AND e.event_status = 'Open' GROUP BY e.restaurant_id ORDER BY e.created DESC LIMIT 1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($view as $row) {
                                    
                                ?>

                                        <h4>Newest Event</h4>
                                        <img src="Image/<?php echo $row['restaurant_logo'];?>" style="width: 305px; height: 300px;">
                                        <h4><?php echo $row['event_name'];?></h4>
                                        <h5><?php echo date('F j, Y',strtotime($row['event_date'])).' '.date('g:i A',strtotime($row['event_time']));?></h5>
                                        <a href="View/Customer/event.php" class="btn btn-primary">Click for more Info</a>
                                     </div> 
                                <?php } ?> 
                                
                                  
                        </div> <div class="pakeg_title3" style="margin-top: -42%">
                                <?php  
                                    $con = con();
                                    $query = "SELECT * FROM menus as m, restaurants as r WHERE m.restaurant_id = r.restaurant_id AND m.m_status = 'Available' GROUP BY m.restaurant_id ORDER BY m.created DESC LIMIT 1";
                                    $stmt = $con->prepare($query);
                                    $stmt->execute();
                                    $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($view as $row) {
                                    ?>
                                        <h4>Newest Meal</h4>
                                        <?php 
                                        $filename = 'Image/'.$row['m_image'].'';
                                        if($row['m_image'] == '' || !(file_exists($filename))){?>
                                        <img src="Image/icon3.png" alt="blank" style="width: 305px; height: 300px;">
                                        <?php }else{ ?>
                                        
                                        <img src="Image/<?php echo $row['m_image']?>" alt="blank" style="width: 305px; height: 300px;">
                                        <?php } ?>
                                        <h5><?php echo $row['restaurant_name'];?>'s <?php echo $row['m_name'];?></h5>
                                        <h6>&#8369; <?php echo $row['m_price']?></h6>
                                        <a href="View/Customer/menu.php?cid=<?php echo $row['restaurant_id']?>" class="btn btn-primary" style="margin-right: -3px;">Click for more Info</a>
                                    <!-- </div> -->
                                <?php } ?>    
                        </div>
                    </div>
                </div>
        </section>

        <section class="portfolio" id="team">  
            <header class="try4 text-center">The Team</header>
            <div class="col-sm-4 text-center port">
              <img src="assets/images/mickale.jpg" class="lol" alt=""/>
              <h4>Mickale L. Saturre</h4>
              <h5>Hustler</h5>    
              <a href="#" class="abt fa fa-facebook"></a>
              <a href="#" class="abt fa fa-twitter"></a>
              <a href="#" class="abt fa fa-linkedin"></a>                   
          </div>
          <div class="col-sm-4 text-center port">
              <img src="assets/images/godwin.jpg" class="lol" alt=""/>
              <h4>Francis Godwin M. Montealto</h4>
              <h5>Hacker</h5>
              <a href="#" class="abt fa fa-facebook"></a>
              <a href="#" class="abt fa fa-twitter"></a>
              <a href="#" class="abt fa fa-linkedin"></a>                      
          </div>
          <div class="col-sm-4 text-center port">
              <img src="assets/images/hermes.jpg" class="lol" alt=""/>
              <h4>Hermes James B. Riconalla</h4>
              <h5>Hipster</h5>
              <a href="#" class="abt fa fa-facebook"></a>
              <a href="#" class="abt fa fa-twitter"></a>
              <a href="#" class="abt fa fa-linkedin"></a>         
          </div>
      </section>



         <section id="footer_widget" class="footer_widget">
            <div class="container">
                <div class="row">
                    <div class="footer_widget_content">
                    <form method="post" action="Controller/CustomersController/addcustomer.php">
                       <div class="col-md-4">
                            <div class="single_widget">
                                <h3 style="color: white">For Diners</h3>

                                <div class="single_widget_form text-left">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fname" placeholder="First Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="lname" placeholder="Last Name" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control"  name="email" placeholder="Email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input name="pass" type="password" class="form-control"  placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input name="pass2" type="password" class="form-control"  placeholder="Confrim Password">
                                        </div>
                                </div>
                            </div>
                        </div> 
                         <div class="col-md-4">
                            <div class="single_widget wow fadeIn" data-wow-duration="1s">
                                <h3><br></h3>

                                <div class="single_widget_form text-left">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="addr"  placeholder="Address" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone"   placeholder="Contact" required="">
                                        </div>


                                        <div class="form-group">       
                                            <input type="radio" class="" name="gender" value="Male" checked>&nbsp;Male
                                            <input type="radio" class="" name="gender" value="Female">&nbsp;Female
                                        </div> 

                                        <div class="form-group"><label>Birthdate</label>
                                            <input type="date" class="form-control" name="bdate"   placeholder="Contact" required="">                                    
                                        </div>   
                                        <!-- end of form-group -->

                                        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                            <div class="single_widget">
                                <h3 style="color: white">For Restaurants</h3>

                                <div class="single_widget_form text-left">
                                    <form id="formid">
                                            <a href="Paypals/index.php" class="btn btn-primary">Subcribe Now!
                                            </a>
                                    </form>
                                 </div>   
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
        </section>

<a href="loginadmin.php" style="float:right; color:black;">1</a>
        <!--Footer-->
     <footer class="footer">
            <div class="text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright  wow zoomIn" data-wow-duration="3s">
                            <p><a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                        <a href=""><i class="fa fa-pinterest-p"></i></a>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                        <a href=""><i class="fa fa-phone"></i></a>
                                        <a href=""><i class="fa fa-camera"></i></a></p>
                        </div>
                    </div>
                </div>
               </div>            
        </footer>
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>      


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="assets/js/wow/wow.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
      $(window).scroll(function() {
      // 100 = The point you would like to fade the nav in.
        if ($(window).scrollTop() > 35 ){   
          $('#bg-inverse').addClass('#showopa');
           $('#nav-link').addClass('#nav-clink');

        } else {
          $('#bg-inverse').removeClass('#showopa');

            $('#nav-link').removeClass('#nav-clink');

           
        };    
      });

      $('#scroll').on('click', function(e){   
          e.preventDefault()
          
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
          }, 1500);
      });

    </script>

    </body>
    
</html>
