<section>
            <?php 
                $id = $_GET['cid'];
                $rows = getOwner(array($id));
                foreach ($rows as $row) {
              ?> 
           <span><br></span>
           <span><br></span>
           <span><br></span>
           <span><br></span>   
          <div class="container-fluid">
             
                <div class="row">
                    <div class="col-lg-12">
                            <span style="padding-left: 100px;"><?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" class="img-fluid rounded" style="display: block;margin-left: auto;margin-right:auto;"  align="top" alt=""/>'; ?></span>
                    </div>      
                  </div>

                   <hr/>   
                  <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                      <center><h1 class="mt-4"><?php echo $row['restaurant_name'];?>'s Restaurant</h1><br/></center>
                          <p><?php echo '<td>'.$row['restaurant_desc'].'</td>'; ?></p>
                    </div>
                  </div>
                  <hr>
                   
                  <div class="row">
                    <div class="col-lg-12">          
                              <div class="col-sm-4">
                                <h4>Hours Open</h4>
                                  <span class="fa fa-clock-o" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.date('g:i A', strtotime($row['hour_open'])).'</td>'; ?> to <?php echo '<td>'.date('g:i A', strtotime($row['hour_close'])).'</td>'; ?>(Mon-Sun) 
                                </div>
                                  <div class="col-sm-4">
                                         <h4>Contact Details</h4>
                                              <span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.$row['restaurant_contact'].'</td>'; ?><br><br>
                                               
                                    </div>
                                        <div class="col-sm-4" style="">
                                                <h4>Address
                                                  <input type="image" id="hide" src="../../Image/map.png" style="height: 25px; width: 25px;" title="Hide Map">
                                                  <input type="image" id="show" src="../../Image/map.png" style="height: 25px; width: 25px;" title="Show Map">  
                                                </h4>
                                                      <span class="fa fa-map-marker" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo '<td>'.$row['restaurant_addr'].'</td>'; ?>
                                        </div>
                                       
                      </div>
                    
              </div>
              <hr>
              <div class="row">
                    <div class="col-lg-12"> 
                       <div class="col-sm-4">
                                <div class="row">
                                  <h4>What can we do for you?</h4>
                                      <a href="menu.php?cid=<?php echo $row['restaurant_id'];?>" class="btn btn-primary">&nbsp; Menu&nbsp;<i class="fa fa-cutlery" aria-hidden="true">&nbsp;</i></a>
                                      <a href="tables.php?cid=<?php echo $row['restaurant_id'];?>" class="btn btn-primary">&nbsp; Tables&nbsp;&nbsp;</a>
                                  </div>
                
                                  <div class="row">
                                    <br/>
                                    <?php include('bookmodal.php'); 
                                          $id = $row['restaurant_id'];
                                          $con = con();
                                          $sql = "SELECT * FROM schedules WHERE restaurant_id = '$id' ORDER BY created DESC LIMIT 1";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          if(count($view) >= 0){
                                          foreach ($view as $rows) {
                                            if($rows['status'] == 1){ ?>
                                              <a href="#" data-toggle="modal" data-target="#notAvail<?php echo $rows['restaurant_id'];?>" class="btn btn-danger">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                           <?php } else { ?>
                                          <a href="#" data-toggle="modal" data-target="#bookNow<?php echo $row['restaurant_id'];?>" class="btn btn-primary">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                      <?php } } } ?>
                                      <a href="#" data-toggle="modal" data-target="#messageUs<?php echo $row['restaurant_id'];?>" class="btn btn-primary">&nbsp;Message Us&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a>
                                  </div>
                              </div>
                            <div class="col-sm-4">
                                  <h4>Thank you for rating us</h4>
                                 
                                 <?php
                                         $resId = $row['restaurant_id'];
                                         $rate = getRate($resId);
                                      ?>
                                        <input value=<?php echo $rate?> type="number" id="rate" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId=<?php echo $resId;?> disabled>
                              </div>
                            <div class="col-sm-4">
                              <h4>Map View</h4>
                              <div class="row" id="mp3">
                                    <?php
                                      $lnglat = getLL();
                                      $lnglat = json_encode($lnglat,true);
                                      
                                          echo '<div id="data" style="display:none;">'.$lnglat.'</div>';

                                          // $latlng = getMap();
                                          // $latlng = json_encode($latlng,true);
                                          
                                          // echo '<div id="alldata" style="display:none;">'.$latlng.'</div>';
                                          $byId = getMapbyId($id);
                                          // $byId = json_encode();
                                          foreach($byId as $r) {
                                          echo '<div id="getbyid" style="display:none;">'.$r.'</div>';
                                        }
                                    ?>
                                     <div id="map" style="width: 100%; height: 350px"></div>          
                                </div>
                            </div>  
                      </div>
                  </div>
                  <hr>                             
        </div>
         <?php } ?>
</section>
       