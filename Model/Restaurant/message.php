<?php 
	
    include '../../Controller/dbconn.php';
    islogged();
    	$id = $_SESSION['id'];
        $sql = "SELECT * FROM messages WHERE (restaurant_id LIKE '".$id."%')";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0)
        {
     
        	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KaonTaBai!</title>
	<link href="../../something/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../something/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../something/css/datepicker3.css" rel="stylesheet">
	<link href="../../something/css/styles.css" rel="stylesheet">
	<link href="../../something/fonts/css.css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--Custom Font-->
	<!--<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">-->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="../../View/indexadmin.php"><span>KaonTaBai</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<?php foreach ($rows as $row) {?>
								<li><a href="#"><?php echo $row['customer_id'];?></a></li>
										
								
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<!-- <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff"> -->
									</a>
									
									
									<div class="message-body">
										<li><?php echo $row['message'];?></li><li><?php echo date('h:m A', strtotime($row['date_time_receive'])); ?></li>
										<small class="pull-right"></a></small>
									<br /></div>
								</div>
								<?php }	?>
						
						
							<!-- <li class="divider"></l> 
							 <li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									
							</li> -->
						<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li> 
			
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['id'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>

		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">

				<input type="text" class="form-control" placeholder="Search">

			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="reservations.php"><em class="fa fa-dashboard">&nbsp;</em> Reservations</a></li>
			<li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class=""><a href="../Promo/promos.php"><em class="fa fa-clone">&nbsp;</em> Promos</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Rooms</a></li>
			<li class=""><a href="menu.php"><em class="fa fa-clone">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../Employee/staff.php"><em class="fa fa-clone">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Food/food.php"><em class="fa fa-clone">&nbsp;</em>Foods</a></li>
			<li class=""><a href="../Beverage/beverage.php"><em class="fa fa-clone">&nbsp;</em>Beverages</a></li>
			<li class=""><a href="../Dessert/dessert.php"><em class="fa fa-clone">&nbsp;</em>Deserts</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Foods</h1>
			</div>
				 
			<div class="col-lg-4">
		    <div class="input-group">

		      <input type="text" class="form-control" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button class="btn btn-secondary" type="button">Go!</button>
		      </span>
		    </div>
			<br>
		</div>

		</div><!--/.row-->

	
<table class="table table-bordered">
		  <thead>
		    <tr>
		  	 <th>Reservation ID</th>		
		      <th>Customer Name</th>				     
		      <th>Reservaton Date</th>   
		      <th>Reservation Time</th>
		      <th>Special Request</th>
		      <th>Number of Guests</th>
		      <th>Status</th>
		      wewq
		     
		      
		      <th><?php echo $res3['customer_fname']; ?></th>
		      <th>Action</th>

		    </tr>
	<?php }?>

	
	<!-- <?php 
		


      //   foreach($rows as $row)
       
      //   {
        

		  	 // echo '<tr><td>'.$row['message_id'].'</td>';
		   	 
		    //  echo '<td>'.$row['message'].'</td>';
	     //     echo '<td>'.$row['date_time_receive'].'</td>';      
	      
	     //   echo '<div class="cell">';
      //               echo '<td> <a href="../../Controller/RestaurantsController/accept.php?id='.$row['message_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Accept"></a>
      //               <a href="../../Controller/RestaurantsController/cancel.php?id='.$row['message_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Cancel"></a></td></tr>';
      //           echo '</div>';             
        
     	 
      //}
    //}    
    ?> -->
	


		  </thead>
		
		    
		
		</table>
		
	</div>	<!--/.main-->
	
	<script src="../../something/js/jquery-1.11.1.min.js"></script>
	<script src="../../something/js/bootstrap.min.js"></script>
	<script src="../../something/js/chart.min.js"></script>
	<script src="../../something/js/chart-data.js"></script>
	<script src="../../something/js/easypiechart.js"></script>
	<script src="../../something/js/easypiechart-data.js"></script>
	<script src="../../something/js/bootstrap-datepicker.js"></script>
	<script src="../../something/js/custom.js"></script>
	
	
		
</body>
</html>