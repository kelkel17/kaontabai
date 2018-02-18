<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KaonTaBai!</title>
	<link href="../../something/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../something/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../something/css/datepicker3.css" rel="stylesheet">
	<link href="../../something/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="../../something/css/datatable.css"> 
    <link rel="stylesheet" href="../../something/css/buttons.dataTables.min.css" />
	<link rel="stylesheet" href="../../something/css/jquery-ui.css">
	<link rel="stylesheet" href="../../assets/css/jquery.timepicker.min.css" />
	<!-- <link rel="stylesheet" href="../../something/css/bootstrap-timepicker.min.css"/> -->
	<!-- <link rel="stylesheet" href="../../something/css/bootstrap-datepicker.css"/> -->

    <!--scripts--> 
	
    
	

	<script src="../../something/js/jquery.min.js"></script>
	
	<!-- <script src="../../something/js/bootstrap-datetimepicker.min.js"></script> -->
	<!-- <script src="../../something/js/bootstrap-timepicker.min.js"></script> -->
	<!-- <script src="../../something/js/bootstrap-datepicker.js"></script> -->
	<script src="../../something/js/jquery-ui.js"></script>
	<script src="../../something/js/jquery.timepicker.min.js"></script>
	<script src="../../something/js/chart.min.js"></script>
	<script src="../../something/js/chart-data.js"></script>
	<script src="../../something/js/jquery.dataTables.min.js"></script>
    <script src="../../something/js/dataTables.buttons.min.js"></script>
    <script src="../../something/js/jszip.min.js"></script>
    <script src="../../something/js/pdfmake.min.js"></script>      
    <script src="../../something/js/vfs_fonts.js"></script>
    <script src="../../something/js/buttons.print.min.js"></script> 
    <script src="../../something/js/buttons.html5.min.js"></script> 
	<!-- <script src="../../something/js/jquery-1.11.1.min.js"></script> -->
	<script src="../../something/js/bootstrap.min.js"></script>
    
	<script src="../../something/js/custom.js"></script>
	
	<script src="../../something/js/moment.js"></script>
	<script src="../../something/js/sweetalert.min.js"></script>
	<script>
    $(document).ready(function(){
	$.ajax({
        type: "GET",
		url: "../../Controller/RestaurantsController/getdata.php",    
        dataType: 'json',
        success: function(data) {
            for(var i = 0; i < data.length;i++)
            console.log(data[i]);
            var date = moment().format('LL');
            console.log(date);
            var date2 = data[0].dat; 
            console.log(date2);

            if(date == date2){
                console.log('okay');
                swal("As of today you have "+data[0].count+" reservation",{
                    icon: "info"
                });
            }else{
                console.log('dili okay');
            }

        }
        });
    });
</script>
<script>
    $(document).ready(function(){
	$.ajax({
        type: "GET",
		url: "getnotif.php",    
        dataType: 'json',
        success: function(data) {
            for(var i = 0; i < data.length;i++)
            console.log(data[i]);
            var date = moment().format('LL');
            console.log(date);
            var date2 = data[0].count; 
            console.log(date2);
            // if(date != date2){
            //     console.log('dili okay');
                swal("You have new "+date2+" notifications",{
                    icon: "info"
                });
            // }else{
            //     console.log('okay');
            // }

        }
        });
    });
</script>
	<link rel="shortcut icon" href="../../assets/img/logo.png">
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
				<img src="../../Image/<?php echo $row['restaurant_logo'];?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
			
				<div class="profile-usertitle-name"><?php echo $row['restaurant_name'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><a href="../../View/updaterestaurant.php?id=<?php echo $row['restaurant_id'];?>">Edit Restaraunt </a>
				<?php 		}
					}
				
			?>
				</div>
			</div>
			<div class="clear"></div>

		</div>