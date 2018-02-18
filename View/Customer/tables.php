<?php

    include '../../Controller/dbconn.php';
    
    viewAllOwners();
    $Resid = $_GET['cid']; 
    

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
   <?php include('header.php');?>
           <span><br></span>
           <span><br></span>
           <span><br></span>
           <span><br></span>   
<div class="container-fluid">
    <div class="row">
       
    <div class="col-lg-12" id="div0" >
           <center><h2 style="color: black;">Tables</h2></center>
     <?php $tables = getTables(array($Resid));
                 foreach($tables as $t){ ?>
       <!-- SECTION -->
                    <div class="col-sm-4 container" style="margin-bottom: 5%;">
                         <?php 
                        $filename = '../../Image/'.$t['image'].'';
                        if($t['image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $t['image']?>" class="img-responsive thumbnail" style="width: 100%; height: 300px;">
                        <?php } ?>  
                            <h4>Table Number: <?php echo $t['table_num']; ?></h4>
                            <h4>Description: <?php echo $t['area_desc']; ?></h4>
                            <h4>Min Capacity: <?php echo $t['mincapacity'];?></h4>
                            <h4>Max Capacity: <?php echo $t['maxcapacity'];?></h4>
                      
                             <?php 
                                          $con = con();
                                          $sql = "SELECT * FROM schedules WHERE restaurant_id = '$Resid' ORDER BY created DESC LIMIT 1";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          if(count($view) >= 0){
                                          foreach ($view as $rows) {
                                            if($rows['status'] == 1){ ?>
                                              <a href="#" data-toggle="modal" data-target="#notAvail<?php echo $_GET['cid'];?>" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                           <?php }
                                           if($t['status'] == 1){ ?>
                                              <a href="#" data-toggle="modal" data-target="#notAvails<?php echo $_GET['cid'];?>" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                           <?php } else { ?>
                                          <a href="#" data-toggle="modal" data-target="#bookNow<?php echo $_GET['cid'];?>" class="btn btn-primary pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                      <?php } } } ?>
                         </div>
                         <div class="modal" id="notAvail<?php echo $_GET['cid'];?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <!-- <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button> -->
                                          
                                          <h3 class="modal-title"><?php echo $row['restaurant_name'];?> doesn't allow online reservation at the moment, please do contact them for more information</h3>
                                      </div>
                                      <div class="modal-footer">
                                          <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                      </div><!-- end modal-footer -->
                                  </div>
                              </div>
                          </div>
                            <div class="modal" id="notAvails<?php echo $_GET['cid'];?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <!-- <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button> -->
                                          
                                          <h3 class="modal-title">This table has already been booked</h3>
                                      </div>
                                      <div class="modal-footer">
                                          <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                      </div><!-- end modal-footer -->
                                  </div>
                              </div>
                          </div> 
                        <!-- Reservation Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="bookNow<?php echo $_GET['cid']; ?>">
                              <div class="modal-dialog" role="document" style="z-index: 1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Sign up now to Book a reservation.</h1>
                                          
                                      </div><!-- end modal-header -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <a href="../../index.php" class="btn btn-primary">Sign up</a>
                                          </div><!-- end modal-footer -->
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Resevation modal-->

                    <?php } ?> 
                   
        </div>
      </div>
    </div>
                      
  <?php include('footer.php');?>

        <script src="../../assets/js/extension2.js"></script>
    
    </body>
</html>
