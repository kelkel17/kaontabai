<?php 
	
    include '../../Controller/dbconn.php';
    islogged();

  
  if(isset($_POST['updateProduct'])){
  	$id = trim($_POST['id']);
	$name = trim($_POST['name']);	
	$desc = trim($_POST['desc']);
	$type = trim($_POST['type']);		
	$category = trim($_POST['category']);		
	$price = trim($_POST['price']);
	$image = $_FILES['image']['name'];
	$directory = "../../Image/";
	$path = time().$image;
	$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
	if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
         echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Food/food.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
    }else{	  	
		if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path)){
	    
	    	$data = array($name,$desc,$category,$type,$price,$path, $id);
	   		updateProduct($data);
	    //	echo '<script> alert("Successfully Updated the Product"); window.location="../../Model/Food/food.php" </script>';
				
  		} else{
  		//	echo '<script> alert("Error in Updating a Product"); window.location="../../Model/Food/food.php" </script>';
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
       <!-- <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"> -->

	<link href="../../something/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../something/css/datepicker3.css" rel="stylesheet">
	<link href="../../something/css/styles.css" rel="stylesheet">

	<!-- <script src="../../something/js/jquery.min.js"></script> -->
	<script src="../../something/js/jquery-1.11.1.min.js"></script>
	<script src="../../something/js/bootstrap.min.js"></script>
<!-- 	<script src="../../something/js/chart.min.js"></script>
	<script src="../../something/js/chart-data.js"></script>
	<script src="../../something/js/easypiechart.js"></script>
	<script src="../../something/js/easypiechart-data.js"></script>
 -->	<script src="../../something/js/bootstrap-datepicker.js"></script>
	<script src="../../something/js/custom.js"></script>
	<!-- <link href="../../something/fonts/css.css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
	<!--Custom Font-->
	<!--<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">-->
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
					  		?>	
								<div><em class="fa fa-envelope"></em><?php echo $row['total'];?> New Message
									<span class="pull-right text-muted small"><?php  echo date('g:i A',strtotime($row['date_time_receive']));?></span></div>
							<?php } $con = null; ?>
							</a></li>
							<li class="divider"></li>
							<li><a href="../../Model/Restaurant/reservations.php">
							<?php
								$id = $_SESSION['id'];
					       		$con = con();
					       		$sql = "SELECT COUNT(res_status) as total FROM reservations WHERE res_status = 'Pending' and restaurant_id = $id";
					       		$stmt = $con->prepare($sql);
					       		$stmt->execute();
					       		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					       		foreach ($rows as $row) {
					  		?>	
								<div><em class="fa fa-heart"></em><?php echo $row['total']; ?> Pending Reservations  
									<span class="pull-right text-muted small">4 mins ago</span></div>
							<?php } $con = null;?>
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
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><a href="updaterestaurant.php?id=<?php echo $row['restaurant_id'];?>">Edit Restaraunt </a>
				<?php 		}
					}
				
			?>
				</div>
			</div>
			<div class="clear"></div>

		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="active"><a href="../Restaurant/market.php"><em class="fa fa-dashboard">&nbsp;</em> Market A Product</a></li>
			<li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-dashboard">&nbsp;</em> Reservations</a></li>
			<li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
			<li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			<li class=""><a href="../Restaurant/promo.php"><em class="fa fa-clone">&nbsp;</em> Promos</a></li>
			<li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
			<li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
			<li class=""><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
			<li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">New Products</h1>
			</div>
				<button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct">Add Product</button> 
				<!-- ADD PRODUCT modal -->
					    <div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
					        <div class="modal-dialog" role="document">
					            <div class="modal-content">
					                <div class="modal-header">
				                    	<button class="close" data-dismiss="modal" type="button">
				                            <span>&times;</span>
				                        </button>
				                    	<center><h3 class="modal-title">Add Product</h3></center>
                   					</div>
					                <form method="post" action="../../Controller/FoodsController/addfood.php" class="form-horizontal" enctype="multipart/form-data">
					                
					                <div class="modal-body">
	                                        <div class="form-group text-center">
					                            <label for="image" class="hover">
					                            <!-- <img src="../../Image/blank.jpg" "> -->
					                            <img src="../../Image/blank.jpg" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px"/>
					                            </label>
					                            <input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:hidden" id="image">
					                        </div>
					                            <div class="tab-pane">
					                            	<label for="pname">Product Name</label>
					                                <input type="text" name="name" id="pname" class="form-control" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div>
					                            <br />
					                            <div class="tab-pane">
					                            	<label for="pcategory">Product Category</label>
					                            	<ul class=" nav nav-tabs customtab m-b-40" id="tabMenu" role="tablist"><!-- 
    													<li class="ml-auto nav-item" role="presentation"><a href="#all" class="nav-link active" role="tab" data-toggle="tab" aria-controls="all" aria-expanded="true">All</a></li> -->
    											<?php 
								                		$category = viewAllMenuCategory();
								                		foreach ($category as $row){	
								                ?>
													<li class="nav-item" role="presentation"><a href="#<?php echo $row['mc_id']; ?>" class="nav-link" role="tab" aria-expanded="false" aria-controls="<?php echo $row['mc_id']; ?>" data-toggle="tab" onclick="$('#category_types select').attr('name',''); $('#category').val(<?php echo $row['mc_id']; ?>); $('#category_types #'+<?php echo $row['mc_id']; ?>+' select').attr('name','type');"><?php echo ucfirst($row['mc_name']); ?></a>
													</li>
												<?php }?>	
														<input type="hidden" id="category" name="category" value="0">
												<!-- onclick="$('#'+<?php echo $row['mc_id']; ?>).find('input').val(<?php echo $row['mc_id']; ?>)" -->
													</ul>
					                            	<div id="category_types" class="tab-content">
														<div class="tab-pane" id="1">
														  <label for="ptype">Product Type</label>
														  <select name="type" id="type" class="form-control" required>
														        <option value="Appetizer">Appetizer</option>
														        <option value="Pork">Pork</option>
														        <option value="Beef">Beef</option>
														        <option value="Fish">Fish</option>
														        <option value="Sizzlers/Grilled">SIZZLERS/GRILLED</option>
														        <option value="Noodles/Rice">NOODLES/RICE</option>
														        <option value="Soup/Vegetables">Soup/Vegetables/Salad</option>    
														    </select>   
														</div>    
														<div class="tab-pane" id="2">
														  <label for="ptype">Product Type</label> 
														  <select name="type" id="type" class="form-control" required>
														        <option value="Beer">Beer</option>
														        <option value="Soft Drinks">Soft Drinks</option>
														        <option value="Tea">Tea</option>
														        <option value="Wine">Wine</option>
														        <option value="Coffe/Milk/Chocolate">Coffe/Milk/Chocolate</option>
														        <option value="Juice">Juice</option>
														        <option value="Shake">Shake</option>  
														    </select>
														</div>    
														<div class="tab-pane" id="3">
														  <label for="ptype">Product Type</label>  
														  <select name="type" id="type" class="form-control" required>
														        <option value="Ice Cream">Ice Cream</option>
														        <option value="Cake">Cake</option>
														        <option value="Halo-Halo">Halo-Halo</option>
														        <option value="Special">Special</option>
														    </select>   
														</div>
												    </div>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div>
					                            <br />
					                            <div class="tab-pane">
					                            	<label for="pprice">Price</label>
					                                <input type="number" step="any" name="price" id="pprice" class="form-control" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                                
					                            </div>
					                            <br />
					                            <div class="tab-pane">
					                            	<label for="psoh">Product Description</label>
					                                <textarea type="text" name="desc" id="psoh" class="form-control"></textarea>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div>
					          		</div>
					                <div class="modal-footer">
					                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
					                    <button type="submit" name="Add" class="btn btn-primary hover">Save</button>
					                </div>
					            	</form>
					            </div>
					        </div>
					  
					</div><!-- end of add product modal -->
			<div class="col-lg-4">
		    <div class="input-group">

		      <input type="text" class="form-control" placeholder="Search for...">
		      <span class="input-group-btn">
		        <button class="btn btn-secondary" type="button">Go!</button>
		      </span>
		    </div>
			<br>
		</div>

		</div><!--/.row-->

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-condensed">
		  <thead>
		    <tr class="info">	
		      <th><center>Product Name</center></th>	
		      <th><center>Product Description</center></th>			     
		      <th><center>Product Category</center></th>			     
		      <th><center>Product Type</center></th>   
		      <th><center>Product Price</center></th>
		      <th><center>Product Status</center></th>
		      <!-- 	<th>Image</th> -->
		      
		      <th><center>Action</center></th>

		    </tr>
		
		  </thead>

	<tbody>
		<tr>
	<?php 
		$id = $_SESSION['id'];
        $sql = "SELECT * FROM menus m, menu_category c WHERE m.mc_id = c.mc_id AND m.restaurant_id = $id";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
  
        foreach($rows as $row)	
        {
		  	echo '<td>'.$row['m_name'].'</td>';
		    echo '<td>'.substr($row['m_desc'], 0, 50).((strlen($row['m_desc']) > 50) ? '...' : '').'</td>';
		    echo '<td><center>'.$row['mc_name'].'</center></td>';
		   	echo '<td><center>'.$row['m_category'].'</center></td>';
	       	echo '<td><center>'.$row['m_price'].'</center></td>';
	       	echo '<td><center>'.$row['m_status'].'</center></td>'; 
	       // echo '<td>'.'<img src="../../Image/'.$row['Product_image'].'" style="width: 150px; height:150px;"/>'.'</td>';
	      


	      ?>
	      <div class="cell">
              <td><center>
                  <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['menu_id']; ?>" >

                  	<i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                  </a>
           <?php if($row['m_status'] == "Available"){?>       
                  <a href="#" data-toggle="modal" data-target="#deactProduct<?php echo $row['menu_id']; ?>">
                  	<i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
               	  </a>
               	  	<i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
           <?php }elseif($row['m_status'] != "Available"){ ?>       
                  	<i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
               	  <a href="#" data-toggle="modal" data-target="#actProduct<?php echo $row['menu_id']; ?>">
                  	<i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                  </a>
            <?php } ?>  	    	  
               	  </center>
               	</td>
           </div>   
      	 </tr>
      	 <!-- Edit Product Modal -->
           <div class="modal fade" tabindex="-1" role="dialog" id="updateProduct<?php echo $row['menu_id']; ?>">
	            <div class="modal-dialog" role="document">
	                <div class="modal-content">
	                    <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Edit Product</h3></center>
                    </div>
	                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
	                    <div class="modal-body">
	                                        <div class="form-group text-center">
					                            <label for="image<?php echo $row['menu_id']; ?>" class="hover">
					                            <!-- <img src="../../Image/blank.jpg" "> -->
					                           
					                            <img src="../../Image/<?php echo $row['m_image']; ?>" id="preview<?php echo $row['menu_id']; ?>" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px"/>
					                           
					                            </label>
					                            <input type="file" name="image" onchange="loadImage(event,'preview<?php echo $row['menu_id']; ?>')" style="visibility:hidden" id="image<?php echo $row['menu_id']; ?>" value="<?php echo $row['m_image']?>">
					                        </div>
					                        <div class="floating-labels">
					                            <div class="form-group">
					                            	<label for="pname">Product Name</label>
					                            	<input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
					                                <input type="text" value="<?php echo $row['m_name']; ?>" name="name" id="pname" class="form-control" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                                
					                            </div>
					                            <div id="category_types2" class="tab-pane">
					                            	<label for="pcategory">Product Category</label>
					                            	<ul class=" nav nav-tabs customtab m-b-40" id="tabMenu2" role="tablist"><!-- 
    													<li class="ml-auto nav-item" role="presentation"><a href="#all" class="nav-link active" role="tab" data-toggle="tab" aria-controls="all" aria-expanded="true">All</a></li> -->
    											
    											<?php 
								                		$category = viewAllMenuCategory();
								                		$data = '';
								                		foreach ($category as $rows){	
								                			$data .= $rows['mc_id'].",";
								                ?>
													<li class="nav-item" role="presentation"><a href="#type<?php echo $rows['mc_id']; ?>" test='heloo' class="nav-link" role="tab" aria-expanded="false" aria-controls="<?php echo $rows['mc_name']; ?>" data-toggle="tab"><?php echo ucfirst($rows['mc_name']); ?></a></li>
													<?php }
														$datas = explode(",",$data);

													 ?>
													</ul>
													<input type="hidden" id="category" name="category" value="0">
					                            	<div id="category_types2" class="tab-content">
														<div class="tab-pane active" id="type<?php echo $datas[0]; ?>">    
														  <label for="ptype">Product Type</label>
														  <input type="text" name="category" value="<?php echo $datas[0]; ?>">
														  <select name="type" id="type" class="form-control" required>
														        <option value="Appetizer">Appetizer</option>
														        <option value="Pork">Pork</option>
														        <option value="Beef">Beef</option>
														        <option value="Fish">Fish</option>
														        <option value="Sizzlers/Grilled">SIZZLERS/GRILLED/</option>
														        <option value="Noodles/and/Rice">NOODLES/RICE/</option>
														        <option value="Soup/Vegetables">Soup/Vegetables/Salad</option>    
														    </select>   
														</div>    
														<div class="tab-pane" id="type<?php echo $datas[1]; ?>">
														  <label for="ptype">Product Type</label> 
														  <input type="text" name="category" value="<?php echo $datas[1]; ?>">
														  <select name="type" id="type" class="form-control" required>
														        <option value="Beer">Beer</option>
														        <option value="Soft Drinks">Soft Drinks</option>
														        <option value="Tea">Tea</option>
														        <option value="Wine">Wine</option>   
														    </select>
														</div>    
														<div class="tab-pane" id="type<?php echo $datas[2]; ?>">
														  <label for="ptype">Product Type</label>
														  <input type="text" name="category" value="<?php echo $datas[2]; ?>">  
														  <select name="type" id="type" class="form-control" required>
														        <option value="Ice Cream">Ice Cream</option>
														        <option value="Shake">Shake</option>
														        <option value="Cake">Cake</option>
														        <option value="Halo-Halo">Halo-Halo</option>
														        <option value="Special">Special</option>
														    </select>   
														</div>    
												    </div>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div>
					                            <div class="form-group">
					                            	<label for="pprice">Price</label>
					                                <input type="number" step="any" value="<?php echo $row['m_price']; ?>"  name="price" id="pprice" class="form-control" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                                
					                            </div>
					                            <div class="form-group">
					                            	<label for="psoh">Product Description</label>
					                                <textarea type="text" name="desc" id="psoh" class="form-control" required><?php echo $row['m_desc']; ?></textarea>
					                                <span class="highlight"></span><span class="bar"></span>
					                                
					                            </div>
					                        </div>
					          </div>
					                <div class="modal-footer">
					                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
					                    <input type="submit" name="updateProduct" class="btn btn-primary hover" value="Update">
					    		               
	                    			</div>
	                    	 </form>
		            </div>
		        </div>
	        </div> <!--End of Edit Product Modal -->    

	        <div class="modal fade" tabindex="-1" role="dialog" id="deactProduct<?php echo $row['menu_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Deactivate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to deactivate this product?</h5>
                        <p class="m-t-30">
                            If you deactivate this product, it will not be shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/deactivatefood.php">
                        <input type="submit" name="deactivate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
        	</div><!-- end of deactivate modal -->  

	        <div class="modal fade" tabindex="-1" role="dialog" id="actProduct<?php echo $row['menu_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Re-Activate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to re-activate this product?</h5>
                        <p class="m-t-30">
                            If you re-activate this product, it will be again shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/deactivatefood.php">
                        <input type="submit" name="activate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
        	</div><!-- end of Activate modal -->      
         
		 	<?php } ?>	 
		    
		</tbody>
		</table>
		</div>
	</div>	<!--/.main-->

 <script src="../../something/js/global.js"></script>
 <!-- <script src="../../something/js/global2.js"></script> -->
		
</body>
<script>
    function loadImage(event,el){
		console.log(el);
        var loadImg = document.getElementById(el);
        loadImg.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</html>
