<?php

include '../../Controller/dbconn.php';
islogged();	

if(isset($_POST['Add']))
	{

		
		$id = $_SESSION["id"];
		$name = $_POST['name'];	
		$desc = $_POST['desc'];		
		$category = $_POST['category'];		
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$image = $_FILES['image']['name'];
		if($image!='')
		{	
		//if (move_uploaded_file($image,'../../Image'.$filename)) {
		  	$directory = "../../Image/";
		  	$path = time().$image;
		  	if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
		  	{
				$data = array($id,$name,$desc,$category,$price,$qty,$path);
				addFood($data);
				echo '<script> alert("Successfully Added a Food"); window.location="../../Model/Food/food.php" </script>';
				

			}
		}
	}			
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
			<li class=""><a href="../../Model/Employee/staff.php"><em class="fa fa-clone">&nbsp;</em> Staff</a></li>
			<li class="active"><a href="../../Model/Food/food.php"><em class="fa fa-clone">&nbsp;</em>Foods</a></li>
			<li class=""><a href="../../Model/Beverage/beverage.php"><em class="fa fa-clone">&nbsp;</em>Beverages</a></li>
			<li class=""><a href="../../Model/Dessert/dessert.php"><em class="fa fa-clone">&nbsp;</em>Desserts</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Foods</h1>
			 

			<div class="col-lg-4">
		   
</div>
			<br>
		</div>
		<br>
		<br>
		<center>
		<form method="POST" enctype="multipart/form-data">
                     <table>
						 <tr>
							<td colspan="2"><h1>Add Food</h1><hr/></td>
						 </tr>
						
                        <tr>
                             <!-- <td align="left">Food Name:&nbsp;&nbsp;</td> -->
                            <td><label>Food Name</label>
                            	<input class="form-control" type="text" name="name" required></td>
                             <!-- <td align="left">Food Descreption:&nbsp;&nbsp;</td> -->
                           
                            <!-- <td align="left">Food Category:&nbsp;</td> -->
                             
                            
                            <!-- <td align="left">Food Price:&nbsp;&nbsp;</td> -->
                            <td><label>Food Price</label>
                            	<input class="form-control" type="text" name="price" required></td>      
                            <!-- <td align="left">Food Status:&nbsp;</td> -->
                            <td><label>Food Category</label>
                            	<select class="form-control" name="category" required>
                            	<option value="Cereals">Cereals</option>
                            	<option value="Vegetables">Vegetables</option>
                            	<option value="Meats">Meats</option>
                            	<option value="Fruits">Fruits</option>
                            	<option value="Soups">Soups</option>
                            </select></td>
                             <td><label>Food Status</label>
                            	<select class="form-control" name="qty" required>
                            	<option value="Available">Available</option>
                            	<option value="Not Available">Not Available</option>
                            </select></td>
							<!-- <td align="left">Food Image:&nbsp;&nbsp;</td> -->
							<td><label>Food Image</label>
                            	<input class="form-control" type="file" name="image" accept = "image/jpeg" /></td>
						
						  <td><label>Food Description</label>
                            	<textarea class="form-control" type="text" name="desc" required></textarea></td> </tr>
                          
            </table>
            <br><br>
            <input type="submit" name="Add" value="Save Profile" class="btn btn-primary btn-lg" type="button">
        </form>      
        </center> 
                    <br>
                    <br>
                    <br>

		</div><!--/.row-->
		
	<table class="table table-bordered">
		  <thead>
		    <tr>
		  	 <th>Food ID</th>		
		      <th>Food Name</th>	
		      <th>Food Description</th>			     
		      <th>Food Category</th>   
		      <th>Food Price</th>
		      <th>Food Quantity</th>
		      <!-- 	<th>Image</th> -->
		      
		      <th>Action</th>

		    </tr>
		


	
	<?php 
		$id = $_SESSION['id'];
        $sql = "SELECT * FROM foods WHERE (restaurant_id LIKE '".$id."%')";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
  
        foreach($rows as $row)
       
        {
		   echo '<tr><td>'.$row['food_id'].'</td>';
		   echo '<td>'.$row['food_name'].'</td>';
		    echo '<td>'.$row['food_desc'].'</td>';
		   echo '<td>'.$row['food_category'].'</td>';
	       echo '<td>'.$row['food_price'].'</td>';
	       echo '<td>'.$row['food_qty'].'</td>'; 


	      
	       echo '<div class="cell">';
                    echo '<td> <a href="../../View/Food/editfoodprofile.php?id='.$row['food_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Update"></a>
                    <a href="../../Controller/FoodsController/deactivatefood.php?id='.$row['food_id'].' "> <input type="submit" class="btn btn-info btn-sm" value="Deactivate"></a></td></tr>';
                echo '</div>';             
        }
    ?>

		  </thead>
		
		    
		
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