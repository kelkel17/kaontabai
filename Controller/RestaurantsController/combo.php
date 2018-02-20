<?php
	include '../dbconn.php';
	if(isset($_POST['Add'])){
		$id = $_SESSION["id"];
		$name = $_POST['name'];
		$menu = $_POST['menu'];
		$number = FLOOR(RAND(100,1000));
		$price = $_POST['price'];	
		$desc = $_POST['desc'];
		$image = $_FILES['image']['name'];
		$directory = "../../Image/";
		if(!(empty($image)))
		$path = time().$image;
		else
		$path = '';
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
                echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Restaurant/promo.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
            else{		
				
				
							if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
							{
										$sql= "SELECT cm_name FROM combo_meals WHERE cm_name = :name";
										$con = con();
										$sthandler = $con->prepare($sql);
										$sthandler->bindParam(':name', $name);
										$sthandler->execute();
										if($sthandler->rowCount() > 0)
												echo '<script>alert("You already availed this Combo meal!"); window.location="../../Model/Restaurant/promo.php?id='.$id.'";</script>';
										else{
											$men = implode(",",$menu);
											// echo $men;
											// foreach ($menu as $men) {
												if(empty($path))
													$data = array($id,$name,$desc,$price,$number,$men);
												else
													$data = array($id,$name,$desc,$price,$path,$number,$men);
												
												addCombo($data,$path);
												echo '<script> alert("Successfully Added a Combo meal"); window.location="../../Model/Restaurant/promo.php" </script>';	
											// } 	
												
										}
										
										
							}
							else
								echo '<script> alert("Error in adding a Combo meal"); window.location="../../Model/Restaurant/combo.php" </script>';
								
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
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
			echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Restaurant/promo.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
            else{		
					
				
							if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
							{
								
									
										
											$men = implode(",",$menu);
											echo $men;
												if(empty($path)){
													$data = array($id,$name,$desc,$price,$men,$cim);
													updateCombo($data,$path);
												}
												else{
													$data = array($id,$name,$desc,$price,$path,$men,$cim);
													updateCombo($data,$path);
												}
													
												// echo '<script> alert("Successfully updated a Combo meal"); window.location="../../Model/Restaurant/promo.php" </script>';	

										
							}
							// else
							// 	echo '<script> alert("Error in updating a Combo meal"); window.location="../../Model/Restaurant/promo.php" </script>';
								
			}
	}
?>