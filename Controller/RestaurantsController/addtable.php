<?php
include('../dbconn.php');
	if(isset($_POST['Add'])){
		$id = $_SESSION['id'];
		$tnum = $_POST['tnum'];
		$desc = $_POST['desc'];
		$max = $_POST['max'];
		$min = $_POST['min'];
		$image = $_FILES['image']['name'];
		$directory = "../../Image/";
		$path = time().$image;
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
                echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Food/food.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
            }else{		
			  		if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
			  		{
					
						$data = array($id,$tnum,$desc,$max,$min,$path);
						addTables($data);
						// $_SESSION['id'] = $con->lastInsertId();
					echo '<script> alert("Successfully Added a Table"); window.location="../../Model/Room/rooms.php" </script>';	
					}else{
					echo '<script> alert("Error in adding a Table"); window.location="../../Model/Room/rooms.php" </script>';
					}
			}
	}


    if(isset($_POST['update']))
    {
    	$id = trim($_POST['id']);
    	$rid = trim($_SESSION['id']);
    	$tnum = trim($_POST['tnum']);
    	$desc = trim($_POST['desc']);
    	$max = trim($_POST['max']);
    	$min = trim($_POST['min']);
    	$image = $_FILES['image']['name'];
		$directory = "../../Image/";
        if(!empty($image))
		  $path = time().$image;
        else $path = '';
		$imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
		if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !empty($path)){
	         echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Room/rooms.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
	    }else{	
                if(empty($path))
		    	     $data = array($rid,$tnum,$desc,$max,$min,$id); 
                else{
                    
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
                     $data = array($rid,$tnum,$desc,$max,$min,$path,$id);
                     else
                        echo '<script> alert("Error in Updating a table"); window.location="../../Model/Room/rooms.php" </script>';
                    
                }
		   		 updateTables($data,$path);
                
		    	echo '<script> alert("Successfully Updated the table"); window.location="../../Model/Room/rooms.php" </script>';
	  	    }
    }
    
    if(isset($_POST['deactivate'])){
        $id = $_POST['id'];
        $status = 1;
        $data = array($status,$id);
        changeTable($data);
        echo '<script> alert("Successfully Updated the table"); window.location="../../Model/Room/rooms.php" </script>';
    }
    
    if(isset($_POST['activate'])){
        $id = $_POST['id'];
        $status = 0;
        $data = array($status,$id);
        changeTable($data);
        echo '<script> alert("Successfully Updated the table"); window.location="../../Model/Room/rooms.php" </script>';
    }
	
?>