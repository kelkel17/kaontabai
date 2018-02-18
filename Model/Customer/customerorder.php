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

 <html class="no-js" lang="en"> 
          <?php include('header.php'); ?>
        <div>
          <span><br></span>
          <span><br></span>
        </div>                           
        <section>
            <div class="container-fluid" style="margin-bottom:3%;">
                <div class="row">
                    <div class="col-lg-2" style="margin-top: 10%;">
                      <div class="col-sm-12" style="margin-left:">
                    <?php
                        $filename = '../Image/'.$row['customer_pic'].'';
                          if($row['customer_pic']=='' || !(file_exists($filename))){
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
                       <?php } } else{?>  
                                <img src="../../Image/<?php echo $row['customer_pic'];?>" class="lol">
                      <?php } ?>
                      </div>
                      <div class="row">
                        <div class="col-sm-12"  style="margin-left: 20%; margin-top: 3%;"> 
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
                          <div class="col-sm-12 profile-usermenu" style="margin-left: 20%; margin-top: 7%;">
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
                              <h2>Order History</h2>

                               <table id="dataTable">
                                <thead>
                                  <tr>
                                  <th><center>Order Number</center></th>
                                  <th><center>Restaurant Name</center></th>
                                    <th><center>Date & Time</center></th>
                                    <!-- <th><center>Name of Product</center></th> -->
                                    <!-- <th><center>Quantity</center></th> -->
                                    <th><center>Total Price</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Action</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php
                                      $cid = $_SESSION['id'];

                                      $sql = "SELECT SUM(od.order_qty) as total, o.order_number as num, r.restaurant_name as name, o.order_time as tim, o.status as stat, o.total_price as pr, o.order_id, o.reservation_id, o.order_status, o.payment_id, c.customer_fname FROM orders o, menus m, customers c, order_details od, restaurants r, reservations res WHERE m.menu_id = od.menu_id AND o.reservation_id = res.reservation_number AND o.order_id = od.order_id AND res.restaurant_id = r.restaurant_id AND o.customer_id = c.customer_id AND o.customer_id = '$cid' GROUP BY o.order_number";
                                      $con = con();
                                      $stmt = $con->prepare($sql);
                                      $stmt->execute();
                                      $r = $stmt->fetchAll(PDO::FETCH_ASSOC);  
                                      if(count($r) > 0){
                                        foreach ($r as $rows) {
                                  ?>
                                  <tr>
                                      <td><center><?php echo $rows['num']; ?></center></td>
                                      <td><center><?php echo $rows['name']; ?></center></td>
                                      <td><center><?php echo date('F j, Y g:i A', strtotime($rows['tim'])); ?></center></td>
                                      <td><center>&#8369; <?php echo number_format($rows['pr'],2);?></center></td>
                                      <td><center><?php echo $rows['stat'];?></center></td>
                                      <td><center><a href="#" data-toggle="modal" data-target="#viewOrder<?php echo $rows['order_id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                                      </center></td>

                                  </tr>
                                  <?php include('modal.php');?> 
                                  <?php }} else{?>
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
<!--     <a class="a">Some Link
<div><img src="/you/image" /></div>
</a> -->
       
      
		
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
