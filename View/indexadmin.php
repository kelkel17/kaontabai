<?php 

    include('../Controller/dbconn.php');

    islogged();
    
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
    $asd = date('g:i A');
    $test = getSingleOwner(array($_SESSION['id']));
    $max = date('g:i A',strtotime($test['hour_close']));
    if($asd >= $max){
        changetTemp(array($_SESSION['id']));    
    }
    $owner = getOwner(array($_SESSION['id']));
    foreach($owner as $row){
        $exp = date('Y-m-d', strtotime($row['sub_exp']));
        if($exp == $date){
            $status = 0;
            $data = array($status, $_SESSION['id']);
            ownerStatus($data);
        }
    }

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KaonTaBai!</title>

        <link href="../something/css/bootstrap.min.css" rel="stylesheet">
        <link href="../something/css/font-awesome.min.css" rel="stylesheet">
        <link href="../something/css/datepicker3.css" rel="stylesheet">
        <link href="../something/css/styles.css" rel="stylesheet">
        <link href="../something/css/datatable.css" rel="stylesheet">
        <style type="text/css">
            #chart-container {
                width: 100%;
                height: 30%;
            }
        </style>
        <script src="../something/js/jquery.min.js"></script>

        <!-- <script src="../something/js/jquery-1.11.1.min.js"></script> -->
        <script src="../something/js/bootstrap.min.js"></script>
        <script src="../samples/js/chart.min.js"></script>
        <script src="../something/js/chart-data.js"></script>
        <script src="../something/js/datatable.js"></script>
        <script src="../something/js/easypiechart.js"></script>
        <script src="../something/js/easypiechart-data.js"></script>
        <script src="../something/js/bootstrap-datepicker.js"></script>
        <script src="../something/js/moment.js"></script>
        <script src="../something/js/sweetalert.min.js"></script>
        <script src="../something/js/custom.js"></script>
        <script src="../samples/js/app.js"></script>
        <link rel="shortcut icon" href="../assets/img/logo.png">

        </script>
    </head>

    <body>
        <!--
