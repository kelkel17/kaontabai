<?php 
  
    include '../../Controller/dbconn.php';

      if(isset($_GET['cid'])){
        $data = array($_GET['cid']);
        visit($data);
      
    
?>

<input type="hidden" name="count" value="<?php ?>">
<!DOCTYPE html>
<html class="no-js" lang=""> 

  <head>

      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       
    <title>KaonTaBai!</title>

    <link href="../../something/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../something/css2/blog-post.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--    <link href="../../something/css/bootstrap.min.css" rel="stylesheet"> -->
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"> -->
       <!-- <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
<!--        <link rel="stylesheet" href="../../assets/css/bootstrap-theme.min.css">-->
 

        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
      
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />
<!--        RAtings-->
            <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />
        <link rel="stylesheet" href="../../assets/css/star.css" />

         <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
          <script src="../../assets/js/vendor/star-rating.min.js"></script>

        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>

  <body style="background-color: white;">

    
    <?php 
    
          $id = $_GET['cid'];
          $con = con();
          $sql = "SELECT * FROM restaurants  WHERE restaurant_id = $id ORDER BY visit_count ";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);               
    foreach ($rows as $row) {
        $id = $_GET['cid'];
    ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          
          <!-- Title -->
          <h1 class="mt-4"><td><?php echo $row['restaurant_name'];?>'s Restaurant</td></h1><a href="../../index.php" class="btn btn-outline-warning">Book Now&nbsp;
              <i class="fa fa-bookmark" aria-hidden="true"></i>
            </a>
          <a href="../../index.php" class="btn btn-outline-warning">Message Us&nbsp;
              <i class="fa fa-comment" aria-hidden="true"></i>
          </a>
          <a href="menu.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-outline-warning">
              Show Menu&nbsp;<i class="fa fa-comment" aria-hidden="true"></i>
          </a>
          <hr></hr>
            <!-- Message Modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="messageUs<?php echo $row['restaurant_id']; ?>">
              <div class="modal-dialog" role="document" style="z-index:1041;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Your Message!</h1>
                          <button class="close" data-dismiss="modal" type="button">
                              <span>&times;</span>
                          </button>
                      </div><!-- end modal-header -->
                      <form action="../../Controller/CustomersController/message.php" method="POST">
                        <div class="modal-body">
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
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
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
                      <h1 class="modal-title">Book Now!</h1>
                          <button class="close" data-dismiss="modal" type="button">
                              <span>&times;</span>
                          </button>
                      </div><!-- end modal-header -->
                      <form action="../../Controller/CustomersController/reservation.php?cid=<?php echo $row['restaurant_id']; ?>" method="POST">
                        <div class="modal-body">
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
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                              <input type="submit" name="submit" class="btn btn-primary hover" value="Book Now!">

                          </div><!-- end modal-footer -->
                    </form>
                  </div><!-- end modal-content --> 
              </div><!-- end modal-dialog -->
           </div><!-- end Resevation modal-->
          <!-- Preview Image -->
         <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">-->
           <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" class="img-fluid rounded" style="width:900px; height:300px;"  align="top" alt=""/>'; ?>

          <hr>

          <!-- Post Content -->
          <p><?php echo '<td>'.$row['restaurant_desc'].'</td>'; ?></p>

          <hr>
          <div class="media mb-3">
            <h2>Menu<span class="pull-right label label-default"></span></h2>
          </div>

          
          <div class="card my-4">
           <h5 class="card-header">Rate Us</h5>
               <div class="card-body">
             <?php
             $id = $_SESSION['id'];
             $resId = $row['restaurant_id'];
             $rate = doneRating($id,$resId);

             if($rate){
              ?> 
          <input value=<?php echo $rate['rate'];?> type="number" class="rating" min=0 max=5 step=0 data-size="md" data-stars="5" productId=<?php echo $resId;?> name="rate" disabled />
         <?php } else{?>    
          <form action="getstar.php?cid=<?php echo $row['restaurant_id'];?>" method="POST">
          <input value="" type="number" class="rating" min=0 max=5 step=0 data-size="md" data-stars="5" productId=<?php echo $resId;?> name="rate" />
         <button type="submit" name="submit" class="btn btn-outline-warning">Submit</button>
                   </form>
         <?php } ?>
        </div>

    </div>
        </div><br>

        <div class="col-md-4">
          <div class="card my-6">
            <h5 class="card-header">Address</h5>
            <div class="card-body">
              <span class="fa fa-map-marker" aria-hidden="true"></span> <?php echo '<td>'.$row['restaurant_addr'].'</td>'; ?>
            </div>
          </div>

          <div class="card my-4">
            <h5 class="card-header">Hours Open</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-10">
                  <span class="fa fa-clock-o" aria-hidden="true"></span> <?php echo '<td>'.date('h:m A', strtotime($row['hour_open'])).'</td>'; ?> to <?php echo '<td>'.date('h:m A', strtotime($row['hour_close'])).'</td>'; ?>(Mon-Sun)
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Contact Details</h5>
            <div class="card-body">
            <span class="fa fa-phone" aria-hidden="true"></span> <?php echo '<td>'.$row['restaurant_contact'].'</td>'; ?>
            </div>
          </div>
            
               


      </div>
        
                  
       
   <?php } } ?> 
    <!-- /.container -->

    <!-- Footer -->
    <br><footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">KaonTaBai! &copy; 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../../something/vendor/jquery/jquery.min.js"></script>
    <script src="../../something/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>
      

  </body>

</html>
