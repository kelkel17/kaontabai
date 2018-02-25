<?php 
	
    include '../../Controller/dbconn.php';
    islogged();
?>

<!DOCTYPE html>
<html>
<?php include('../header.php'); ?>

        <ul class="nav menu">
            <li class=""><a href="../Restaurant/storystaff.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class="active"><a href="../Restaurant/reservationsstaff.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/eventstaff.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Restaurant/promostaff.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class=""><a href="../Room/roomsstaff.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class=""><a href="../Food/foodstaff.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reservations</h1>
			</div>
		</div><!--/.row-->
<div class="row">
			<div class="col-lg-12">
				Filter by:
				<select name="filter" id="filter">
					<option value="0">Reservations without table number</option>
					<option value="1">Reservations with table number</option>
				</select>
			</div>
				
</div><!--/.row-->
<br/>
		<div class="table-responsive" id="div0">
			<table id="dataTable"  class="cell-border compact display">
				<thead>
				    <tr>
				  	 <th><center>Reservation ID</center></th>		
				      <th><center>Customer Name</center></th>				     
				      <th><center>Reservaton Date & Time</center></th>		     
				      <!-- <th><center>Table Number</center></th>  -->
				      <th><center>Special Request</center></th>
				      <th><center>Number of Guests</center></th>
				      <th><center>Status</center></th>
				      
				      <th>Action</th>

				    </tr>
				</thead>
				<tbody>
					<tr>
			
			<?php 
					$id = $_SESSION['id'];
		       		$con = con();
		       		$sql = "SELECT * FROM reservations as r, customers as c WHERE r.customer_id = c.customer_id AND r.restaurant_id = '$id' ORDER BY created DESC";
		       		$stmt = $con->prepare($sql);
		       		$stmt->execute();
		       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					   date_default_timezone_set('Asia/Manila');
					   $date = date('Y-m-d g');
					 //	  echo $date;
		        foreach($rows as $row){	
						
		        	if($row['table_id'] == 0){
						$newdate = date('Y-m-d g', strtotime($row['reservation_date'].$row['reservation_time']));
						$reservation = $row['reservation_id'];
						if($date > $newdate){
							$status = "Expired";
							$data = array($status, $reservation);
							ChangeAll($data);
						}
						// if($date > date('Y-m-d g', strtotime($row['reservation_date'].$row['reservation_time']))){
						
						// }
					        	 echo '<td><center>'.$row['reservation_number'].'</center></td>';
							   	 echo '<td><center>'.$row['customer_fname'].' '.$row['customer_lname'].'</center></td>';
							     echo '<td><center>'.date('F d, Y g:i A',strtotime($row['reservation_date'].$row['reservation_time'])).'</center></td>';
							     // echo '<td><center>'.$row['table_num'].'</center></td>';
							   	 echo '<td><center>'.$row['spec_reqs'].'</center></td>'; 
						         echo '<td><center>'.$row['no_of_guests'].'</center></td>'; 
							     echo '<td><center>'.$row['res_status'].'</center></td>'; 	      
						     
						     ?> 
						       <div class="cell">
					                    <td><center>
										<?php if($date > $newdate){?>
											<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Accept"></i>
											<i class="fa fa2 fa-times" aria-hidden="true" title="Cancel"></i>
					                    <?php } elseif($row['res_status'] == "Pending" || $row['res_status'] == "Expired"){?>	
											
											<a href="#" onclick="accept(<?php echo $row['reservation_id'];?>);">
					                    	<i class="fa fa-circle-o" aria-hidden="true" title="Accept"></i></a>
					                    	
					                    	<i class="fa fa2 fa-times" aria-hidden="true" title="Cancel"></i></a>
					                    <?php }elseif($row['res_status'] == "Reserved" || $row['res_status'] == "Expired"){?>	
					                    	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Accept"	></i>
					                    	<a href="#" onclick="cancel(<?php echo $row['reservation_id'];?>);">
					                    		<i class="fa fa-times" aria-hidden="true" title="Cancel"></i>	
					                    	</a>	
					                    <?php }elseif($row['res_status'] == "Cancelled" || $row['res_status'] == "Expired"){  ?>
					                    	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Accept"	></i>
					                    	<i class="fa fa2 fa-times" aria-hidden="true" title="Cancel"></i>
					                    <?php }?>	
					                    </center></td>
					               
					            </div>  
					            </tr>           
					             <!-- Reservation Modal -->
           <div class="modal fade" tabindex="-1" role="dialog" id="cancelReservation<?php echo $row['reservation_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Cancel Reservation</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to cancel this Reservation?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/accept.php">
                        <input type="hidden" name="table" value="<?php echo $row['table_id']?>">
                        <input type="submit" name="cancel" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['reservation_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of accept modal --> 
          <div class="modal fade" tabindex="-1" role="dialog" id="updateReservation<?php echo $row['reservation_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Accept Reservation</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to accept this Reservation?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/accept.php">
                        <input type="hidden" name="table" value="<?php echo $row['table_id']?>">
                        <input type="submit" name="accept" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['reservation_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of cancel modal -->  
          <!-- End Reservation Modal -->
					       <?php }
					      }
					    ?>
			


				  </tbody>
			</table>
		</div>

		<div class="table-responsive" id="div1">
			<table id="dataTable2" class="cell-border compact display">
				  <thead>
				    <tr>
				  	 <th><center>Reservation ID</center></th>		
				      <th><center>Customer Name</center></th>				     
				      <th><center>Reservaton Date & Time</center></th>		     
				      <th><center>Table Number</center></th> 
				      <th><center>Special Request</center></th>
				      <th><center>Number of Guests</center></th>
				      <th><center>Status</center></th>
				      
				      <th>Action</th>

				    </tr>
				</thead>
				<tbody>
					<tr>
			
			<?php 
					$id = $_SESSION['id'];
		       		$con = con();
		       		$sql = "SELECT * FROM reservations as r, customers as c, tables as t WHERE t.table_id = r.table_id AND r.customer_id = c.customer_id AND r.restaurant_id = '$id' ORDER BY created DESC";
		       		$stmt = $con->prepare($sql);
		       		$stmt->execute();
		       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		            date_default_timezone_set('Asia/Manila');
                    $date = date('Y-m-d g');
                   
		        foreach($rows as $row){
		        	if($row['table_id'] != 0){
						$newdate = date('Y-m-d g', strtotime($row['reservation_date'].$row['reservation_time']));
						$reservation = $row['reservation_id'];
						if($date > $newdate){
							$status = "Expired";
							$data = array($status, $reservation);
							ChangeAll($data);
						}	
									// echo ;
					        	 echo '<td><center>'.$row['reservation_number'].'</center></td>';
							   	 echo '<td><center>'.$row['customer_fname'].' '.$row['customer_lname'].'</center></td>';
							     echo '<td><center>'.date('F j, Y g:m A',strtotime($row['reservation_date'])).'</center></td>';
							     echo '<td><center>'.$row['table_num'].'</center></td>';
							   	 echo '<td><center>'.$row['spec_reqs'].'</center></td>'; 
						         echo '<td><center>'.$row['no_of_guests'].'</center></td>'; 
							     echo '<td><center>'.$row['res_status'].'</center></td>'; 	      
						     
						     ?> 
						       <div class="cell">
					                    <td><center>
										<?php if($date > $newdate){?>
											<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Accept"></i>
											<i class="fa fa2 fa-times" aria-hidden="true" title="Cancel"></i>
					                    <?php } elseif($row['res_status'] == "Pending" || $row['res_status'] == "Expired"){?>	
					                    	<a href="#" onclick="accept(<?php echo $row['reservation_id']; ?>,'<?php echo $row['table_id'];?>');">
					                    	<i class="fa fa-thumbs-o-up" aria-hidden="true" title="Accept"></i></a>
					                    	<i class="fa fa2 fa-ban" aria-hidden="true" title="Cancel"></i>
					                    <?php }elseif($row['res_status'] == "Reserved" || $row['res_status'] == "Expired"){?>	
					                    	<i class="fa fa2 fa-thumbs-o-up" aria-hidden="true" title="Accept"></i>
					                    	<a href="#" onclick="cancel(<?php echo $row['reservation_id'];?>,'<?php echo $row['table_id'];?>');">
					                    		<i class="fa fa-ban" aria-hidden="true" title="Cancel"></i>	
					                    	</a>	
					                    <?php }elseif($row['res_status'] == "Cancelled" || $row['res_status'] == "Expired"){  ?>
					                    	<i class="fa fa2 fa-thumbs-o-up" aria-hidden="true" title="Accept"></i>
					                    	<i class="fa fa2 fa-ban" aria-hidden="true" title="Cancel"></i>
					                    <?php }?>	
					                    </center></td>
					               
					            </div>  
					            </tr>           

					       <?php }
					      }
					    ?>
			


				  </tbody>
				
				    
				
			</table>
		</div>
</div>	<!--/.main-->
<script>
					function accept(eventId,tableId){
						//alert(eventId+" "+tableId);
						swal({
									title: "Accept table",
									text: "Are you sure you want to Accept this reservations?",
									buttons:true,
                  					dangerMode: true,
									icon: "warning"
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/RestaurantsController/accept.php",
										data: {'accept':eventId,
												'table':tableId
										},
										cache: false,
										success: function(response){
											// console.log(response);
											swal({
												title: "Succesfully Accepted the reservations",
												text: "",
												icon: "success"
											}).then(function(){ window.location="reservations.php"; });
										}
									});
								}else{
									swal("Error in accepting the reservation","","error");
								}
							});
					}
					function cancel(openId,tableId){
						swal({
									title: "Cancel reservations",
									text: "Are you sure you want to Cancel this reservations?",
									buttons:true,
                 					dangerMode: true,
									icon: "warning"
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/RestaurantsController/accept.php",
										data: {'cancel':openId,
												'table':tableId
										},
										cache: false,
										success: function(response){
											swal({
												title: "Succesfully Cancel the reservations",
												text: "",
												icon: "success"
											}).then(function(){ window.location="reservations.php";});
										}
									});
								}else{
									swal("Error in cancelling the reservation ","","error");
								}
							});
					}
				</script>
 <script src="../../something/js/global.js"></script>
    <script>
            for(var j = 0; j < 2; j++){
                if(j == 0){
                document.getElementById('div'+j).style.display = '';
                 console.log(j);
                }else{
               document.getElementById('div'+j).style.display = 'none';
                console.log(j);
                }
            }
            var opt = document.getElementById('filter');
            opt.onchange = function(){
                for(var i = 0; i < 2; i++){
                   // alert(i);
                document.getElementById('div'+i).style.display = 'none';
                }
                document.getElementById('div'+ this.value).style.display = '';
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
     $('#dataTable2').DataTable( {
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