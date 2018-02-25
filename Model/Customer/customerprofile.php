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
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="margin-left: 20%; margin-top: 3%;">
                                <?php 
                              echo '<h5>'.$row['customer_fname'].' '.$row['customer_lname'].'</h5>';
                              $pid = $_SESSION['id'];
                              $sql = "SELECT SUM(points) FROM reservations WHERE customer_id = $pid";
                              $con = con();
                              $stmt = $con->prepare($sql);
                              $stmt->execute();
                              $view = $stmt->fetchColumn();
                            ?>
                            </div>
                            <!-- 
                          <div class="col-sm-8" style="margin-left: 18%; margin-top: 3%;"> 
                            Total Points: <?php echo $view; ?>
                          </div> -->
                            <div class="col-sm-8" style="margin-left: 30%; margin-top: 3%;">
                                <a href="editprofile.php?id=<?php echo $row['customer_id'];?>">
                                    <button type="button" class="btn btn-warning btn-sm">Edit Profile</button>
                                </a>
                                <!-- <a class="btn btn-danger btn-sm" href="../../Controller/logout.php">Log Out</a> -->
                            </div>
                            <div class="col-sm-12 profile-usermenu" style="margin-left: 20%; margin-top: 7%;">
                                <ul>
                                    <li>
                                        <a href="customerprofile.php?id=<?php echo $row['customer_id'];?>">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i> Reservation History </a>
                                    </li>
                                    <br/>
                                    <li>
                                        <a href="customerorder.php?id=<?php echo $row['customer_id'];?>">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Order History </a>
                                    </li>
                                    <br/>
                                    <li>
                                        <a href="customerpayment.php?id=<?php echo $row['customer_id'];?>">
                                            <i class="fa fa-cc-paypal" aria-hidden="true"></i> Payment History </a>
                                    </li>
                                    <br/>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 table-responsive" style="margin-top: 10%; margin-left: 1%;">
                        <h2>Reservation History</h2>
                        <br>
                        <br>

                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Reservation Number</center>
                                    </th>
                                    <th>
                                        <center>Restaurant Name</center>
                                    </th>
                                    <th>
                                        <center>Date & Time</center>
                                    </th>
                                    <th>
                                        <center>Number of Guests</center>
                                    </th>
                                    <th>
                                        <center>Special Requests</center>
                                    </th>
                                    <th>
                                        <center>Status</center>
                                    </th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      $cid = $_SESSION['id'];
                                      $sql = "SELECT * FROM reservations r, restaurants s WHERE r.restaurant_id = s.restaurant_id AND (customer_id LIKE '".$cid."%')";
                                      $sql .= "ORDER by r.reservation_date desc";

                                      $con = con();
                                      $stmt = $con->prepare($sql);
                                      $stmt->execute();
                                      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  
                                      if(count($rows) > 0){
                                      foreach($rows as $row)
                                      {
                                  ?>
                                    <tr>
                                        <td>
                                            <center>
                                                <?php echo $row['reservation_number']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $row['restaurant_name']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo date('F j, Y g:i A', strtotime($row['reservation_date'].$row['reservation_time'])); ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $row['no_of_guests'];?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $row['spec_reqs'];?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $row['res_status'];?>
                                            </center>
                                        </td>
                                        <?php if($row['res_status'] == 'Reserved' || $row['res_status'] == 'Cancelled' ||  $row['res_status'] == 'Expired' ){?>
                                            <td>
                                                <center><i class="fa fa2 fa-pencil-square-o" title="Edit"></i>
                                                    <i class="fa fa2 fa-times" title="Cancel reservation"></i></center>
                                            </td>
                                            <?php } else{?>
                                                <td>
                                                    <center><a href="#" data-toggle="modal" data-target="#editReservation<?php echo $row['reservation_id'];?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#cancelReservation<?php echo $row['reservation_id'];?>"><i class="fa fa-times" title="Cancel reservation"></i></a></center>
                                                </td>
                                                <?php } ?>

                                    </tr>
                                    <?php include('modal.php'); ?>
                                        <?php } }  ?>
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
                        $('#dataTable').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'copyHtml5',
                                'excelHtml5',
                                'csvHtml5',
                                'pdfHtml5',
                                'print'
                            ]
                        });
                        $(function() {
                            $("#datepicker").datepicker({
                                minDate: -0,
                                maxDate: "+14D",
                                changeMonth: true,
                                changeYear: true,
                                numberOfMonths: 1,
                                dateFormat: 'MM dd, yy'
                            });

                            $("#timepicker").timepicker({
                                timeFormat: 'g:i A',
                                minTime: '8:00',
                                maxTime: '24:00'
                            });
                        });
                    });
                </script>

                </body>

    </html>