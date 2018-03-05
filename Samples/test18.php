
<?php 
	include ('../Controller/dbconn.php');
?>
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
				

        <!-- javascript -->
			<script type="text/javascript" src="js/chart.min.js"></script>
			<script type="text/javascript" src="js/jquery.min.js"></script>

			<script src="../something/js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="js/date.js"></script>
			<!-- <script type="text/javascript" src="js/newapp.js"></script> -->
			<script>
			var date = new Date();
			$('#chart-container').hide();
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
				// $.ajax({
				// 		type: 'POST',
				// 		url: 'getsomething.php',
				// 		data: {	'menuid': id,
				// 				'start': s,
				// 				'end' : e	
				// 		}
				// });
				$(document).ready(function(){
				$.ajax({
					url: "getsomething.php",
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

					$('#chart-container').show();
					},
					error: function(data) {
						console.log(data);
					}
				});
			});
			});
        </script>
			
	</body>
	
</html>