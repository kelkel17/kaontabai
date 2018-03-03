

<!DOCTYPE html>
<html>
	<head>
		<title>ChartJS - BarGraph</title>
		<style type="text/css">
			#chart-container {
				width: 640px;
				height: auto;
				display: inline-block;
			}
		</style>
	<link href="../something/css/bootstrap.min.css" rel="stylesheet">
	<link href="../something/css/font-awesome.min.css" rel="stylesheet">
	<link href="../something/css/datepicker3.css" rel="stylesheet">
	</head>
	<body>
		<div id="chart-container">
			<canvas id="mycanvas5"></canvas>
		</div>

		<!-- <div id="chart-container">
			<canvas id="mycanvas2"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas3"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas4"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas6"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas7"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas8"></canvas>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas9"></canvas>
		</div> -->

                 <!--    <input id="date" data-provide="datepicker">
                        <span class="glyphicon glyphicon-calendar"></span>
         
		 -->

        <!-- javascript -->
			<script type="text/javascript" src="js/chart.min.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>

			<!-- <script src="../something/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="js/date.js"></script> -->
			<script type="text/javascript">
          var date = new Date();
date.setDate(date.getDate());

$('#date').datepicker({ 
    startDate: date
});
 
        </script>
			<script type="text/javascript" src="js/newapp.js"></script>
	</body>
	
</html>