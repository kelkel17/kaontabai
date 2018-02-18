<?php
	include '../../controller/dbconn.php';

	if(isset($_POST['submit']))
	{	
		$id = $_SESSION['id'];
		$resID = $_GET['cid'];
		$rate = $_POST['rate'];

		$sql = "INSERT INTO ratings(customer_id,restaurant_id,rate) VALUES (?,?,?)";
		$con = con();
		$s=$con->prepare($sql);
		$s->execute(array($id,$resID,$rate));
		echo '<script> alert("Rating Saved"); window.location="restaurantinfo.php?cid='.$resID.'&id='.$id.'" </script>';


	}
?>