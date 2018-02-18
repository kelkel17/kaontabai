<?php
	include '../dbconn.php';
	islogged2();
	$id = $_SESSION['id'];
	$con = con();
	$sql = "SELECT * FROM restaurants WHERE restaurant_name LIKE '$_GET[search]%'";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$output = '';
	foreach ($view as $row) {
		// foreach ($view as $row) {
                     $resId = $row['restaurant_id'];
                     $rate = getRate($resId);
			$output = '
				<div class="container" id="result">
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

                                <p> '.substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) > 500) ? '...' : '').'</p>
                                
                                <a href="restaurantinfo.php?cid='.$row['restaurant_id'].'&id='.$id.'">
                                    
                                    <input type="hidden" name="cid" value="'.$row['restaurant_id'].'">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <input type="submit" name="visit" value="More Info" class="btn btn-primary"></a>


                                 
                               
                               <a href="restaurantinfo.php?cid='.$row['restaurant_id'].'&id='.$id.'" class="btn btn-primary">Book A Table</a>
                                
                               <br /><br/>
                               <input value="'.$rate.'" type="number" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId='.$resId.' disabled>
                            </div>  
                        </div>
                        </form>
                    </div>
                    
                </div>
            </div>';
		// }
		echo $output;
	}
?>