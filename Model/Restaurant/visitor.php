<?php 

    include '../../Controller/dbconn.php';
    islogged();
?>

    <!DOCTYPE html>
    <html>

    <?php include('../header.php'); ?>

        <ul class="nav menu">
        <li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
        <li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
        <li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
        <li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
        <li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
        <li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
        <li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
        <li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
        <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Visitors</h1>
                </div>
            </div>
            <!--/.row-->

            <div class="table-responsive">
                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr>
                            <!-- <th><center>Reservation ID</center></th>		 -->
                            <th>
                                <center>Customer Name</center>
                            </th>
                            <th>
                                <center>Last Visited</center>
                            </th>
                            <!-- <th><center>Special Request</center></th> -->
                            <th>
                                <center>Number of times visited</center>
                            </th>
                            <!-- <th><center>Status</center></th> -->

                            <th>
                                <center>Action</center>
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php 
			$id = $_SESSION['id'];
       		$con = con();
       		$sql = "SELECT * FROM visitors v, customers c WHERE v.customer_id = c.customer_id AND v.restaurant_id = '$id' ORDER BY v.visit_count DESC";
       		$stmt = $con->prepare($sql);
       		$stmt->execute();
       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($rows)>0)
      {
        foreach($rows as $row)

        {
        	// $total = $row['visit_count'] + $row['visit_count'];

		  	 // echo '<td><center>'.$row['reservation_number'].'</center></td>';
		   	 echo '<td><center>'.$row['customer_fname'].' '.$row['customer_lname'].'</center></td>';
		     echo '<td><center>'.date('F j, Y g:i A',strtotime($row['last_visited'])).'</center></td>';
	         // echo '<td><center>'.$row['spec_reqs'].'</center></td>'; 
	        //  echo '<td><center>'.$row['no_of_guests'].'</center></td>'; 
		     echo '<td><center>'.$row['visit_count'].'</center></td>'; 	      
	     ?>
                                <td>
                                    <center>
                                        <a href="#" data-toggle="modal" data-target="#reply<?php echo $row['customer_id'];?>"><i class="fa fa-comment" aria-hidden="true" title="Message <?php echo $row['customer_fname']?>"></i></a>
                                    </center>
                                </td>
                                <!-- <div class="cell">
                    <td><center>
                    <?php if($row['res_status'] == "Pending" || $row['res_status'] == "Cancelled"){?>	
                    	<a href="#" data-toggle="modal" data-target="#updateReservation<?php echo $row['reservation_id']; ?>">
                    		<input type="submit" class="btn btn-info btn-sm" value="Accept">
                    	</a>
                    		<input type="submit" class="btn btn-info btn-sm" value="Cancel" disabled>
                    <?php }elseif($row['res_status'] == "Reserved"){?>	
                    	<input type="submit" class="btn btn-info btn-sm" value="Accept" disabled>
                    	<a href="#" data-toggle="modal" data-target="#cancelReservation<?php echo $row['reservation_id']; ?>">
                    		<input type="submit" class="btn btn-info btn-sm" value="Cancel">
                    	</a>	
                    <?php } ?>	
                    </center>
                	</td>
               </div>  -->
                        </tr>

                        <div class="modal fade" tabindex="-1" role="dialog" id="reply<?php echo $row['customer_id'];?>">
                            <div class="modal-dialog" role="document" style="z-index:1041;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">
                                            <span>&times;</span>
                                        </button>
                                        <h1 class="modal-title">Your Message!</h1>

                                    </div>
                                    <!-- end modal-header -->
                                    <form action="../../Controller/RestaurantsController/reply.php" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                            <div class="form-group">
                                                <label for="pfrom">To:</label>
                                                <input type="text" name="customer" style="width:100%" value="<?php echo $row['customer_fname'].' '.$row['customer_lname']; ?>" id="pfrom" class="form-control" readonly>
                                                <input type="hidden" name="cid" value="<?php echo $row['customer_id']; ?>">

                                                <span class="highlight"></span><span class="bar"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="pto">From:</label>
                                                <?php 
									$res = getSingleOwner(array($_SESSION['id']));

							?>
                                                    <input type="text" name="restaurant" style="width:100%" value="<?php echo $res['restaurant_name']; ?> Restaurant" id="pto" class="form-control" readonly>
                                                    <span class="highlight"></span><span class="bar"></span>
                                            </div>
                                            <input type="hidden" name="rid" value="<?php echo $res['restaurant_id']; ?>">
                                            <div class="form-group">
                                                <label for="pmessage">Your Message</label>
                                                <textarea name="message" id="pmessage" style="width:100%" class="form-control"></textarea>
                                                <span class="highlight"></span><span class="bar"></span>
                                            </div>
                                        </div>
                                        <!-- end modal-body -->
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                            <input type="submit" name="reply" class="btn btn-primary hover" value="Message">
                                        </div>
                                        <!-- end modal-footer -->
                                    </form>
                                </div>
                                <!-- end modal-content -->
                            </div>
                            <!-- end modal-dialog -->
                        </div>
                        <!-- end Message modal-->
                        <?php }
      }  
    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/.main-->

        <script src="../../something/js/global.js"></script>
        <script type="text/javascript">
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
            });
        </script>
        </body>
    </html>