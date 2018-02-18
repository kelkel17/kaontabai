<?php

include '../../Controller/dbconn.php';
islogged();

$myID = $_GET['id'];

  if(isset($_POST['submit'])){

	$name = trim($_POST['name']);	
	$desc = trim($_POST['desc']);		
	$category = trim($_POST['category']);		
	$price = trim($_POST['price']);
	$qty = trim($_POST['qty']);
	$image = $_FILES['image']['tmp_name'];
	$imagebase64 = base64_encode(file_get_contents($image));

    
    updatebeverage($myID,$name,$desc,$category,$price,$qty,$imagebase64);
    header("location:../../Model/Beverage/beverage.php");
  } 

  $res = beverage();
  // $id = $_SESSION['id'];
  //       $sql = "SELECT * FROM customers c, messages m WHERE  m.customer_id = c.customer_id ORDER by date_time_receive desc";
  //       $con = con();
  //       $stmt = $con->prepare($sql);

  //       $stmt->execute();
  //       $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //       $total = $stmt->rowCount();
  //     if($stmt->rowCount()>0)
  //     {

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
	<!-- <link href="../../something/fonts/css.css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

	<script src="../../something/js/jquery.min.js"></script>
	<script src="../../something/js/jquery-1.11.1.min.js"></script>
	<script src="../../something/js/bootstrap.min.js"></script>
	<script src="../../something/js/chart.min.js"></script>
	<script src="../../something/js/chart-data.js"></script>
	<script src="../../something/js/easypiechart.js"></script>
	<script src="../../something/js/easypiechart-data.js"></script>
	<script src="../../something/js/bootstrap-datepicker.js"></script>
	<script src="../../something/js/custom.js"></script>
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
				<a class="navbar-brand" href="#"><span>KaonTaBai</span>Admin</a>
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
					<!-- end of notification -->
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
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
			<li class=""><a href="../../Model/Reservation/reservations.php"><em class="fa fa-dashboard">&nbsp;</em> Reservations</a></li>
			<li class=""><a href="../../Model/Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class=""><a href="../../Model/Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class=""><a href="../../Model/Promo/promos.php"><em class="fa fa-clone">&nbsp;</em> Promos</a></li>
			<li class=""><a href="../../Model/Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../../Model/Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Rooms</a></li>
			<li class=""><a href="menu.php"><em class="fa fa-clone">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../../Employee/staff.php"><em class="fa fa-clone">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../../Model/Food/food.php"><em class="fa fa-clone">&nbsp;</em>Foods</a></li>
			<li class="active"><a href="../../Model/Beverage/beverage.php"><em class="fa fa-clone">&nbsp;</em>Beverages</a></li>
			<li class=""><a href="../../Model/Dessert/dessert.php"><em class="fa fa-clone">&nbsp;</em>Desserts</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Beverages</h1>
			

			
			<div class="col-lg-4">
		  
</div>
			<br>
		</div>
		<br>
		<br>
    <?php
    foreach ($res as $row){
                  if ($row['bev_id'] == $myID) {

     ?>

		<center>
		<form method="POST" enctype="multipart/form-data">
                     <table>
						 <tr>
							<td colspan="2"><h1>Update Beverages</h1><hr/></td>
						 </tr>
						
                        <tr>
                             <!-- <td align="left">Beverage Name:&nbsp;&nbsp;</td> -->
                            <td><label>Beverage Name</label>
                             	<input  class="form-control" type="text" value="<?php echo $row['bev_name']; ?>" name="name" required></td>

                             <!-- <td align="left">Beverage Descreption:&nbsp;&nbsp;</td> -->
    
                            <!-- <td align="left">Beverage Type:&nbsp;</td> -->
                             <td><label>Beverage Type</label>
                             	<select  class="form-control" name="category" value="<?php echo $row['bev_type']; ?>" required>
                            	<option value="Soft Drinks">Soft Drinks</option>
                            	<option value="Beers">Beers</option>
                            	<option value="Wine">Wine</option>
                            	<option value="Shakes">Shakes</option>
                            
                            </select></td>
    
                            <!-- <td align="left">Beverage Price:&nbsp;&nbsp;</td> -->
                            <td><label>Beverage Price</label>
                             	<input  class="form-control" type="number" name="price" value="<?php echo $row['bev_price']; ?>" required></td>      

                            <!-- <td align="left">Beverage Status:&nbsp;</td> -->
                             <td><label>Beverage Status</label>
                             	<select  class="form-control"name="qty" value="<?php echo $row['bev_qty']; ?>" required>
                            	<option value="Available">Available</option>
                            	<option value="Not Available">Not Available</option>
                            </select></td>

							<!-- <td align="left">Food Image:&nbsp;&nbsp;</td> -->
							<td><label>Beverage Image</label>
                             	<input  class="form-control" type="file" name="image" value="<?php echo $row['bev_image']; ?>" accept = "image/jpeg" /></td>
					           
					            <td><label>Beverage Description</label>
                             	<textarea class="form-control" maxlength="50" type="text" value="" name="desc" required><?php echo $row['bev_desc']; ?></textarea></td>
                            
		
						 </tr>
                         <?php }} ?> 
            </table>
            <br><br>
            <input type="submit" name="submit" value="Save Profile" class="btn btn-primary btn-lg" >
        </form>      
        </center> 
                    <br>
                    <br>
                    <br>

		</div><!--/.row-->

		<table class="table table-bordered">
		  <thead>
		    <tr>
		  	 <th>Beverage ID</th>		
		      <th>Beverage Name</th>				     
		      <th>Beverage Category</th>   
		      <th>Beverage Price</th>
		      <th>Beverage Quantity</th>
		      <th>Action</th>
		    </tr>
	
	<?php 
		$id = $_SESSION['id'];
        $sql = "SELECT * FROM beverages WHERE (restaurant_id LIKE '".$id."%')";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
  
        foreach($rows as $row)
       
        {
		   echo '<tr><td>'.$row['bev_id'].'</td>';
		   echo '<td>'.$row['bev_name'].'</td>';
		   echo '<td>'.$row['bev_desc'].'</td>';
	       echo '<td>'.$row['bev_price'].'</td>';
	       echo '<td>'.$row['bev_qty'].'</td>'; 
	       // echo '<td>'.'<img src="../../Image/'.$row['food_image'].'" style="width: 150px; height:150px;"/>'.'</td>';
	      


	      
	       echo '<div class="cell">';
                    echo '<td> <a href="../../View/beverage/editbeverageprofile.php?id='.$row['bev_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Update"></a>
                    <a href="../../Controller/beveragesController/deactivatebeverage.php?id='.$row['bev_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Deactivate"></a></td></tr>';
                echo '</div>';             
        }
    ?>

		  </thead>
		  <tbody>
		    
		  </tbody>
		</table>

		
		
	</div>	<!--/.main-->
	

<!-- 	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
	 -->
	 <script src="../../something/js/global.js"></script>
 <!-- <script src="../../something/js/global2.js"></script> -->
		
</body>
</html>