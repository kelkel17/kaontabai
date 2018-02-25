<?php 

    include '../../Controller/dbconn.php';
    islogged();

?>

    <!DOCTYPE html>
    <html>
    <?php include('../header.php');?>
        <div class="divider"></div>
        <ul class="nav menu">
            <li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
            <li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class="active"><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
            <li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-header" style="float: left;margin: 10px;">Staffs</h1>
                    <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addStaff" style="float: left;margin: 10px;">Add Staff</button>
                </div>
                <?php include('staffmodal.php');?>

            </div>
            <!--/.row-->

            <div class="table-responsive">
                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr>
                            <th>
                                <center>Staff ID</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Address</center>
                            </th>
                            <th>
                                <center>Phone</center>
                            </th>
                            <th>
                                <center>Gender</center>
                            </th>
                            <th>
                                <center>SSN</center>
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
                        <tr>
                            <?php 
		   $id = $_SESSION["id"];	
        $sql = "SELECT * FROM employees WHERE (restaurant_id LIKE '".$id."%')";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result = mysqli_query($conn,$sql); 

        foreach($rows as $row)
       // while($row = mysqli_fetch_assoc($result))
        {
		   echo ' <td><center>'.$row['staff_number'].'</center></td>';
		   echo '<td><center>'.$row['employee_fname'].' '.$row['employee_mname'].' '.$row['employee_lname'].'</center></td>';
		   echo '<td><center>'.$row['employee_addr'].'</center></td>';
		   echo '<td><center>'.$row['employee_phone'].'</center></td>';
	       echo '<td><center>'.$row['employee_gender'].'</center></td>';
		   echo '<td><center>'.$row['employee_ssn'].'</center></td>';
	       echo '<td><center>	'.$row['employee_status'].'</center></td>';
	    ?>
                                <div class="cell">
                                    <td>
                                        <center>

                                            <a href="#" data-toggle="modal" data-target="#updateStaff<?php echo $row['employee_id']; ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                            </a>
                                            <?php if($row['employee_status']=="Active"){?>
                                                <a href="#" onclick="deact(<?php echo $row['employee_id'];?>);">
                                                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                                                </a>
                                                <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                <?php } elseif($row['employee_status']=="Deactivate"){?>

                                                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate"></i>
                                                    <a href="#" onclick="active(<?php echo $row['employee_id'];?>);">
                                                        <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                    </a>
                                                    <?php } ?>
                                        </center>
                                    </td>
                                </div>
                        </tr>

                        <?php include('staffmodal2.php'); }
    ?>

                    </tbody>
                </table>
            </div>

        </div>
        <!--/.main-->

        <script src="../../something/js/global.js"></script>
        <script>
            function deact(eventId) {
                swal({
                    title: "Deactivate Menu",
                    text: "Are you sure you want to deactivate this menu?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/EmployeesController/deactivatestaff.php",
                            data: {
                                'deactivate': eventId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully deactivated this menu",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "staff.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in deactivating this menu", "", "error");
                    }
                });
            }

            function active(openId) {
                swal({
                    title: "Re-activate menu",
                    text: "Are you sure you want to re-activate this menu?",
                    buttons: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/EmployeesController/deactivatestaff.php",
                            data: {
                                'activate': openId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully re-activated this menu",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "staff.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in re-deactivating this menu", "", "error");
                    }
                });
            }
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: "GET",
                    url: "../../Controller/RestaurantsController/getnotif.php",
                    dataType: 'json',
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            // console.log(data[i]);
                            var date = moment().format('LL');
                            // console.log(date);
                            var count = data[i].count;
                            var date2 = data[i].dat;
                            if (date2 == date) {
                                //	console.log(count);
                                //	console.log(date2);
                                swal("You have " + count + " new notifcation", {
                                    icon: "info"
                                });
                            }
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print']
                });
            });
        </script>

        </body>

    </html>