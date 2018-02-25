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
            <li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
            <li class="active"><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header" style="float: left;margin: 10px;">Menu</h1>
                    <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct" style="float: left;margin: 10px;">Add a Menu</button>
                </div>

                <?php include_once('foodmodal.php'); ?>
            </div>
            <!--/.row-->

            <div class="table-responsive">

                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr class="info" id="tableHeader">
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Description</center>
                            </th>
                            <th>
                                <center>Category</center>
                            </th>
                            <th>
                                <center>Type</center>
                            </th>
                            <th>
                                <center>Image</center>
                            </th>
                            <th>
                                <center>Price</center>
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

                    <tbody id="tableFooter">
                        <tr>
                            <?php 
  $id = $_SESSION['id'];
        $sql = "SELECT * FROM menus m, menu_category c WHERE m.mc_id = c.mc_id AND m.restaurant_id = '$id'";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row)  
        {
        echo '<td><center>'.$row['menu_number'].'</center></td>';
        echo '<td>'.$row['m_name'].'</td>';
        echo '<td>'.substr($row['m_desc'], 0, 50).((strlen($row['m_desc']) > 50) ? '...' : '').'</td>';
        echo '<td><center>'.$row['mc_name'].'</center></td>';
        echo '<td><center>'.$row['m_category'].'</center></td>';
        if($row['m_image'] != '')
          echo '<td><center><img src="../../Image/'.$row['m_image'].'" style="width:25px; height:25px;"></center></td>';
        else
          echo '<td><center><img src="../../Image/icon3.png" style="width:25px; height:25px;"></center></td>';
        echo '<td><center>'.$row['m_price'].'</center></td>';
        echo '<td><center>'.$row['m_status'].'</center></td>'; 

        ?>
                                <div class="cell">
                                    <td>
                                        <center>

                                            <?php if($row['m_status'] == "Available"){?>
                                                <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['menu_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
                                                <a href="#" onclick="deact(<?php echo $row['menu_id'];?>);">
                                                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                                                </a>
                                                <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
                                                <?php }elseif($row['m_status'] != "Available"){ ?>
                                                    <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['menu_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
                                                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
                                                    <a href="#" onclick="active(<?php echo $row['menu_id'];?>);">
                                                        <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                    </a>
                                                    <?php } ?>
                                        </center>
                                    </td>

                                    <?php include('foodmodal2.php');?>
                                </div>
                        </tr>

                        <?php } ?>

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
                            url: "../../Controller/FoodsController/deactivatefood.php",
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
                                    window.location = "food.php";
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
                            url: "../../Controller/FoodsController/deactivatefood.php",
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
                                    window.location = "food.php";
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