<script src = "../../something/js/jquery.min.js" ></script> 
<script src = "../../something/js/sweetalert.min.js" ></script> 
<script>
    function sweetMimitch() {
        $(function() {
            swal({
                title: "Successfully",
                text: "Added a staff",
                icon: "success"
            }).then(function() {
                window.location = "../../Model/Employee/staff.php";
            });
        });
    }

function updateAlert() {
    $(function() {
        swal({
            title: "Successfully",
            text: "Updated a staff",
            icon: "success"
        }).then(function() {
            window.location = "../../Model/Employee/staff.php";
        });
    });
}

function errorUpdateAlert() {
    $(function() {
        swal({
            title: "Error",
            text: "Error in Updating a staff",
            icon: "error"
        }).then(function() {
            window.location = "../../Model/Employee/staff.php";
        });
    });
}

function warningAlert() {
    $(function() {
        swal({
            title: "Image type error",
            text: "Image type must be PNG/JPEG/JPG only",
            icon: "Warning"
        }).then(function() {
            window.location = "../../Model/Employee/staff.php";
        });
    });
}

function warningAlert2() {
    $(function() {
        swal({
            title: "Error in adding a staff",
            text: "staff already exist",
            icon: "Error"
        }).then(function() {
            window.location = "../../Model/Employee/staff.php";
        });
    });
}

function errorAlert() {
    $(function() {
        swal({
            title: "Error in adding a staff",
            text: "staff already exist",
            icon: "Error"
        }).then(function() {
            window.location = "../../Model/Employee/staff.php";
        });
    });
} </script>
<?php

include '../dbconn.php';

	if(isset($_POST['Add']))
	{
			$id = $_SESSION["id"];		
			$fname = $_POST['fname'];	
			$mname = $_POST['mname'];			
			$lname = $_POST['lname'];
			$addr = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$ssn = $_POST['ssn'];
			$number = FLOOR(RAND(100,2000));
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql1 = "SELECT username FROM employees WHERE username = :username";
			$con = con();
			$sthandler = $con->prepare($sql1);
			$sthandler->bindParam(':username', $username);
			$sthandler->execute();

			if($sthandler->rowCount() > 0){
			    echo'<script> warningAlert2(); </script>';
			} else{
				$data = array($id,$number,$fname,$mname,$lname,$addr,$phone,$gender,$ssn,$username,$password);
				//echo $id,$fname,$mname,$lname,$addr,$phone,$gender,$ssn,$username,$password;
				addStaff($data);
				echo '<script>sweetMimitch();</script>';
			}
	}
	if(isset($_POST['updateStaff'])){
		$id = trim($_POST['id']);
		$fname = trim($_POST['fname']);	
		$mname = trim($_POST['mname']);			
		$lname = trim($_POST['lname']);
		$addr = trim($_POST['address']);
		$phone = trim($_POST['phone']);
		$gender = trim($_POST['gender']);
		$ssn = trim($_POST['ssn']);

					$data = array($fname,$mname,$lname,$addr,$phone,$gender,$ssn,$id);
					updateStaff($data);
					echo '<script>updateAlert();</script>';

  	}
?>