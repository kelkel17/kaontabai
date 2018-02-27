<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Succsfully Updated an event",
				icon: "success"
			}).then(function(){
					window.location = "../../View/indexadmin.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating an event",
				icon: "error"
			}).then(function(){
					window.location = "../../View/updaterestaurant.php";
			});
		});
	}
	function warningAlert(){
		$(function(){
			swal({
				title:"Image type error",
				text:"Image type must be PNG/JPEG/JPG only",
				icon: "warning"
			}).then(function(){
					window.location = "../../View/updaterestaurant.php";
			});
		});
	}
</script>
<?php
	include('../dbconn.php');
	
    if(isset($_POST['Update'])){
    	$id = $_POST['id'];
    	$user = $_POST['username'];
    	$pass = $_POST['password'];
    	//$pass2 = $_POST['password2'];
    	$name = $_POST['rname'];
    	$addr = $_POST['addr'];
    	$contact = $_POST['contact'];
    	$otime = $_POST['otime'];
    	$ctime = $_POST['ctime'];
    	$desc = $_POST['desc'];
    	$image = $_FILES['image']['name'];
		$max = $_POST['max'];
		$maxdate = $_POST['maxdate'];
    	$promo = $_POST['promo'];
    	$email = $_POST['email'];
		$checkbox2 = "";
		$directory = "../../Image/";
		$path = time().$image;
		if(!empty($image))
            $path = time().$image;
		else  
			$path = '';
		
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));	
		if(empty($path))
			$data = array($user,$pass,$name,$addr,$contact,$otime,$ctime,$desc,$max,$maxdate,$email,$id);
		  	else{	
				 if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
						echo '<script>warningAlert();</script>';
				 else{	
					if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
						{
							$data = array($user,$pass,$name,$addr,$contact,$otime,$ctime,$path,$desc,$max,$maxdate,$email,$id);
							foreach ($promo as $check) {
								$sql = "SELECT promo_id, restaurant_id FROM promo_restaurant WHERE promo_id = :promo AND restaurant_id = :id";
								$con = con();
								$sthandler = $con->prepare($sql);
								$sthandler->bindParam(':promo', $check);
								$sthandler->bindParam(':id', $id);
								$sthandler->execute();

								if($sthandler->rowCount() > 0)
									echo '<script>errorUpdateAlert();</script>';
								else{
									$data2 = array($check,$id);
									
									addPromo($data2); 
								}	 
							}
						}
				 }			   
			  }	 
			  updateOwner($data,$path);
			 echo '<script> updateAlert();</script>';
	}	
?>