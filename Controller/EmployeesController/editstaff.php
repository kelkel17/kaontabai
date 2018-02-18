<?php

include 'dbconn.php';
	if(isset($_POST['Update']))
	{
			$fname = $_POST['fname'];	
			$mname = $_POST['mname'];			
			$lname = $_POST['lname'];
			$addr = $_POST['addr'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$ssn = $_POST['ssn'];
			$stat = "Active";
			$rate = "5";

			$con = con();
                   $sql = "UPDATE employees SET employee_fname = ?,employee_mname = ?,employee_lname = ?,employee_addr = ?,employee_phone = ?,employee_gender = ?,employee_ssn = ?,employee_status=?,rate_comm=? WHERE employee_id = ?";
                   $stmt = $con->prepare($sql);
                   $stmt->execute(array($fname, $mname, $lname, $addr, $phone, $gender, $ssn, $stat, $rate));
                echo "<script>window.location=staff.php?id=$id</script>";

            /*$sql = "UPDATE employees SET employee_fname ='$fname',employee_mname='$mname', employee_lname = '$lname', employee_addr =
            '$addr', employee_phone='$phone', employee_gender='$gender', employee_ssn ='$ssn', employee_status='$stat',rate_comm =
            '$rate' WHERE employee_id = '$id'";
			$result = mysqli_query($con,$sql);
			header("Location: ../staff.php");*/
	}
			$con = null;
?>