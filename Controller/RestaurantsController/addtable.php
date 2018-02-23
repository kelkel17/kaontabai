<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(){
	$(function(){
		swal({
				title:"Successfully",
				text:"Added a Table",
				icon: "success"
		}).then(function(){
				window.location = "../../Model/Room/rooms.php";
			});
		});
	}
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Updated a Table",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Room/rooms.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating a Table",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Room/rooms.php";
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
					window.location = "../../Model/Room/rooms.php";
			});
		});
	}
	function warningAlert2(){
		$(function(){
			swal({
				title:"Error in adding a Table",
				text:"Table already exist",
				icon: "Error"
			}).then(function(){
					window.location = "../../Model/Room/rooms.php";
			});
		});
	}
	function errorAlert(){
		$(function(){
			swal({
				title:"Error in adding a Table",
				text:"",
				icon: "Error"
			}).then(function(){
					window.location = "../../Model/Room/rooms.php";
			});
		});
	}
</script>
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
				
               echo '<script>  warningAlert(); </script>';
            }else{	
					
			  		if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
			  		{
						$data = array($id,$tnum,$desc,$max,$min,$path);
						addTables($data);
						echo '<script> sweetMimitch(); </script>';	
					}else{
						echo '<script> errorAlert(); </script>';
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
	         echo '<script> warningAlert(); </script>';
	    }else{	
                if(empty($path))
		    	     $data = array($rid,$tnum,$desc,$max,$min,$id); 
                else{
                    
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
                     $data = array($rid,$tnum,$desc,$max,$min,$path,$id);
                     else
                        echo '<script> errorUpdateAlert(); </script>';
                    
                }
		   		 updateTables($data,$path);
                
		    	echo '<script> updateAlert(); </script>';
	  	    }
    }
    
    if(isset($_POST['deact'])){
        $id = $_POST['deact'];
        $status = 1;
        $data = array($status,$id);
        changeTable($data);
      //  echo '<script> alert("Successfully Updated the table"); window.location="../../Model/Room/rooms.php" </script>';
    }
    
    if(isset($_POST['activate'])){
        $id = $_POST['activate'];
        $status = 0;
        $data = array($status,$id);
        changeTable($data);
      //  echo '<script> alert("Successfully Updated the table"); window.location="../../Model/Room/rooms.php" </script>';
    }
	
?>