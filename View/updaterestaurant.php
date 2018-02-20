<?php 
	
    require_once('../Controller/dbconn.php');

    islogged();
   


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

	<!-- <script src="../something/js/jquery.min.js"></script> -->
	<script src="../something/js/jquery-1.11.1.min.js"></script>
	<script src="../something/js/bootstrap.min.js"></script>
	<!-- <script src="../samples/js/chart.min.js"></script>
	<script src="../something/js/chart-data.js"></script>
	<script src="../something/js/easypiechart.js"></script>
	<script src="../something/js/easypiechart-data.js"></script>
	 --><script src="../something/js/bootstrap-datepicker.js"></script>
	<script src="../something/js/custom.js"></script>
	
	<link rel="shortcut icon" href="../assets/img/logo.png">
<!-- 	<script src="../samples/js/app.js"></script> -->

		 
	</script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="indexadmin.php"><span>KaonTaBai</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						 <em class="fa fa-envelope"></em><span class="label label-danger count"></span>
					</a>
						<ul class="dropdown-menu  dropdown-messages">
	 					
						</ul>
						<!-- end of message -->
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
					  		?>	
								<div><em class="fa fa-envelope"></em><?php echo $row['total'];?> New Message
									<span class="pull-right text-muted small"><?php  echo date('g:i A',strtotime($row['date_time_receive']));?></span></div>
							<?php } $con = null; ?>
							</a></li>
							<li class="divider"></li>
							<li><a href="../Model/Restaurant/reservations.php">
							<?php
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT COUNT(res_status) as total FROM reservations WHERE res_status = 'Pending' and restaurant_id = $id";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					       		foreach ($rows as $row) {
					  		?>	
								<div><em class="fa fa-heart"></em><?php echo $row['total']; ?> Pending Reservations  
									<span class="pull-right text-muted small">4 mins ago</span></div>
							<?php } $con = null;?>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
		 </li> 
					<!-- end of notification -->
			</div>
		</div><!-- /.container-fluid -->
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
			
				<div class="profile-usertitle-name"><?php echo $row['restaurant_name'];?></div>
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
			<li class=""><a href="../Model/Restaurant/promo.php"><em class="fa fa-bullhorn">&nbsp;</em> Promos</a></li>
			<li class=""><a href="../Model/Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Model/Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Model/Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

 	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $row['restaurant_name'];?>'s Restaurant Admin</h1>
			</div>
		</div><!--/.row-->
		
	 	<div class="panel panel-container">
			<div class="row">
				 <form method="POST" enctype="multipart/form-data" action="../Controller/RestaurantsController/updateadmin.php">
					<div class="col-xs-6 col-md-3 col-lg-7">
						<div class="login-panel panel panel-default">
							<div class="panel-heading">Update your restaurant!</div>
							  <div class="panel-body">
									<fieldset>
										<div class="form-group">
											<input type="hidden" name="id" value="<?php echo $row['restaurant_id']?>">
											<input class="form-control" placeholder="Username" name="username" type="username" value="<?php echo $row['username'];?>" required><br/>
											<input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $row['password'];?>" required><br/>
											<input class="form-control" placeholder="Restaurant Name" name="rname" type="text" value="<?php echo $row['restaurant_name'];?>" required><br/>
											<input class="form-control" placeholder="Restaurant Address" name="addr" type="text" value="<?php echo $row['restaurant_addr'];?>" required><br/>
											<input class="form-control" placeholder="Restaurant Contact" name="contact" type="text" value="<?php echo $row['restaurant_contact'];?>" required><br/>
											<input class="form-control" placeholder="Restaurant Email" name="email" type="email" value="<?php echo $row['owner_email'];?>" required><br/>
											<label>Maximum Capacity</label>
											<input class="form-control" placeholder="Maximum number of table of your restaurant" name="max" type="number" value="<?php echo $row['max_capacity'];?>" required><br/>
											<label>Restaurant Opening Time</label>
											<input class="form-control" placeholder="Restaurant Hour Open" name="otime" type="time" value="<?php echo $row['hour_open'];?>" required><br/>
											<label>Restaurant Closing Time</label>
											<input class="form-control" placeholder="Restaurant Hour Close" name="ctime" type="time" value="<?php echo $row['hour_close'];?>" required><br/>
											<textarea class="form-control" placeholder="Restaurant Description" name="desc" type="text"><?php echo $row['restaurant_desc'];?></textarea><br/>
											<?php 
												$promos = getPromos();
												foreach ($promos as $rows) {
													
													 ?>
           

													<div id="some-div">
													<label>Promo Name:&nbsp;</label><?php echo $rows['promo_name'];?>
													
													<input type="checkbox" name="promo[]" value="<?php echo $rows['promo_id'];?>"><br/>
													
												 	<span id="some-element"><label>Promo Description:&nbsp; </label><br/><?php echo $rows['promo_desc'];?><br/> </span>
												 	</div>
											<?php } ?>
											<label for="image<?php echo $row['resturant_id']; ?>" class="hover">
											<?php
												$filename = '../Image/'.$row['restaurant_logo'].'';

											 if($row['restaurant_logo']=='' || !(file_exists($filename))){?>
											<img src="../Image/blank.jpg" id="preview<?php echo $row['restaurant_logo']; ?>" data-tooltip="true" title="Upload Restaurant Logo" data-animation="false" alt="Restaurant Logo" style="width:150;height:150px"/>
											<input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:show" id="image<?php echo $row['resturant_id']; ?>" value="<?php echo $row['restaurant_logo']; ?>">
											<?php } else{ ?>
								            <img src="../Image/<?php echo $row['restaurant_logo']; ?>" id="preview<?php echo $row['restaurant_logo']; ?>" data-tooltip="true" title="Upload Restaurant Logo" data-animation="false" alt="Restaurant Logo" style="width:150;height:150px"/>
								            
								            </label>
											<input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:show" id="image<?php echo $row['resturant_id']; ?>" value="<?php echo $row['restaurant_logo']; ?>">
								            <?php } ?>
										</div>
									</fieldset>
									<input type="submit" name="Update" value="Update Restaurant" class="btn btn-primary btn-sm" style="float:right;" type="button">
							  </div>
							</div>
						</div>
					 </form>
			</div><!--/.row-->
		</div> 
	 </div>	<!-- /.main  -->
	 <!-- MAPS -->
	

			
</body>
</html>
<script>
	
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url: "../Controller/RestaurantsController/fetch.php",
					method: "POST",
					data:{view:view},
					dataType:"json",
					success:function(data)
					{
						$('.dropdown-messages').html(data.notification);
						if(data.unseen_notification > 0)
						{
							$('.count').html(data.unseen_notification);
							//setTimeout(function() {}, 1000);
						}

					}
				});
			}

			load_unseen_notification();
			 $('#message_form').on('submit',function(event){
				event.preventDefault();
				if($('#message').val() != '')
				{
					var form_data = $(this).serialize();
					$.ajax({
						url:"../Controller/CustomersController/message.php",
						method:"POST",
						data:form_data,
						success:function(data)
						{
							$('#message_form')[0].reset();
							load_unseen_notification();
						}
					});
				}
				else
				{
					alert("Both Fields are Required");
				}	
			});
			$(document).on('click','.dropdown-toggle', function(){
				//alert('asdsads');
				//$('count').html('');
				load_unseen_notification('yes');
				$('.count').html('');

			});
			setInterval(function(){
				load_unseen_notification();;

			},5000);

			function loadImage(event,el){
		console.log(el);
        var loadImg = document.getElementById(el);
        loadImg.src = URL.createObjectURL(event.target.files[0]);
    }
	

</script>
