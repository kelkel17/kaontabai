<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    if(isset($_GET['cid'])){
    $data = array($_GET['cid'],$_SESSION['id']);
       visitcount($data);

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


        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />
         <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />

        <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <script src="../../assets/js/vendor/star-rating.min.js"></script>
         
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
                                        <li><a href="home.php?id=<?phpe echo $_SESSION['id']?>">Home</a></li>
                                         <li><a href="restaurant.php?id=<?php echo $_SESSION['id'];?>">Restaurants</a></li>
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <li><a href="#portfolio">Most Ordered Food</a></li>
                                        <li><a href="#ourPakeg">News & Events</a></li>
                                        <li><a href="#mobaileapps">Blogs</a></li>  
                                    </ul> 
                                  <?php        
                                    if($_SESSION['id'])
                                     {
                                        $customer = getCustomer(array($_SESSION['id']));
                                        foreach ($customer as $row) {
                                    ?>  
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a  href="customerprofile.php?id=<?php echo $row['customer_id']; ?>"><?php echo $row['customer_fname'].' '.$row['customer_lname']?></a></li>
                                        <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>
                                    </ul>
                                <?php } }?>
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
                    <?php 
    
                          $id = $_GET['cid'];
                          $con = con();
                          $sql = "SELECT * FROM restaurants  WHERE restaurant_id = $id";
                          $stmt = $con->prepare($sql);
                          $stmt->execute();
                          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);               
                            foreach ($rows as $row) {
                                $id = $_GET['id'];
                        ?> 
                    <div class="col-lg-7">
                    <div class="abouts_content">
                              
                            <h1 class="mt-4"><?php echo $row['restaurant_name'];?>'s Restaurant</h1><br/>
                            
                           
                             <!-- Message Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="messageUs<?php echo $row['restaurant_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index:1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Your Message!</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/message.php" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label for="pfrom">From:</label>
                                               <?php
                                                    $customer = getCustomer(array($_SESSION['id']));

                                                    if(count($customer)>0){
                                                      foreach ($customer as $s) {
                                                      ?>
                                                      <input type="text" name="customer" value="<?php echo $s['customer_fname'].' '.$s['customer_lname'];?>" id="pfrom" class="form-control" readonly>
                                                      <?php
                                                      }
                                                    }
                                              ?>
                                               <input type="hidden" name="cid" value="<?php echo $row['restaurant_id'];?>">
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pto">To:</label>
                                               <input type="text" name="restaurant" value="<?php echo $row['restaurant_name'].' Restaurant';?>"  id="pto" class="form-control" readonly>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pmessage">Your Message</label>
                                               <textarea name="message" id="pmessage" class="form-control"></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="send" class="btn btn-primary hover" value="Send">
                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Message modal-->
                           <!-- Reservation Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="bookNow<?php echo $row['restaurant_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index: 1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Book Now!</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/reservation.php?cid=<?php echo $row['restaurant_id']; ?>" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label for="pdate">Reservation Date & time</label>
                                               <input type="hidden" name="cid" value="<?php echo $row['restaurant_id'];?>">
                                               <input type="datetime-local"   name="dat" id="pdate" class="form-control" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pno">No. of Guests</label>
                                               <input type="number"   name="guest" id="pno" class="form-control" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="preq">Special Requests</label>
                                               <textarea name="special" id="preq" class="form-control" required></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="submit" class="btn btn-primary hover" value="Book Now!">

                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Resevation modal-->
                            <hr/>
                           <!-- Preview Image -->
                           <div>
                            <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" class="img-fluid rounded" style="display: block;margin-left: auto;margin-right:auto;"  align="top" alt=""/>'; ?>
                        </div>
                            <hr/>   
                            <div>
                            <p><?php echo '<td>'.$row['restaurant_desc'].'</td>'; ?></p>
                            </div>
            
                      </div>
                    </div>
                     <?php
                                    $lnglat = getLL();
                                    $lnglat = json_encode($lnglat,true);
                                    
                                    echo '<div id="data" style="display:none;">'.$lnglat.'</div>';

                                    // $latlng = getMap();
                                    // $latlng = json_encode($latlng,true);
                                    
                                    // echo '<div id="alldata" style="display:none;">'.$latlng.'</div>';
                                    $id = $_GET['cid'];
                                    $byId = getMapbyId($id);
                                    // $byId = json_encode();
                                    foreach($byId as $r) {
                                    echo '<div id="getbyid" style="display:none;">'.$r.'</div>';
                                  }
                                ?>
                    <div class="col-sm-4">
                        <div class="abouts_content" style="margin-top: 37%;">
                              <div class="card my-6">
                                <h5 class="card-header">Address</h5>
                                <div class="card-body">
                                  <span class="fa fa-map-marker" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.$row['restaurant_addr'].'</td>'; ?>
                                   <div id="map" style="width: 100%; height: 350px"></div>
                                </div>
                              </div>
                              <hr/>
                              <div class="card my-4">
                                <h5 class="card-header">Hours Open</h5>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-lg-10">
                                      <span class="fa fa-clock-o" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.date('g:i A', strtotime($row['hour_open'])).'</td>'; ?> to <?php echo '<td>'.date('g:i A', strtotime($row['hour_close'])).'</td>'; ?>(Mon-Sun)
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <hr/>
                              <!-- Side Widget -->
                              <div class="card my-4">
                                <h5 class="card-header">Contact Details</h5>
                                <div class="card-body">
                                <span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.$row['restaurant_contact'].'</td>'; ?>
                                </div>
                              </div>
                            <hr/>
                            <div class="card my-4">
                                <h2 class="card-header">Rate Us</h2>
                                    <div class="card-body">
                                         <?php
                                         $id = $_SESSION['id'];
                                         $resId = $row['restaurant_id'];
                                         $rate = doneRating($id,$resId);

                                         if($rate){
                                          ?> 
                                         <input value=<?php echo $rate['rate'];?> type="number" class="rating" min=0 max=5 step=0 data-size="xs" data-stars="5" productId=<?php echo $resId;?> name="rate" disabled />
                                        <?php } else{?>    
                                         <form action="getstar.php?cid=<?php echo $row['restaurant_id'];?>" method="POST">

                                            <input value="" type="number" class="rating" min=0 max=5 step=0 data-size="xs" data-stars="5" productId=<?php echo $resId;?> name="rate" />
                                            <button type="submit" name="submit" class="btn btn-primary hover" style="float:left; ">Rate Us</button>
                                            
                                         </form>
                                        <?php } ?>
                                    </div>
                            </div><br/><br/>  
                            <div class="card my-4">
                            <a href="#" data-toggle="modal" data-target="#bookNow<?php echo $row['restaurant_id'];?>" class="btn btn-primary">Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="modal" data-target="#messageUs<?php echo $row['restaurant_id'];?>" class="btn btn-primary">Message Us&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a>
                            <a href="menu2.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">Show Menu&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a><br><br>
                            <a href="tables.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">Show Tables&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a>
                            </div>
                    </div> 
                    </div>       
                      <?php } } ?>
            </div>
        </div>
</section>
       
       
      
    
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

        <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>

         <script>
        var map;
        var geocoder;
        var marker;
        

      function initMap(getbyid) {
        // var location = {lat: 10.3157, lng: 123.8854};

        var location = new google.maps.LatLng(<?php echo $byId['lat']; ?>,<?php echo $byId['lng'];  ?>);

        
        map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 12  
        });

         var marker = new google.maps.Marker({
            position: location,
            map: map
            });
            
                   
      }

    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSycgg4KWvJUmyptQTnn84wV5q0XCMKC0&callback=initMap"
    async defer></script>
    
    </body>
</html>