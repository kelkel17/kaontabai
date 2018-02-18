<?php
	include '../dbconn.php';
	$con = con();
	$output = '';
	$sql = "SELECT * from menus where m_name like '%".$_POST["search"]."%'";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(count($data) > 0){
		$output .='<thead>
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
		
		  </thead>';
		 foreach ($data as $row) {
		 		echo '<tr>

		 				<td>'.$row['m_name'].'</td>';
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
		 		';
		  } 
	}
?>