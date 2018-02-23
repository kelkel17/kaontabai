<?php 
	
    include '../../Controller/dbconn.php';
    islogged();
    $id = $_SESSION['id'];
  
?>

<!DOCTYPE html>
<html>
<?php include('../header.php'); ?>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
			<li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
			<li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class="active"><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="page-header" style="float: left;margin: 10px;">Combo Meals</h1>
				<button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct" style="float: left;margin: 10px;">Add Comobo Meal</button> 
			</div>
				
				<?php include('../Food/modal.php'); ?>
		</div><!--/.row-->

<div class="table-responsive">
<table  id="dataTable" class="cell-border compact display">
		  <thead>
		    <tr>
		      <th><center>Combo Meal ID</center></th>		
		      <th><center>Combo Meal Name</center></th>	
		      <th><center>Combo Meal Description</center></th>
		      <th><center>Combo Meal Price</center></th>
		      <th><center>Combo Meal Image</center></th>
		      <th><center>Combo Meal Status</center></th>
		      <!-- 	<th>Image</th> -->
		      
		      <th><center>Action</center></th>

		    </tr>
		
		  </thead>

	<tbody>
		<tr>
	<?php 
		$id = $_SESSION['id'];
        $sql = "SELECT *, cm.menu_id as combo_menu_id FROM combo_meals cm, menus m WHERE cm.menu_id = m.menu_id AND cm.restaurant_id = m.restaurant_id AND cm.restaurant_id = '$id'";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
  
        foreach($rows as $row)	
        {
		  	echo '<td><center>'.$row['cm_number'].'<center></td>';
		    echo '<td><center>'.$row['cm_name'].'</center></td>';
		    echo '<td>'.substr($row['cm_desc'], 0, 50).((strlen($row['cm_desc']) > 50) ? '...' : '').'</td>';
	       	echo '<td><center>'.$row['price'].'</center></td>';
	       	echo '<td><img src="../../Image/'.$row['image'].'" style="width:25px; height:25px;"></td>';
	       	echo '<td><center>'.$row['status'].'</center></td>'; 
	       // echo '<td>'.'<img src="../../Image/'.$row['Product_image'].'" style="width: 150px; height:150px;"/>'.'</td>';
	      


	      ?>
	      <div class="cell">
              <td><center>
                  <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['cm_id']; ?>" >

                  	<i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                  </a>
           <?php if($row['m_status'] == "Available"){?>       
					<a href="#" onclick="deact(<?php echo $row['cm_id'];?>);">
                  	<i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
               	  </a>
               	  	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
           <?php }elseif($row['m_status'] != "Available"){ ?>       
                  	<i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
					  <a href="#" onclick="activate(<?php echo $row['cm_id'];?>);">
                  	<i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                  </a>
            <?php } ?>  	    	  
               	  </center>
               	</td>
           </div>   
      	 </tr>
      	 <?php include('../Food/editmodal.php'); ?>
         
		 	<?php } ?>	 
		    
		</tbody>
		</table>
		</div>
	</div>	<!--/.main-->

 <script src="../../something/js/global.js"></script>
 <script>
					function deact(eventId){
						swal({
									title: "Deactivate Combo Meal",
									text: "Are you sure you want to deactivate this Combo Meal?",
									buttons:true,
                  					dangerMode: true
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/RestaurantsController/combo.php",
										data: {'deact':eventId},
										cache: false,
										success: function(response){
											swal({
												title: "Succesfully deavtivate the Combo Meal",
												text: "",
												icon: "success"
											}).then(function(){ window.location="promo.php";});
										}
									});
								}else{
									swal("Error in deactivating the Combo Meal","","error");
								}
							});
					}
					function activate(openId){
						swal({
									title: "Re-activate event",
									text: "Are you sure you want to re-activate this Combo Meal?",
									buttons:true,
                 					dangerMode: true
							}).then(function(value){
								
								if(value){
									// alert(eventId);
									$.ajax({
										type: "post",
										url: "../../Controller/RestaurantsController/combo.php",
										data: {'activate':openId},
										cache: false,
										success: function(response){
											swal({
												title: "Succesfully re-activated  Combo Meal",
												text: "",
												icon: "success"
											}).then(function(){ window.location="promo.php";});
										}
									});
								}else{
									swal("Error in re-activating the Combo Meal","","error");
								}
							});
					}
				</script>	
</body>
<script>
    function loadImage(event,el){
		console.log(el);
        var loadImg = document.getElementById(el);
        loadImg.src = URL.createObjectURL(event.target.files[0]);
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
} );
 </script>
</html>
