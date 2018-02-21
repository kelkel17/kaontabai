<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
     if($_SESSION['id'])
    {
       $customer = getCustomer(array($_SESSION['id']));
       foreach ($customer as $row) {

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
     
     <?php include('header.php'); ?>
 
        <div>
          <span><br></span>
          <span><br></span>
        </div>
        <section>
            <div class="container-fluid" style="margin-bottom:1%;">
                <div class="row">
                    <div class="col-lg-2" style="margin-top: 10%;">
                    <?php
                        $filename = '../Image/'.$row['customer_pic'].'';
                        if($row['customer_pic']==''){
                          if($row['customer_gender'] == 'Female'){?>
                            <img src="../../Image/icon.png" class="lol">
                                <div class="overlays">
                                    <div class="text2">Image not Found</div>
                                  </div>
                    <?php } elseif($row['customer_gender'] == 'Male'){?>
                            <img src="../../Image/icon2.png" class="lol">
                                  <div class="overlays">
                                    <div class="text2">Image not Found</div>
                                  </div>
                     <?php } } if($row['customer_pic'] != ''){?>  
                              <img src="../../Image/<?php echo $row['customer_pic'];?>" class="lol">
                    <?php } ?>
                      <div class="row">
                        <div class="col-sm-12"  style="margin-left: 18%; margin-top: 3%;"> 
                            <?php 
                              echo '<h5>'.$row['customer_fname'].' '.$row['customer_lname'].'</h5>';
                              $pid = $_SESSION['id'];
                              $sql = "SELECT SUM(points) FROM reservations WHERE customer_id = $pid";
                              $con = con();
                              $stmt = $con->prepare($sql);
                              $stmt->execute();
                              $view = $stmt->fetchColumn();
                            ?>
                          </div><!-- 
                          <div class="col-sm-8" style="margin-left: 18%; margin-top: 3%;"> 
                            Total Points: <?php echo $view; ?>
                          </div> -->
                          <div class="col-sm-8" style="margin-left: 30%; margin-top: 3%;">
                              <a href="editprofile.php?id=<?php echo $row['customer_id'];?>"><button type="button" class="btn btn-warning btn-sm">Edit Profile</button></a>
                               <!-- <a class="btn btn-danger btn-sm" href="../../Controller/logout.php">Log Out</a> -->
                          </div>
                          <div class="col-sm-12" style="margin-left: 18%; margin-top: 7%;">
                            <ul>
                              <li>
                                <a href="customerprofile.php?id=<?php echo $row['customer_id'];?>">
                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                                Reservation History </a>
                              </li><br/>
                              <li>
                                <a href="customerorder.php?id=<?php echo $row['customer_id'];?>">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                Order History </a>
                              </li><br/>
                              <li>
                                <a href="customerpayment.php?id=<?php echo $row['customer_id'];?>">
                                <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                                Payment History </a>
                              </li><br/>
                            </ul>  
                          </div>           
                      </div>                    
                    </div>
                          <div class="col-lg-9 table-responsive" style="margin-top: 10%; margin-left: 1%;">
                            <h2>Payment History</h2><br><br>
                          
                               <table id="dataTable">
                                <thead>
                                  <tr>
                                  <th><center>Payment ID</center></th>
                                    <th><center>Restaurant Name</center></th>
                                    <th><center>Reservation Number</center></th>
                                    <th><center>Order Number</center></th>
                                    <th><center>Date & Time</center></th>
                                    <th><center>Status</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php
                                      $cid = $_SESSION['id'];
                                      $sql = "SELECT o.payment_id as pay, r.restaurant_name as name, res.reservation_number as res, o.order_number as num, o.order_time as tim, o.order_status as stat FROM orders o, restaurants r, customers c, reservations res WHERE o.reservation_id = res.reservation_number AND r.restaurant_id = res.restaurant_id AND o.customer_id = c.customer_id AND c.customer_id = '$cid'";
                                      // $sql .= "ORDER by reservation_date desc";

                                      $con = con();
                                      $stmt = $con->prepare($sql);
                                      $stmt->execute();
                                      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  
                                      if(count($rows) > 0){
                                      foreach($rows as $row)
                                      {

                                          if($row['stat'] == 1){
                                              $stat = "Paid";
                                             // echo $row['name'];
                                  ?>
                                  <tr>

                                      <td><center><?php echo $row['pay']; ?></center></td>
                                      <td><center><?php echo $row['name']; ?></center></td>
                                      <td><center><?php echo $row['res']; ?></center></td>
                                      <td><center><?php echo $row['num']; ?></center></td>
                                      <td><center><?php echo date('F j, Y g:i A', strtotime($row['tim'])); ?></center></td>
                                      <!-- <td><center><?php echo $row['no_of_guests'];?></center></td>
                                      <td><center><?php echo $row['spec_reqs'];?></center></td> -->
                                      <td><center><?php echo $stat; ?></center></td>
                                      <!-- <td><center><?php echo $row['points'];?></center></td> -->
                                      

                                  </tr>
                                  <?php } } } else{?>
                                  <tr>
                                      <td>No Entry</td>
                                      <td>No Entry</td>
                                      <td>No Entry</td>
                                      <td>No Entry</td>
                                      <td>No Entry</td>
                                      
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                 </section>
       
      
		
	
    <?php include('footer.php'); ?>
     <?php } }?>
         <script>
          $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    } );
} );
        </script>
    
    </body>
</html>
