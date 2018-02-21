<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(){
	$(function(){
		swal({
				title:"Successfully",
				text:"Added a Combo meal",
				icon: "success"
		}).then(function(){
				window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Updated a Combo meal",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating a Combo meal",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
	function warningAlert(){
		$(function(){
			swal({
				title:"Image type error",
				text:"Image type must be PNG/JPEG/JPG only",
				icon: "Warning"
			}).then(function(){
					window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
	function warningAlert2(){
		$(function(){
			swal({
				title:"Error in adding a combo meal",
				text:"Combo meal already exist",
				icon: "Error"
			}).then(function(){
					window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
	function errorAlert(){
		$(function(){
			swal({
				title:"Error in adding a combo meal",
				// text:"Combo meal already exist",
				icon: "Error"
			}).then(function(){
					window.location = "../../Model/Restaurant/promo.php";
			});
		});
	}
</script>
<?php
	include '../dbconn.php';
	if(isset($_POST['Add'])){
		$id = $_SESSION["id"];
		$name = $_POST['name'];
		$menu = $_POST['menu'];
		$number = FLOOR(RAND(100,10000));
		$price = $_POST['price'];	
		$desc = $_POST['desc'];
		$image = $_FILES['image']['name'];
		$directory = "../../Image/";
		if(!(empty($image)))
		$path = time().$image;
		else
		$path = '';
		$men = implode(",",$menu);
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
                echo '<script> warningAlert();</script>';
            else{		
				if(empty($path))
					$data = array($id,$name,$desc,$price,$number,$men);
					else{
							if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path)){
										$sql= "SELECT cm_name FROM combo_meals WHERE cm_name = :name";
										$con = con();
										$sthandler = $con->prepare($sql);
										$sthandler->bindParam(':name', $name);
										$sthandler->execute();
										if($sthandler->rowCount() > 0)
												echo '<script>warningAlert2();</script>';
										else
											   $data = array($id,$name,$desc,$price,$path,$number,$men);
										
							 }
							 else
							 echo '<script> errorAlert(); </script>';		 
					}
						addCombo($data,$image);
						echo "<script>sweetMimitch();</script>";
																			
			}
				
				
	}

	if(isset($_POST['update'])){
		$cm = $_POST['cmid'];
		$cim = $_POST['cim'];
		$id = $_SESSION["id"];
		$name = $_POST['name'];
		$menu = $_POST['menu'];
		$price = $_POST['price'];	
		$desc = $_POST['desc'];
		$image = $_FILES['image']['name'];
		$directory = "../../Image/";
	
		if(!(empty($image)))
		$path = time().$image;
		else
		$path = '';
		$men = implode(",",$menu);
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
			echo '<script> warningAlert();</script>';
            else{		
				if(empty($path))
					$data = array($id,$name,$desc,$price,$men,$cim);
					else{
						if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
							$data = array($id,$name,$desc,$price,$path,$men,$cim);
						else
							
						echo '<script> errorUpdateAlert(); </script>';
					}
					
					addCombo($data,$image);
					echo "<script>updateAlert();</script>";
				}	
		}
?>
