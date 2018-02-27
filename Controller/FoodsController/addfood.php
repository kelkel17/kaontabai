`<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(){
	$(function(){
		swal({
				title:"Successfully",
				text:"Added a Menu",
				icon: "success"
		}).then(function(){
				window.location = "../../Model/Food/food.php";
			});
		});
	}
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Updated a Menu",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Food/food.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating a Menu",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Food/food.php";
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
					window.location = "../../Model/Food/food.php";
			});
		});
	}
	function warningAlert2(){
		$(function(){
			swal({
				title:"Error in adding a Menu",
				text:"Menu already exist",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Food/food.php";
			});
		});
	}
	function errorAlert(){
		$(function(){
			swal({
				title:"Error in adding a menu",
				text:"",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Food/food.php";
			});
		});
	}
</script>
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
		if(empty($image))
		$path = '';
		else
		$path = time().$image;
			$sql = "SELECT m_name, restaurant_id FROM menus WHERE m_name = :name AND restaurant_id = '$id'";
			$con = con();
			$sthandler = $con->prepare($sql);
			$sthandler->bindParam(':name', $name);
			$sthandler->execute();
			if($sthandler->rowCount() > 0)
				echo '<script>warningAlert2();</script>';
			else{
				$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
				if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !(empty($path)))
					echo '<script>warningAlert();</script>';
				else{
						if(empty($path))
							$data = array($id,$name,$desc,$category,$type,$price,$number);	
						else{
							if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
								$data = array($id,$name,$desc,$category,$type,$price,$path,$number);
							else
								echo '<script>errorAlert2();</script>';
						}	
							
					}
						addMenu($data,$path);
						echo '<script>sweetMimitch();</script>';
		}				
	}	

	if(isset($_POST['updateProduct'])){
		$id = $_POST['id'];
		$name = $_POST['name']; 
		  $desc = $_POST['desc'];   
		  $type = $_POST['testme2'];
		  $category = $_POST['category']; 
		  $price = $_POST['price'];
		  $myID = $_SESSION['id'];
		  $image = $_FILES['image']['name'];
		 
		  $directory = "../../Image/";
		 if(!empty($image))
			  $path = time().$image;
		  else  $path = '';
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
		if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !empty($path))
			   echo '<script>warningAlert();</script>';
		  else{      
				  if(empty($path))
					  $data = array($myID,$name,$desc,$category,$type,$price,$id);  
				  else{
					  	if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
						  $data = array($myID,$name,$desc,$category,$type,$price,$path, $id);
					  else
						  echo '<script>errorUpdateAlert();</script>';
				  }
		} 
		 updateProduct($data,$path);   
		 echo '<script> sweetMimitch();</script>';
	}
	  
  
		
?>