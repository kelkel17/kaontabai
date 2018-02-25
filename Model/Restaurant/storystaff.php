<?php 

    include '../../Controller/dbconn.php';
    islogged();
?>

    <!DOCTYPE html>
    <html>
    <?php include('../header.php'); ?>

        <ul class="nav menu">
            <li class="active"><a href="../Restaurant/storystaff.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class=""><a href="../Restaurant/reservationsstaff.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/eventstaff.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Restaurant/promostaff.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class=""><a href="../Room/roomsstaff.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class=""><a href="../Food/foodstaff.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Orders</h1>
                </div>
            </div>
            <!--/.row-->

            <div class="table-responsive">

                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr class="info">
                            <th>
                                <center>Reservation ID</center>
                            </th>
                            <th>
                                <center>Order ID</center>
                            </th>
                            <th>
                                <center>Payment ID</center>
                            </th>
                            <th>
                                <center>Customer Name</center>
                            </th>
                            <th>
                                <center>Order Date & Time</center>
                            </th>
                            <th>
                                <center>Total Payment</center>
                            </th>
                            <th>
                                <center>Label</center>
                            </th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <?php 
			$id = $_SESSION['id'];
       		$con = con();
       		$sql = "SELECT * FROM restaurants as res, reservations as r, orders as o, customers as c, order_details as od WHERE od.order_id = o.order_id AND res.restaurant_id = o.restaurant_id AND o.customer_id = c.customer_id AND o.restaurant_id = '$id' GROUP BY o.order_id desc";
       		$stmt = $con->prepare($sql);
       		$stmt->execute();
       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
       		 if(count($rows)>0)
      {
        foreach($rows as $row)

        {
			date_default_timezone_set('Asia/Manila');
			$date = date('Y-m-d g');
			$newdate = date('Y-m-d g', strtotime($row['order_time']));
			$order = $row['order_id'];
			if($date > $newdate && $row['status'] != 'Cancelled'){
				$status = "Served";
				$data = array($status, $order);
				orderStatus($data);
			}	
		  	 echo '<td><center>'.$row['reservation_number'].'</center></td>';
		  	 echo '<td><center>'.$row['order_number'].'</center></td>';
		  	 echo '<td><center>'.$row['payment_id'].'</center></td>';
		   	 echo '<td><center>'.$row['customer_fname'].' '.$row['customer_lname'].'</center></td>';
		     echo '<td><center>'.date('F j, Y g:i A',strtotime($row['order_time'])).'</center></td>';
		     echo '<td><center>&#8369; '.number_format($row['total_price'],2).'</center></td>';
		     echo '<td><center>'.$row['status'].'</center></td>';;    
	     ?>
                                <div class="cell">
                                    <td>
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#viewOrder<?php echo $row['order_id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                                            <?php if($row['status'] == 'Queueing'){?>
                                                <a href="#" onclick="ready(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-thumbs-o-up" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is ready to be serve"></i></a>
                                                <a href="#" onclick="cook(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa fa-cutlery" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is being cook"></i></a>
                                                <a href="#" onclick="served(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-check" aria-hidden="true" title="Change status to SERVED"></i></a>
                                                <a href="#" onclick="cancel(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-times" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order has been cancelled"></i></a>
                                                <?php } else if($row['status']=='Ready'){?>
                                                    <i class="fa fa2 fa-thumbs-o-up" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is ready to be serve"></i>
                                                    <i class="fa fa2 fa-cutlery" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is being cook"></i>
                                                    <a href="#" onclick="served(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-check" aria-hidden="true" title="Change status to SERVED"></i></a>
                                                    <a href="#" onclick="cancel(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-times" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order has been cancelled"></i></a>
                                                    <?php } elseif($row['status']=='Cooking'){?>
                                                        <a href="#" onclick="ready(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>'),('<?php echo $row['customer_fname'];?>');"><i class="fa fa-thumbs-o-up" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is ready to be serve"></i></a>
                                                        <i class="fa fa2 fa-cutlery" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is being cook"></i>
                                                        <a href="#" onclick="served(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-check" aria-hidden="true" title="Change status to SERVED"></i></a>
                                                        <a href="#" onclick="cancel(<?php echo $row['order_id'];?>,'<?php echo $row['customer_fname'];?>','<?php echo $row['customer_lname'];?>');"><i class="fa fa-times" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order has been cancelled"></i></a>
                                                        <?php } elseif($row['status']=='Served' || $row['status']=='Cancelled'){?>
                                                            <i class="fa fa2 fa-thumbs-o-up" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is ready to be serve"></i>
                                                            <i class="fa fa2 fa-cutlery" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that his order is being cook"></i>
                                                            <i class="fa fa2 fa-check" aria-hidden="true" title="Change status to SERVED"></i>
                                                            <i class="fa fa2 fa-times" aria-hidden="true" title="Notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that has been cancelled"></i>
                                                            <?php } ?>
                                        </center>
                                    </td>

                                </div>
                        </tr>
                        <?php include('../Food/editmodal.php'); ?>
                            <?php }
      }  
    ?>

                    </tbody>
                </table>

            </div>
            <!--/.main-->

            <script src="../../something/js/global.js"></script>
            <script>
                $(document).ready(function() {
                    $.ajax({
                        type: "GET",
                        url: "../../Controller/RestaurantsController/getorder.php",
                        dataType: 'json',
                        success: function(data) {
                            for (var i = 0; i < data.length; i++) {
                                //	console.log(data[i]);
                                var date = moment().format('LL');
                                var date2 = moment(data[i].dat).format('LL');
                                var count = data[i].count;
                                //console.log(date);
                                //console.log(date2);
                                //console.log(count);
                                if (date != date2) {
                                    // swal("You have "+date2+" pending reservation",{
                                    //     icon: "info"
                                    // });
                                } else {
                                    swal("As of today you have " + count + " queueing orders", {
                                        icon: "info"
                                    });
                                }
                            }
                        }
                    });
                });
            </script>
            <script>
                function ready(eventId, fname, lname) {
                    swal({
                        title: "Notify " + fname + " " + lname,
                        text: "Are you sure you want to " + fname + " " + lname + " that his/her order is ready to be serve?",
                        buttons: true,
                        dangerMode: true,
                        icon: "warning"
                    }).then(function(value) {
                        if (value) {
                            // alert(eventId);
                            $.ajax({
                                type: "post",
                                url: "../../Controller/RestaurantsController/cooking.php",
                                data: {
                                    'ready': eventId
                                },
                                cache: false,
                                success: function(response) {
                                    swal({
                                        title: "Succesfully notified " + fname + " " + lname,
                                        text: "",
                                        icon: "success"
                                    }).then(function() {
                                        window.location = "story.php";
                                    });
                                }
                            });
                        } else {
                            swal("Error in notifying " + fname + " " + lname, "", "error");
                        }
                    });
                }

                function cook(openId, fname, lname) {
                    swal({
                        title: "Notify " + fname + " " + lname,
                        text: "Are you sure you want to " + fname + " " + lname + " that his/her order is now being cook?",
                        buttons: true,
                        dangerMode: true,
                        icon: "warning"
                    }).then(function(value) {
                        if (value) {
                            // alert(eventId);
                            $.ajax({
                                type: "post",
                                url: "../../Controller/RestaurantsController/cooking.php",
                                data: {
                                    'cook': openId
                                },
                                cache: false,
                                success: function(response) {
                                    swal({
                                        title: "Succesfully notified " + fname + " " + lname,
                                        text: "",
                                        icon: "success"
                                    }).then(function() {
                                        window.location = "story.php";
                                    });
                                }
                            });
                        } else {
                            swal("Error in notifying " + fname + " " + lname, "", "error");
                        }
                    });
                }

                function served(openId, fname, lname) {
                    swal({
                        title: "Notify " + fname + " " + lname,
                        text: "Are you sure you want to " + fname + " " + lname + " that his/her order has been served?",
                        buttons: true,
                        dangerMode: true,
                        icon: "warning"
                    }).then(function(value) {
                        if (value) {
                            // alert(eventId);
                            $.ajax({
                                type: "post",
                                url: "../../Controller/RestaurantsController/cooking.php",
                                data: {
                                    'served': openId
                                },
                                cache: false,
                                success: function(response) {
                                    swal({
                                        title: "Succesfully notified " + fname + " " + lname,
                                        text: "",
                                        icon: "success"
                                    }).then(function() {
                                        window.location = "story.php";
                                    });
                                }
                            });
                        } else {
                            swal("Error in notifying " + fname + " " + lname, "", "error");
                        }
                    });
                }

                function cancel(openId, fname, lname) {
                    swal({
                        title: "Notify " + fname + " " + lname,
                        text: "Are you sure you want to " + fname + " " + lname + " that his/her order has been cancelled?",
                        buttons: true,
                        dangerMode: true,
                        icon: "warning"
                    }).then(function(value) {
                        if (value) {
                            // alert(eventId);
                            $.ajax({
                                type: "post",
                                url: "../../Controller/RestaurantsController/cooking.php",
                                data: {
                                    'cancel': openId
                                },
                                cache: false,
                                success: function(response) {
                                    swal({
                                        title: "Succesfully notified " + fname + " " + lname,
                                        text: "",
                                        icon: "success"
                                    }).then(function() {
                                        window.location = "story.php";
                                    });
                                }
                            });
                        } else {
                            swal("Error in notifying " + fname + " " + lname, "", "error");
                        }
                    });
                }
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#dataTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print']
                    });
                });
            </script>
            <script>
                function printDiv(el) {
                    var printContents = document.getElementById(el).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
            </script>
            </body>

    </html>