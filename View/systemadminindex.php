<?php 
	
    include('../Controller/dbconn.php');

    isloggedsa();
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
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
    <link rel="stylesheet" href="../something/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="../something/css/jquery-ui.css">
	<link rel="stylesheet" href="../assets/css/jquery.timepicker.min.css" />
	<style type="text/css">
		#chart-container {
        width: 100%;
        height: 30%;
      }
	</style>
	<script src="../something/js/jquery.min.js"></script>

	
	<!-- <script src="../something/js/jquery-1.11.1.min.js"></script> -->
	<script src="../something/js/bootstrap.min.js"></script>
	<script src="../something/js/bootstrap-datepicker.js"></script>
	<script src="../something/js/custom.js"></script>
	<script src="../something/js/jquery.dataTables.min.js"></script>
    <script src="../something/js/dataTables.buttons.min.js"></script>
    <script src="../something/js/jszip.min.js"></script>
    <script src="../something/js/pdfmake.min.js"></script>    
    <script src="../something/js/buttons.print.min.js"></script> 
    <script src="../something/js/buttons.html5.min.js"></script> 
        <script src=" ../something/js/moment.js"></script>
    <script src="../something/js/sweetalert.min.js"></script>

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
				<a class="navbar-brand" href="#"><span>KaonTaBai</span>SystemAdmin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						 <em class="fa fa-envelope"></em><span class="label label-danger count"></span>
						 	
					</a>
						<ul class="dropdown-menu  dropdown-messages">
							
							
						</ul>
						
						<!-- start of notification -->
						 <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
										<em class="fa fa-bell"></em><span class="label label-info count"></span>
									</a>
									
										<ul class="dropdown-menu dropdown-alerts">
											<li><a href="#">
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
												<div><em class="fa fa-envelope"></em><?php echo $row['total'];?> New Message
													<span class="pull-right text-muted small"><?php  echo time_ago($date);?></span></div>
											<?php } $con = null; ?>
											</a></li>
											<li class="divider"></li>
											<li><a href="../Model/Restaurant/reservations.php">
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
												<div><em class="fa fa-bookmark"></em><?php echo $row['total']; ?> Pending Reservations  
													<span class="pull-right text-muted small"><?php echo time_ago($date); ?></span></div>
											<?php } $con = null;?>
											</a></li>
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
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<?php 
					$admin = getAdmin(array($_SESSION['id']));
					if (count($admin) > 0) {
						foreach ($admin as $row) {
								
				?>
			<div class="profile-userpic">
				<img src="../Image/icon2.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
			
				<div class="profile-usertitle-name"><?php echo $row['admin_name'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>
				<?php 		}
					}
			?>
				</div>
			</div>
			<div class="clear"></div>

		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			
			<li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

 	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">System Admin</h1>
			</div>
		</div><!--/.row-->
		
	 	<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-opencart color-red" title="View all Orders"></em></a>
							<?php 
					       		$con = con();
					       		$sql = "SELECT COUNT(*) FROM restaurants WHERE restaurant_status = 1";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchColumn(); ?>
							<div class="large"><?php echo $rows?></div>
							<div class="text-muted">Total Subscribing Restaurants</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-area-chart color-teal" title="View all Reports"></em></a>
							<?php 
					       		$con = con();
					       		$sql = "SELECT COUNT(*) FROM customers";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchColumn(); ?>
							<div class="large"><?php echo $rows?></div>
							<div class="text-muted">Total Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><a href="../Model/Restaurant/visitor.php?id=<?php echo $_SESSION['id']?>"><em class="fa fa-xl fa-area-chart color-teal" title="View all Reports"></em></a>
							<?php 
					       		$con = con();
					       		$sql = "SELECT SUM(total_price) as total FROM transactions WHERE complete = 1";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetch(); 
								$date = date('F Y');
					       		 ?>
							<div class="large">&#8369; <?php echo number_format($rows['total'],2);?></div>
							<div class="text-muted">Total Earnings as of <?php echo $date;?></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget">
						
					</div>
				</div>
				

			</div><!--/.row-->
		</div> 
		 <div class="panel panel-container">
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-teal panel-widget">
						<div class="row no-padding"><em class=""></em>
							<div class="col-lg-4">
							    <div class="input-group">
							    </div>
								<br/>
							</div>
							<div class="large">Subscribing Restaurants<br/></div>
					</div>
				</div>
			</div><!--/.row -->

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-1 main">
	

	
		<div class="table-responsive">
			<table id="dataTable2" class="cell-border compact display">
		  <thead>
		    <tr>
		      <th><center>Restaurant Id</center></th>
		      <th><center>Restaurant Name</center></th>
		      <th><center>Restaurant Address</center></th>
		      <th><center>Restaurant Status</center></th>
		    </tr>
		</thead>
		<tbody>
	   <td><center>
	
	 	<tr>
		    <?php 
		    $id = $_SESSION['id'];
        $sql = "SELECT * FROM restaurants WHERE restaurant_status=1";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result = mysqli_query($conn,$sql); 
  
        foreach($rows as $row)
       // while($row = mysqli_fetch_assoc($result))
        {
		   echo '<td><center>'.$row['restaurant_id'].'</center></td>';
		   echo '<td><center>'.$row['restaurant_name'].'</center></td>';
		   echo '<td><center>'.$row['restaurant_addr'].'</center></td>';
		   echo '<td><center>'.$row['restaurant_status'].'</center></td>';
	  
	    ?>
	        
	</center></td>
        </tr>      
<?php } ?>
		  </tbody>
		</table>
	</div>



		</div> 
	 </div>	<!-- /.main  -->
	</div>
	<div class="panel panel-container">
			<div class="row">
				<div class="col-lg-9">
					<div class="panel panel-teal panel-widget">
						<div class="row no-padding"><em class=""></em>
							<div class="col-lg-4">
							    <div class="input-group">
							    </div>
								<br/>
							</div>
							<div class="large">Users<br/></div>
					</div>
				</div>
			</div><!--/.row -->

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-1 main">
	

	
		<div class="table-responsive">
			<table id="dataTable" class="cell-border compact display">
		  <thead>
		    <tr>
		      <th><center>User Id</center></th>
		      <th><center>Name</center></th>
		      <th><center>Email</center></th>
		      <th><center>Status</center></th>
		      <th><center>Action</center></th>
		    </tr>
		</thead>
		<tbody>
	   <td><center>
		<tr>
		    <?php 
        $sql = "SELECT * FROM customers";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result = mysqli_query($conn,$sql); 
  
        foreach($rows as $row)
       // while($row = mysqli_fetch_assoc($result))
        {
		   echo '<td><center>'.$row['customer_id'].'</center></td>';
		   echo '<td><center>'.$row['customer_fname'].' '.$row['customer_mname'].' '.$row['customer_lname'].'</center></td>';
		   echo '<td><center>'.$row['customer_email'].'</center></td>';
		   echo '<td><center>'.$row['customer_status'].'</center></td>';
	    ?>

	    <td>
                                        <center>

                      
                     <?php if($row['customer_status'] == "Active"){?>
                                                
                                                	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
                                                	<a href="#" onclick="deact(<?php echo $row['customer_id'];?>);">
                                                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                                                </a>
                  <?php } elseif($row['customer_status'] == "Deactivated"){?>
                  								<a href="#" onclick="activate(<?php echo $row['customer_id'];?>);">
                                                    <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                    </a>
                                                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
                                                
                                               <?php } ?>
                                        </center>
                                    </td>
	        
	</center></td>
        </tr>      
<?php } ?>
		  </tbody>
		</table>
	</div>



		</div> 
</div>	
<!-- </div>  -->

 
</body>
</html>

 <!-- <script src="../something/js/global.js"></script> -->
 	  <script type="text/javascript">
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
		});	
		$( function() {
			$( "#datepicker" ).datepicker({
				minDate: -0,
				maxDate: "+1M",
				changeMonth: true,
				changeYear: true, 
				numberOfMonths: 2,
				dateFormat: 'MM dd, yy' }); 
	
			$("#timepicker").timepicker({
					timeFormat: 'g:i A',
					minTime: '8:00',
					maxTime: '24:00'
			});
			$( "#datepicker2" ).datepicker({
				minDate: -0,
				maxDate: "+1M",
				changeMonth: true,
				changeYear: true, 
				numberOfMonths: 2,
				dateFormat: 'MM dd, yy' }); 

			$("#timepicker2").timepicker({
					timeFormat: 'g:i A',
					minTime: '8:00',
					maxTime: '24:00'
			});
			$( "#datepicker3" ).datepicker({
			minDate: -0,
			maxDate: "+1M",
			changeMonth: true,
			changeYear: true, 
			numberOfMonths: 2,
			dateFormat: 'MM dd, yy' }); 

		$("#timepicker3").timepicker({
				timeFormat: 'g:i A',
				minTime: '8:00',
				maxTime: '24:00'
		});
		$( "#datepicker4" ).datepicker({
			minDate: -0,
			maxDate: "+1M",
			changeMonth: true,
			changeYear: true, 
			numberOfMonths: 2,
			dateFormat: 'MM dd, yy' }); 

		$("#timepicker4").timepicker({
				timeFormat: 'g:i A',
				minTime: '8:00',
				maxTime: '24:00'
		});

		});
	});

    	function deact(eventId) {
                swal({
                    title: "Deactivate User",
                    text: "Are you sure you want to deactivate this user?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../Controller/CustomersController/deactivate.php",
                            data: {
                                'deactivate': eventId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully deactivated this user",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "systemadminindex.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in deactivating this user", "", "error");
                    }
                });
            }

        function activate(eventId) {
                swal({
                    title: "Activate User",
                    text: "Are you sure you want to activate this user?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../Controller/CustomersController/activate.php",
                            data: {
                                'deactivate': eventId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully activated this user",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "systemadminindex.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in activating this user", "", "error");
                    }
                });
            }

 </script>
  <script type="text/javascript">
    $(document).ready(function() {
		$('#dataTable2').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
				'print'
			]
		} );
	});
 </script>
			<script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../Controller/CustomersController/getnew.php",
                dataType: 'json',
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                        var date = moment().format('LL');
                        var newdate = moment(data[i].dat).format('LL');
                        // console.log(date);
                        var count = data[i].count;
                        if(date == newdate){
                            swal("You have " + count + " new diner(s)", {
                                icon: "info"
                            });
                        }    
                    }
                }
            });
        });
    </script>