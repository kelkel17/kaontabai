<?php 
	
    include '../../Controller/dbconn.php';
    islogged();

?>

<!DOCTYPE html>
<html>
<?php include('../header.php'); ?>

		<ul class="nav menu">
			<li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
			<li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
			<li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class="active"><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-header" style="float: left;margin: 10px;">Schedules</h1>

			<!-- Add Schedule Modal -->
				<button type="button" class="btn btn-primary hover m-t-15" style="float: left;margin: 10px;" data-toggle="modal" data-target="#addSchedule">Add Schedule</button> 
	
			</div>
			 <div class="col-md-4">
					 <?php include ('schedulemodal.php'); ?>
			</div>		 

		</div><!--/.row-->

	
		<div class="table-responsive">
			<table id="dataTable" class="cell-border compact display">
		  <thead>
		    <tr>
		      <th><center>Schedule ID</center></th>
		      <th><center>Start Date & Time</center></th>
		      <th><center>End Date & Time</center></th>
		      <th><center>Status</center></th>
		      <th><center>Action</center></th>
		    </tr>
		</thead>
		<tbody>
		<tr>
		    <?php 
		    $id = $_SESSION['id'];
        $sql = "SELECT * FROM schedules WHERE (restaurant_id LIKE '".$id."%')";
        // $sql .= "ORDER BY sched_id desc";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         date_default_timezone_set('Asia/Manila');
        	$date = date('Y-m-d g:i');
        //	$newdate = new DateTime($date);
        //	$newdate->sub(new DateInterval('P1D'));
		//	$newest = $newdate->format('Y-m-d g:i');
			
        	//echo $newest;
        	
			// $temp4 = date('Y-m-d',strtotime($row['created']));
        foreach($rows as $row)
       {
        	

        	 
		   echo '<td><center>'.$row['schedule_number'].'</center></td>';
		   if($row['sched_sdate'] != '' && $row['sched_edate'] != ''){
		   		echo '<td><center>'.date('F j, Y g:i A',strtotime($row['sched_sdate'].$row['sched_stime'])).'</center></td>';
		   		echo '<td><center>'.date('F j, Y g:i A',strtotime($row['sched_edate'].$row['sched_etime'])).'</center></td>';
			}elseif($row['sched_sdate'] != '' && $row['sched_edate'] == ''){
				echo '<td><center> Automatically created an peak hour schedule at </td></center>';
				echo '<td><center>'.date('F j, Y',strtotime($row['sched_sdate'])).' </td></center>';
			}elseif($row['sched_sdate'] == '' && $row['sched_edate'] == ''){
				echo '<td><center> Automatically created an peak hour schedule at </td></center>';
				echo '<td><center>'.date('F j, Y',strtotime($row['created'])).' </td></center>';
			}

			if($row['status'] == 1){
				$temp = "No online reservation";
	       		echo '<td><center>'.$temp.'</center></td>';
			}else{
				$temp = "Allow Online Reservation";
	       		echo '<td><center>'.$temp.'</center></td>';
			}	   
	       echo '<div class="cell">';
	    ?>
	       
        <td><center>
        	
	   
	    <?php 
	    	

	    	$get = getSchedule(array($id));
	    	foreach ($get as $r) { //($r is from $row just testing)
				$date2 = date('Y-m-d g:i');
				$date3 = date('Y-m-d g:i');
				$date4 = date('Y-m-d');
				$temp2 = date('Y-m-d g:i',strtotime($r['sched_sdate'].$r['sched_stime']));
				$temp3 = date('Y-m-d g:i',strtotime($r['sched_edate'].$r['sched_etime']));
				$temp4 = date('Y-m-d',strtotime($r['sched_sdate']));
				// echo $temp2,$temp3;
				
	    		if($date2 == $temp2){
	    			$status = 1;
	    			$sid = $r['sched_id'];
	    			$date = array($status,$sid);
	    			deactivateSchedule($date);
	    		} if($date2 >= $temp3 && $date3 > $temp4 && $temp2 != ''){
	    			$status = 0;
	    			$sid = $r['sched_id'];
	    			$date = array($status,$sid);
					deactivateSchedule($date);
					
					
				}
				// break;
			}
			$temp5 = date('Y-m-d g:i',strtotime($row['sched_sdate']));
			
			$temp6 = date('Y-m-d g:i',strtotime($row['sched_edate']));
			$temp7 = date('Y-m-d', strtotime($row['sched_sdate']));
							if($date4 > $temp7 && $date > $temp6){ ?>
				<i class="fa fa2 fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
				<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Off-Peak"></i>
	    		<i class="fa fa2 fa-times" aria-hidden="true" title="Peak-Hour"></i> 
	      <!--else{}-->
			<?php } else {
	    if($row['status']== 0){  ?>
	    		<a href="#" data-toggle="modal" data-target="#update<?php echo $row['sched_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
	         
	         	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Off-Peak"></i>
	        	<a href="#" data-toggle="modal" data-target="#peak<?php echo $row['sched_id']; ?>"><i class="fa fa-times" aria-hidden="true" title="Peak-Hour"></i></a>	
	    <?php }elseif($row['status']== 1){
	    		?> 
	    		<a href="#" data-toggle="modal" data-target="#update<?php echo $row['sched_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
	         
	    		<a href="#" data-toggle="modal" data-target="#off<?php echo $row['sched_id']; ?>"><i class="fa fa-circle-o" aria-hidden="true" title="Off-Peak"></i></a>    	
	         	<i class="fa fa2 fa-times" aria-hidden="true" title="Peak-Hour"></i>
	    <?php } } ?>

	</center></td>
        </tr>      
        <?php include('schedulemodal2.php'); ?>
        <?php }
    ?>
		  </tbody>
		</table>
	</div>
		
	</div>	<!--/.main-->
 <script src="../../something/js/global.js"></script>
 <script src="../../something/js/global.js"></script>
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
		} );
		
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
			$( ".datepicker3" ).datepicker({
			minDate: -0,
			maxDate: "+1M",
			changeMonth: true,
			changeYear: true, 
			numberOfMonths: 2,
			dateFormat: 'MM dd, yy' }); 

		$(".timepicker3").timepicker({
				timeFormat: 'g:i A',
				minTime: '8:00',
				maxTime: '24:00'
		});
		$( ".datepicker4" ).datepicker({
			minDate: -0,
			maxDate: "+1M",
			changeMonth: true,
			changeYear: true, 
			numberOfMonths: 2,
			dateFormat: 'MM dd, yy' }); 

		$(".timepicker4").timepicker({
				timeFormat: 'g:i A',
				minTime: '8:00',
				maxTime: '24:00'
		});
	});
 </script>
 
		
</body>
</html>