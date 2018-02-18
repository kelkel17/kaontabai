<?php
	require_once('../dbconn.php');
	
    if(isset($_POST['Update'])){
    	$id = $_POST['id'];
    	$user = $_POST['username'];
    	$pass = $_POST['password'];
    	$pass2 = $_POST['password2'];
    	$name = $_POST['rname'];
    	$addr = $_POST['addr'];
    	$contact = $_POST['contact'];
    	$otime = $_POST['otime'];
    	$ctime = $_POST['ctime'];
    	$desc = $_POST['desc'];
    	$image = $_FILES['image']['name'];
    	$max = $_POST['max'];
    	$promo = $_POST['promo'];
    	$email = $_POST['email'];
		$checkbox2 = "";
		$directory = "../../Image/";
		$path = time().$image;
		  	if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
		  	{
		  		if($pass==$pass2){
		  			$data = array($user,$pass,$name,$addr,$contact,$otime,$ctime,$path,$desc,$max,$email,$id);
		  			updateOwner($data);
		  			if($data){
		  				foreach ($promo as $check) {
			  				$sql = "SELECT promo_id FROM promo_restaurant WHERE promo_id = :promo";
				            $con = con();
				            $sthandler = $con->prepare($sql);
				            $sthandler->bindParam(':promo', $check);
				            $sthandler->execute();

				            if($sthandler->rowCount() > 0){
				                echo '<script>alert("You already availed this promo!"); window.location="../../View/updaterestaurant.php?id='.$id.'";</script>';
				            } else{
		  						
									$data2 = array($check,$id);
		  							addPromo($data2);	
								}
						}		  			
		  				echo '<script> alert("Succesfully Updated your restaurant information"); window.location="../../View/updaterestaurant.php?id='.$id.'";</script>';
		  			}
		  		}
		  	}
		
	}	
?>