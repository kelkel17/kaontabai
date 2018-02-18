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
    
         <?php include('header.php');?>
      
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
                           
                           
                          
                           <!-- Preview Image -->
                           <div>
                            <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" class="img-fluid rounded" style="display: block;margin-left: auto;margin-right:auto;"  align="top" alt=""/>'; ?>
                        </div>
                            <hr/>   
                            <div>
                            <p><?php echo '<td>'.$row['restaurant_desc'].'</td>'; ?></p>
                            </div>
                            <hr/>
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
                        <div class="abouts_content" style="margin-top: ;">
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
                                            <a href="menu2.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">Menu&nbsp;<i class="fa fa-cutlery" aria-hidden="true"></i></a>
                                                                                </div>
                            </div><br/>  
                            <div class="card my-4">
                            <?php 
                                $id = $row['restaurant_id'];
                                $con = con();
                                $sql = "SELECT * FROM schedules WHERE restaurant_id = '$id' ORDER BY created DESC LIMIT 1";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();
                                $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if(count($view) >= 0){
                                foreach ($view as $row) {
                                  if($row['status'] == 1){ ?>
                                    <a href="#" data-toggle="modal" data-target="#notAvail<?php echo $row['restaurant_id'];?>" class="btn btn-primary">Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                 <?php } else { ?>
                                <a href="#" data-toggle="modal" data-target="#bookNow<?php echo $row['restaurant_id'];?>" class="btn btn-primary">Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                            <?php } } } ?>
                            <a href="#" data-toggle="modal" data-target="#messageUs<?php echo $row['restaurant_id'];?>" class="btn btn-primary">Message Us&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a>
                            <a href="tables.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">Show Tables</a>

                            </div><br/>
                            <div class="card my-4">
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
        <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
          
        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="../../assets/js/vendor/star-rating.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="../../Samples/js/jquery.min.js"></script> -->
        <script src="../../assets/js/jquery-ui.js"></script>
        <script src="../../assets/js/extension2.js"></script>
        <!-- maps -->

         <script>
        var map;
        var geocoder;
        var marker;
        

      function initMap(getbyid) {
        // var location = {lat: 10.3157, lng: 123.8854};

        var location = new google.maps.LatLng(<?php echo $byId['lat']; ?>,<?php echo $byId['lng'];  ?>);
           var iconBase = '../../Image/';
          var icons = {
            restaurant: {
              icon: iconBase + 'restaurant.png'
            }
          };
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: location,

          zoom: 12  
        });

         var marker = new google.maps.Marker({
            position: location,
            icon: icons['restaurant'].icon,
            map: map
            });
            
                   
      }

    </script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSycgg4KWvJUmyptQTnn84wV5q0XCMKC0&callback=initMap"
    async defer></script>
    
    </body>
</html>