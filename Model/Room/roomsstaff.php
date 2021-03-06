<?php 

    include '../../Controller/dbconn.php';
    islogged();

?>

    <!DOCTYPE html>
    <html>
    <?php include('../header.php'); ?>
        <ul class="nav menu">
            <li class=""><a href="../Restaurant/storystaff.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class=""><a href="../Restaurant/reservationsstaff.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/eventstaff.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Restaurant/promostaff.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class="active"><a href="../Room/roomsstaff.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class=""><a href="../Food/foodstaff.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-header" style="float: left;margin: 10px;">Table Layout</h1>
                    <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addTable" style="float: left;margin: 10px;">Add a Table</button>
                </div>

                <?php include('tablemodal.php'); ?>
            </div>
            <!--/.row-->

            <div class="table-responsive">

                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr>
                            <th>
                                <center>Table Number</center>
                            </th>
                            <th>
                                <center>Minimum Capacity</center>
                            </th>
                            <th>
                                <center>Maximum Capacity</center>
                            </th>
                            <th>
                                <center>Area Description</center>
                            </th>
                            <th>
                                <center>Image</center>
                            </th>
                            <th>
                                <center>Status</center>
                            </th>
                            <!--  <th>Image</th> -->

                            <th>
                                <center>Action</center>
                            </th>

                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <?php 
        $rows = getTables(array($_SESSION['id']));

        foreach($rows as $row)  
        {
            //if($row[])

        echo '<td><center>'.$row['table_num'].'</center></td>';
        echo '<td><center>'.$row['mincapacity'].'</center></td>';
        echo '<td><center>'.$row['maxcapacity'].'</center></td>';
        echo '<td><center>'.$row['area_desc'].'</center></td>';
          echo '<td><center><img src="../../Image/'.$row['image'].'" style="width:25px; height:25px;"/></center></td>';
            if($row['status'] == 0){
                echo '<td><center>Available</center></td>'; 
            }else{
                echo '<td><center>Reserved</center></td>'; 
            }

        ?>
                                <div class="cell">
                                    <td>
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#updateTable<?php echo $row['table_id']; ?>">

                                                <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                            </a>
                                            <?php if($row['status'] == 0){?>
                                                <a href="#" onclick="deact(<?php echo $row['table_id'];?>);">
                                                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                                                </a>
                                                <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
                                                <?php }elseif($row['status'] != 0){ ?>
                                                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
                                                    <a href="#" onclick="activate(<?php echo $row['table_id'];?>);">
                                                        <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                    </a>
                                                    <?php } ?>
                                        </center>
                                    </td>
                                </div>
                        </tr>
                        <?php include('tablemodal2.php');?>

                            <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/.main-->
        <script>
            function deact(eventId) {
                swal({
                    title: "Deactivate table",
                    text: "Are you sure you want to deactivate this table?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/RestaurantsController/addtable.php",
                            data: {
                                'deact': eventId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully deactivate the table",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "rooms.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in deactivating the event", "", "error");
                    }
                });
            }

            function activate(openId) {
                swal({
                    title: "Re-activate Table",
                    text: "Are you sure you want to re-activate this table?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/RestaurantsController/addtable.php",
                            data: {
                                'activate': openId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully re-activate the table",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "rooms.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in re-activating the table ", "", "error");
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
        <script src="../../something/js/global.js"></script>
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