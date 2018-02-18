<?php
	include '../dbconn.php';

	islogged2();
	$id = $_SESSION['id'];
	$con = con();
	$sql = "SELECT * FROM restaurants WHERE restaurant_name LIKE '%".$_POST["search"]."%' ";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$view = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
	$output = '';
    // echo count($view);
	if(count($view) > 0){
		foreach ($view as $row) {
              $resId = $row['restaurant_id'];
              $rate = getRate($resId);
			$output = '

         <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />
         <script src="../../assets/js/vendor/star-rating.min.js"></script>  
				<div class="container" id="result" style="width: 90%;">
                      <div class="row">
                          <div class="abouts_content">
                              <div class="col-md-6">
                                  <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                               <img src="../../Image/'.$row['restaurant_logo'].'" align="top" alt=""/></div>
                                     
                              </div>
                              <form method="post">
                              <div class="col-md-6" id="tableFooter">
                                  <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                      <h4>'.$row['restaurant_name'].'</h4>
                                      <div style="width: 90%">
                                      <p>'.substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) > 500) ? '...' : '').'</p>
                                      </div>
                                      <br>
                                      <a href="restaurantinfo.php?cid='.$row['restaurant_id'].'&id='.$id.'">
                                          
                                          <input type="hidden" name="cid" value="'.$row['restaurant_id'].'">
                                          <input type="hidden" name="id" value="'.$row['restaurant_id'].'">
                                          <input type="submit" name="visit" value="More Info" class="btn btn-primary"></a>


                                       
                                     
                                     <a href="restaurantinfo.php?cid='.$row['restaurant_id'].'&id='.$id.'" class="btn btn-primary">Book A Table</a>
                                       

                                     <br /><br/>
                                     <input value='.$rate.' type="number" id="rate" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId='.$resId.' disabled>
                                  </div>  
                              </div>
                              </form>

                          </div>
                      </div>
                    </div>
			';
		}
		echo $output;
	}
	else{
		echo '<div style="height:530px;">
                <div class="container4"><h3>No Restaurant Found</h3></div>
              </div>';

	}
?>