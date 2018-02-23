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
			<li class="active"><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-md-6" >
				<h1 class="page-header" style="float: left;margin: 10px;">Events</h1>
				<button type="button" id="tim" class="btn btn-primary hover m-t-15 bs" data-toggle="modal" data-target="#addEvent" style="float: left;margin: 10px;">Add Event</button>
			</div>
				 <div class="col-md-4">
					 
			 <?php include ('eventmodal.php'); ?>
			 	</div>

		</div><!--/.row-->
		
<div class="table-responsive">
<table id="dataTable" class="cell-border compact display">
		  <thead>
		    <tr>	
		      <th><center>Event ID</center></th>
		      <th><center>Name</center></th>
		      <th><center>Venue</center></th>
		      <th><center>Date & Time</center></th>
		      <th><center>Description</center></th>
		      <th><center>Status</center></th>
		      <th><center>Action</center></th>
		    
		    </tr>
		</thead>
		    <tbody>
		    	<tr>
		    <?php 
		    $id = $_SESSION['id'];
        $sql = "SELECT * FROM events WHERE (restaurant_id LIKE '".$id."%')";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$result = mysqli_query($conn,$sql); 
  
        foreach($rows as $row)
       // while($row = mysqli_fetch_assoc($result))
        {
		   echo '<td><center>'.$row['event_number'].'</center></td>';
		   echo '<td><center>'.$row['event_name'].'</center></td>';
	       echo '<td><center>'.$row['event_venue'].'</center></td>';
		   echo '<td><center>'.date('F j, Y',strtotime($row['event_date'])).' at '.date('g:i A',strtotime($row['event_time'])).'</center></td>';
	        echo '<td><center>'.$row['event_desc'].'</center></td>';
	        echo '<td><center>'.$row['event_status'].'</center></td>'; 
	    ?>
	        
	    <div class="cell">
            <td>
            	<a href="#" data-toggle="modal" data-target="#updateEvent<?php echo $row['event_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
            	<?php if($row['event_status']=="Open") {?>
					<a href="#"  onclick="getDate(<?php echo $row['event_id'];?>);" id="delete"><i class="fa fa-times" aria-hidden="true" title="Close"></i></a>
				<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Open" disabled></i>
                 <?php } elseif($row['event_status']=="Close") {?>
                 <i class="fa fa2 fa-times" aria-hidden="true" title="Close" disabled></i>
                 <a href="#" onclick="postDate(<?php echo $row['event_id'];?>);"><i class="fa fa-circle-o" aria-hidden="true" title="Open"></i></a>
                
				 <?php } ?>
				
				 <div id="myform">
					<form method="post" action="../../Controller/EventsController/deactivateevent.php">
						<input type="hidden" name="id" value="<?php echo $row['event_id'];?>">
					</form>
				</div>
             </td>
         </div>
          </tr>
         <?php include('eventmodal2.php'); ?>
        <?php }?>


		    
		  </tbody>
		</table>
		
	</div>	<!--/.main-->
	
 <script src="../../something/js/global.js"></script>
 <script>
					function getDate(eventId){
						swal({
									title: "Close event",
									text: "Are you sure you want to close this event?",
									buttons:true
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/EventsController/deactivateevent.php",
										data: {'event_id':eventId},
										cache: false,
										success: function(response){
											swal({
												title: "Succesfully close the event",
												text: "",
												type: "success"
											}).then(function(){ window.location="events.php";});
										}
									});
								}else{
									swal("Error in closing the event","","error");
								}
							});
					}
					function postDate(openId){
						swal({
									title: "Open event",
									text: "Are you sure you want to Open this event?",
									buttons:true
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/EventsController/deactivateevent.php",
										data: {'open_id':openId},
										cache: false,
										success: function(response){
											swal({
												title: "Succesfully Open the event",
												text: "",
												type: "success"
											}).then(function(){ window.location="events.php";});
										}
									});
								}else{
									swal("Error in re-opening the event","","error");
								}
							});
					}
				</script>
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

	});
});

// function getDate(restId){
// 	swal({   
// 		title: "Are you sure?",
// 		text: "You want to close this Event?",        
// 		type: "warning",   
// 		showCancelButton: true,   
// 		confirmButtonColor: "#DD6B55",
// 		confirmButtonText: "Yes, delete it!", 
// 		closeOnConfirm: false 
// 	}, 
// 	function(){   
// 		$("#myform").submit();
// 	});
// }

 </script>

</body>
</html>