<div id="asd"> -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>KaonTaBai</span>Admin</a>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-envelope"></em><span class="label label-danger count"></span>

                            </a>
                            <ul class="dropdown-menu  dropdown-messages">

                            </ul>

                            <!-- start of notification -->
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                    <em class="fa fa-bell"></em><span class="label label-info count"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="#">
                                            <?php
												$id = $_SESSION['id'];
									       		$con = con();
									       		$sql = "SELECT date_time_receive ,COUNT(mes_status) as total FROM messages WHERE mes_status = 'Unread' and restaurant_id = $id ORDER BY date_time_receive desc";
									       		//$sql .= "";
									       		$stmt = $con->prepare($sql);
									       		$stmt->execute();
									       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									       		date_default_timezone_set('Asia/Manila');
									       		$date = date('g:i A');
									       		foreach ($rows as $row) {
									       			$date = date('g:i A',strtotime($row['date_time_receive']));
									  		?>
                                                <div><em class="fa fa-envelope"></em>
                                                    <?php echo $row['total'];?> New Message
                                                        <span class="pull-right text-muted small"><?php  echo time_ago($date);?></span></div>
                                                <?php } $con = null; ?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="../Model/Restaurant/reservations.php">
                                            <?php
												$id = $_SESSION['id'];
									       		$con = con();
									       		$sql = "SELECT COUNT(res_status) as total, created FROM reservations WHERE res_status = 'Pending' and restaurant_id = $id ORDER BY created DESC";
									       		$stmt = $con->prepare($sql);
									       		$stmt->execute();
									       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
									       		foreach ($rows as $row) {
									       				$date = date('g:i A',strtotime($row['created']));

									  		?>
                                                <div><em class="fa fa-bookmark"></em>
                                                    <?php echo $row['total']; ?> Pending Reservations
                                                        <span class="pull-right text-muted small"><?php echo time_ago($date); ?></span></div>
                                                <?php } $con = null;?>
                                        </a>
                                    </li>
                                    
                                    <!-- <li class="divider"></li>
											<li><a href="#">
												<div><em class="fa fa-user"></em> 5 New Followers
													<span class="pull-right text-muted small">4 mins ago</span></div>
											</a></li> -->
                                </ul>
                            </li>
                        </li>
                    </ul>
                    <!-- end of notification -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <?php 
					$owner = getOwner(array($_SESSION['id']));
					if (count($owner) > 0) {
						foreach ($owner as $row) {

				?>
                    <div class="profile-userpic">
                        <img src="../Image/<?php echo $row['restaurant_logo'];?>" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle">

                        <div class="profile-usertitle-name">
                            <?php echo $row['restaurant_name'];?>
                        </div>
                        <div class="profile-usertitle-status"><span class="indicator label-success"></span><a href="updaterestaurant.php?id=<?php echo $row['restaurant_id'];?>">Edit Restaraunt </a>
                            <?php 		}
					}

			?>
                        </div>
                    </div>
                    <div class="clear"></div>

            </div>
            <div class="divider"></div>
            <ul class="nav menu">
                <li class=""><a href="../Model/Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
                <li class=""><a href="../Model/Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
                <li class=""><a href="../Model/Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
                <li class=""><a href="../Model/Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
                <li class=""><a href="../Model/Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
                <li class=""><a href="../Model/Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
                <li class=""><a href="../Model/Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
                <li class=""><a href="../Model/Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu  </a></li>
                <li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Main Admin</h1>
                </div>
            </div>
            <!--/.row-->

            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-opencart color-red" title="View all Orders"></em></a>
                                <?php 
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT COUNT(*) FROM orders WHERE restaurant_id = $id";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchColumn(); ?>
                                    <div class="large">
                                        <?php echo $rows?>
                                    </div>
                                    <div class="text-muted">Total Orders</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><a href="../Model/Restaurant/reservations.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-bookmark color-red" title="View all Reservations"></em></a>
                                <?php 
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT COUNT(*) FROM reservations WHERE restaurant_id = $id";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchColumn(); ?>
                                    <div class="large">
                                        <?php echo $rows?>
                                    </div>
                                    <div class="text-muted">Total Reservations</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-area-chart color-teal" title="View all Reports"></em></a>
                                <?php 
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT SUM(total_price) as total FROM orders WHERE restaurant_id = $id";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetch(); 
								$date = date('F Y');
					       		 ?>
                                    <div class="large">&#8369;
                                        <?php echo number_format($rows['total'],2);?>
                                    </div>
                                    <div class="text-muted">Total Sales as of
                                        <?php echo $date;?>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget">
                            <div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-eye color-teal" title="View all people who visited your restaurant"></em></a>
                                <?php 
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT count(visit_id) as total FROM visitors WHERE restaurant_id = $id	";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetch(); 
								if($rows['total'] != 0){
					       		 ?>
                                    <div class="large">
                                        <?php echo $rows['total'];?>
                                    </div>
                                    <?php } else{ ?>
                                        <div class="large">0</div>
                                        <?php } ?>
                                            <div class="text-muted">People who viewed your restaurant</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.row-->
            </div>
            <div class="panel panel-container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel panel-teal panel-widget">
                            <div class="row no-padding"><em class=""></em>
                                <div class="col-lg-4">
                                    <div class="input-group">

                                        <label for="filter" class="pull-left m-t-5 m-r-5">Filter by: </label>
                                        <select name="filter" id="filter" class="form-control float-right w-25 m-b-40">
                                            <option value="0">Menu Sales</option>
                                            <option value="1">Over All Reports</option>
                                            <option value="2">Daily Reports</option>
                                            <option value="3">Monthly Reports</option>
                                        </select>

                                    </div>
                                    <br/>
                                </div>
                                <div class="large">Reports
                                    <br/>
                                </div>
                                <div id="div0">
                                <div id="chart-sales">
                                    <canvas id="mycanvas8"></canvas>
                                </div>
                                <form method="post">
                                    <select name="menu" id="menuid">
                                    <?php 
                                        $menu = viewAllProducts();
                                        foreach ($menu as $row) {
                                            if($row['restaurant_id'] == 1){
                                    ?>
                                            <option value="<?php echo $row['menu_id']; ?>"><?php echo $row['menu_id']; ?>.<?php echo $row['m_name']; ?></option>
                                            <?php } }?>
                                    </select>
                                    <input type="text" name="sdate" id="start">
                                    <input type="text" name="edate" id="end">
                                </form>	
                                    <button type="submit" value="Sales" id="getsales" name="sales">Sales</button>
                                
                                </div>
                                <div id="div2">
                                    <div id="chart-container">
                                        <!-- Daily Sales -->
                                        <canvas id="mycanvas"></canvas>
                                    </div>
                                    <div id="chart-container">
                                        <!-- Daily Total Product Sold -->
                                        <canvas id="mycanvas2"></canvas>
                                    </div>
                                    <div id="chart-container">
                                        <!-- Daily Total Order -->
                                        <canvas id="mycanvas6"></canvas>
                                    </div>
                                </div>
                                <br/>

                                <div id="div1">
                                    <div id="chart-container">
                                        <!-- Total Sold Per Product (OVER ALL REPORT) -->
                                        <canvas id="mycanvas3"></canvas>
                                    </div>
                                </div>
                                <br/>

                                <div id="div3">
                                    <div id="chart-container">
                                        <!-- Monthly Sales -->
                                        <canvas id="mycanvas4"></canvas>
                                    </div>
                                    <div id="chart-container">
                                        <!-- Monthly Sold Product -->
                                        <canvas id="mycanvas7"></canvas>
                                    </div>
                                    <div id="chart-container">
                                        <!-- Monthly Total Order -->
                                        <canvas id="mycanvas5"></canvas>
                                    </div>
                                </div>
                                <br/>

                                <div class="text-muted"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.row
		</div>  -->

            </div>
            <!-- /.main  -->
        </div>
        <!-- </div>  -->

        <?php
	 	$rid = $_SESSION['id'];
	 	  $lnglat = getLngLat($rid);
                        $lnglat = json_encode($lnglat,true);

                        echo '<div id="data"  style="display:none">'.$lnglat.'</div>';
        				echo '<div id="map" style="height:200px; width:80%; display:none"></div>';
                        ?>

    </body>

    </html>
    <!-- MAPS -->
    <script>
        var map;
        var geocoder;
        var marker;

        function initMap() {
            var location = {
                lat: 10.3157,
                lng: 123.8854
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 8
            });

            marker = new google.maps.Marker({
                position: location,
                map: map
            });

            var cdata = JSON.parse(document.getElementById('data').innerHTML);
            geocoder = new google.maps.Geocoder();
            codeAddress(cdata);

        }

        function codeAddress(cdata) {
            Array.prototype.forEach.call(cdata, function(data) {
                var address = data.restaurant_name + ' ' + data.restaurant_addr;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == 'OK') {
                        map.setCenter(results[0].geometry.location);
                        //                alert(map.getCenter().lng()); 
                        var points = {};
                        points.id = data.restaurant_id;
                        points.lat = map.getCenter().lat();
                        points.lng = map.getCenter().lng();
                        updateLocation(points);
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });
        }

        function updateLocation(points) {
            $.ajax({
                    url: "../Controller/RestaurantsController/action.php",
                    method: "post",
                    data: points,
                    success: function(res) {
                        console.log(res);
                    }
                })
                //        console.log(points)
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSycgg4KWvJUmyptQTnn84wV5q0XCMKC0&callback=initMap" async defer></script>

    <script>
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "../Controller/RestaurantsController/fetch.php",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-messages').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                        //setTimeout(function() {}, 1000);
                    }

                }
            });
        }
        load_unseen_notification();
        $('#message_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#message').val() != '') {
                var form_data = $(this).serialize();
                $.ajax({
                    url: "../Controller/CustomersController/message.php",
                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        $('#message_form')[0].reset();
                        load_unseen_notification();
                    }
                });
            } else {
                alert("Both Fields are Required");
            }
        });
        $(document).on('click', '.dropdown-toggle', function() {

            load_unseen_notification('yes');
            $('.count').html('');

        });
        setInterval(function() {
            load_unseen_notification();

        }, 5000);
    </script>
    <script>
        for (var j = 0; j < 4; j++) {
            if (j == 0) {
                document.getElementById('div' + j).style.display = '';
                console.log(j);
            } else {
                document.getElementById('div' + j).style.display = 'none';
                console.log(j);
            }
        }
        var opt = document.getElementById('filter');
        opt.onchange = function() {
            //document.getElementById('div0').style.display = 'none';
            for (var i = 0; i < 4; i++) {
                // alert(i);
                document.getElementById('div' + i).style.display = 'none';
            }
            document.getElementById('div' + this.value).style.display = '';
        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../Controller/RestaurantsController/getnotif.php",
                dataType: 'json',
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        // console.log(data[i]);
                        var date = moment().format('LL');
                        var newdate = moment(data[i].dat).format('LL');
                        // console.log(date);
                        var count = data[i].count;
                        
                            swal("You have " + count + " new notifcation", {
                                icon: "info"
                            });
                    }
                }
            });
        });
    </script>
    <script>
			var date = new Date();
			$('#chart-sales').hide();
				date.setDate(date.getDate());
						
			$('#start').datepicker({
				format: 'MM dd, yyyy',
                startDate: '-0d',
			});
			$('#end').datepicker({
				format: 'MM dd, yyyy',
                startDate: '-0d',
			});
			$('#getsales').click(function(){
				var s = $('#start').val();
				var e = $('#end').val();
				var id = $('#menuid').val();
		
				$(document).ready(function(){
				$.ajax({
					url: "../Samples/getsomething.php",
					method: "POST",
					dataType: 'json',
					data: {	'menuid': id,
								'start': s,
								'end' : e	
						},
					success: function(data) {
						console.log(data);
						var test = [];
						var cs = [];
						var sd = [];
						//var dout = Date.parse(test);
						for(var i in data) {
							//console.log(new Date(data[i].tim).toDateString());
							test.push("Sales as of " + new Date(data[i].daytime).toDateString());
							cs.push(data[i].total);
							
						}
						sd = data[i].name;
						var myChart = {

								labels: test,
								datasets: [{
									label: sd,
									fill: false,
									data: cs,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255,99,132,1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							};
						var ctx = $("#mycanvas8");

						var barGraph = new Chart(ctx, {
							type: 'bar',
							data: myChart,
							options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							}
							}
						});

					$('#chart-sales').show();
					},
					error: function(data) {
						console.log(data);
					}
				});
			});
			});
        </script>
			