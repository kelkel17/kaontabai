<?php

include '../dbconn.php';
	if(isset($_POST['Add']))
	{

		
		$id = $_SESSION["id"];
		$name = $_POST['name'];	
		$desc = $_POST['desc'];		
		$type = $_POST['testme'];
		$number = FLOOR(RAND(100,1000));
		$category = $_POST['category'];	
		$price = $_POST['price'];
		$image = $_FILES['image']['name'];
		$directory = "../../Image/";
		$path = time().$image;
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
                echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Food/food.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
            }else{		
			  		if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
			  		{
					
						$data = array($id,$name,$desc,$category,$type,$price,$path,$number);
						addMenu($data);
						// $_SESSION['id'] = $con->lastInsertId();
						echo '<script> alert("Successfully Added a Food"); window.location="../../Model/Food/food.php" </script>';	
					}else{
						echo '<script> alert("Error in adding a Food"); window.location="../../Model/Food/food.php" </script>';
					}
			}
		
	}	
		
?>