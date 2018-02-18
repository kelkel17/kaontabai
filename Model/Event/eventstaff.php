<?php 
	
    include '../../Controller/dbconn.php';
    islogged();
    if(isset($_POST['updateEvent']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];	
		$date = $_POST['date'];		
		$time = $_POST['time'];
		$desc = $_POST['desc'];

			$data = array($name,$date,$time,$desc,$id);
			updateEvent($data);
	}
?>

<!DOCTYPE html>
<html>
<?php include('../header.php'); ?>

		<ul class="nav menu">
			<li class=""><a href="../Restaurant/storystaff.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class=""><a href="../Restaurant/reservationsstaff.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/eventsstaff.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Restaurant/promostaff.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class=""><a href="../Room/roomsstaff.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class="active"><a href="../Food/foodstaff.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-md-6" >
				<h1 class="page-header" style="float: left;margin: 10px;">Events</h1>
			</div>

		</div><!--/.row-->
		
<div class="table-responsive">
<table id="dataTable" class="cell-border compact display">
		  <thead>
		    <tr>	
		      <th><center>Event ID</center></th>
		      <th><center>Name</center></th>
		      <th><center>Date & Time</center></th>
		      <th><center>Description</center></th>
		      <th><center>Total Participants</center></th>
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
		   echo '<td><center>'.date('F j, Y',strtotime($row['event_date'])).' at '.date('g:i A',strtotime($row['event_time'])).'</center></td>';
	        echo '<td><center>'.$row['event_desc'].'</center></td>';
	       echo '<td><center>'.$row['event_part'].'</center></td>';
	        echo '<td><center>'.$row['event_status'].'</center></td>'; 
	    ?>
	        
	    <div class="cell">
            <td>
            	<a href="#" data-toggle="modal" data-target="#updateEvent<?php echo $row['event_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
            	<?php if($row['event_status']=="Open") {?>
                 <a href="#" data-toggle="modal" data-target="#close<?php echo $row['event_id']; ?>"><i class="fa fa-times" aria-hidden="true" title="Close"></i></a>	
                 <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Open" disabled></i>
                 <?php } elseif($row['event_status']=="Close") {?>
                 <i class="fa fa2 fa-times" aria-hidden="true" title="Close" disabled></i>
                 <a href="#" data-toggle="modal" data-target="#open<?php echo $row['event_id']; ?>"><i class="fa fa-circle-o" aria-hidden="true" title="Open"></i></a>
                 <?php } ?>
             </td>
         </div>
          </tr>
         <?php include('../Food/editmodal.php'); ?>
        <?php }?>


		    
		  </tbody>
		</table>
		
	</div>	<!--/.main-->
	
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
} );
 </script>
</body>
</html>