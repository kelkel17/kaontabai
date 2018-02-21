<?php 
    include '../../Controller/dbconn.php';

    islogged2();
 
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $profile = $_FILES['profile']['name'];
        $directory = "../../Image/";
        $path = time().$profile;
        if(move_uploaded_file($_FILES['profile']['tmp_name'], $directory.$path)){
            $data = array($fname, $mname, $lname, $email, $phone, $address, $path, $id);
            updateCustomer($data);
            echo '<script> alert("Successfully Updated"); window.location="editprofile.php?id='.$_GET['id'].'"; </script>';
        }else{
            echo '<script> alert("Error in updating your profile"); window.location="editprofile.php?id='.$_GET['id'].'"; </script>';
          }
       }
  

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $customer = getCustomer(array($id));

        foreach ($customer as $row) {
              $id = $row['customer_id'];
              $fname = $row['customer_fname'];
              $mname = $row['customer_mname'];
              $lname = $row['customer_lname'];
              $email = $row['customer_email'];
              $address = $row['customer_addr'];
              $phone = $row['customer_phone'];
              $gender = $row['customer_gender'];
              $bday = $row['customer_birthdate'];    
              $picture = $row['customer_pic'];
     
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
       <link href="../../assets/fonts/css.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->
        <!-- <style type="text/css">
            .a>div { display: none; }
            .a:hover>div { display: block; }
        </style> -->
        <!-- <style>
            .tooltip {
                position: relative;
                display: inline-block;
                border-bottom: 1px dotted black;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 120px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -60px;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: black transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
            }
        </style> -->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />
        <!-- <link rel="stylesheet" href="../../assets/css/star-rating.min.css" /> -->
        <link href="../../assets/css/profile.css" rel="stylesheet">
        <link href="../../assets/css/mynav.css" rel="stylesheet">
        <!-- <script src="../../assets/js/vendor/jquery-3.2.1.js"></script> -->
        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <!-- <script src="../../assets/js/vendor/star-rating.min.js"></script> -->
         
    </head>
    <body style="background-color: white;">
    
         <header id="home" class="navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                  </button>
                                    <a class="navbar-brand our_logo" href="#"></a><!--<img src="assets/images/logo.png" alt="" /></a>-->
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-left">
                                        <li><a href="home.php?id=<?php echo $_SESSION['id']?>">Home</a></li>
                                         <li><a href="restaurant.php?id=<?php echo $_SESSION['id'];?>">Restaurants</a></li>
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <li><a href="#portfolio">Most Ordered Food</a></li>
                                        <li><a href="#ourPakeg">News & Events</a></li>
                                        <li><a href="#mobaileapps">Blogs</a></li>  
                                    </ul> 
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a  href="customerprofile.php?id=<?php echo $row['customer_id']; ?>"><?php echo $row['customer_fname'].' '.$row['customer_lname']?></a></li>
                                        <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>
                                    </ul>
                         
                                          <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->
                                                 
                                </div><!-- /.navbar-collapse -->   
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->
                        
        <section id="abouts" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="abouts_content">
                            <?php echo '<img src="../../Image/'.$row['customer_pic'].'" class="img-responsive" alt="" data-toggle="modal" style="border-radius:50%; display: block;margin-left: auto;margin-right:auto; width:200px; height:auto;" data-target="#profilePic'.$row['customer_id'].'"/>';?> 
                                    <div class="profile-usertitle">
                                      <div class="profile-usertitle-name">
                                      <?php 
                                        echo $row['customer_fname'].' '.$row['customer_lname'];
                                        $pid = $_SESSION['id'];
                                        $sql = "SELECT SUM(points) FROM reservations WHERE customer_id = $pid";
                                        $con = con();
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();
                                        $view = $stmt->fetchColumn();
                                      ?>
                                      </div>
                                      <div class="profile-usertitle-job">
                                        Total Points: <?php echo $view; ?>
                                      </div>
                                    </div>
                                    <br/>
                                    <div class="profile-userbuttons">
                                        <a href="customerprofile.php?id=<?php echo $row['customer_id'];?>"><button type="button" class="btn btn-success btn-sm">Profile Profile</button></a>
                                      <a class="btn btn-danger btn-sm" href="../../Controller/logout.php">Log Out</a>
                                    </div>
                                    <div class="profile-usermenu">
                                      <ul class="nav">
                                        <li class="active">
                                          <a href="#">
                                          <i class="fa fa-bar-chart"></i>
                                          Reservation History </a>
                                        </li>
                                      </ul><br/>
                                      <ul class="nav">
                                        <li class="active">
                                          <a href="#">
                                          <i class="fa fa-bar-chart"></i>
                                          Order History </a>
                                        </li>
                                      </ul><br/>
                                      <ul class="nav">
                                        <li class="active">
                                          <a href="#">
                                          <i class="fa fa-bar-chart"></i>
                                          Payment History </a>
                                        </li>
                                      </ul><br/>
                                   </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="abouts_content responsive">
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                 <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                                  <label for="inputEmail4">First Name</label>
                                  <input type="text" class="form-control" id="inputEmail4" name="fname" value="<?php echo $fname; ?>" placeholder="Firstname" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputPassword4">Middle Name</label>
                                  <input type="text" class="form-control" id="inputPassword4" name="mname" value="<?php echo $mname; ?>" placeholder="Middlename" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputPassword4">Last Name</label>
                                  <input type="text" class="form-control" id="inputPassword4" name="lname" value="<?php echo $lname; ?>" placeholder="Lastname" required>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Email</label>
                                  <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $email; ?>" placeholder="kaontabai@gmail.com" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputPassword4">Contact Number</label>
                                  <input type="text" class="form-control" id="inputPassword4" name="phone" value="<?php echo $phone; ?>" placeholder="123456" required>
                                </div>
                              </div>
                              <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputAddress2">Address</label>
                                <input type="text" class="form-control" id="inputAddress2" name="address" value="<?php echo $address; ?>" placeholder="Cebu City" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputAddress2">Profile Picture</label>
                                <input type="file"  name="profile" class="form-control" accept="image/jpeg/jpg">
                              </div>
                               <hr/>
                              <input type="submit" class="btn btn-primary" name="update" value="Update Profile">
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
<!--     <a class="a">Some Link
<div><img src="/you/image" /></div>
</a> -->
       
      
		
		<footer class="footer" style="margin-top: 14.5%;">
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
     <?php } }?>
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>      

        <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>
        <!-- <script src="../../assets/vendor/jquery/jquery.min.js"></script> -->
        <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>
    
    </body>
</html>
