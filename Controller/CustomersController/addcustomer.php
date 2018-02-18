<?php

include '../dbconn.php';
	if(isset($_POST['submit'])){
            $fname = $_POST['fname'];   
            $mname = $_POST['mname'];           
            $lname = $_POST['lname'];
            $addr = $_POST['addr'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $bdate = $_POST['bdate'];
           // $stat = "Active";
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];

            $sql = "SELECT customer_email FROM customers WHERE customer_email = :email";
            $con = con();
            $sthandler = $con->prepare($sql);
            $sthandler->bindParam(':email', $email);
            $sthandler->execute();

            if($sthandler->rowCount() > 0){
                echo '<script>alert("Already exist!"); window.location="../../index.php";</script>';
            }
                elseif($pass==$pass2){
                $data = array($fname,$mname,$lname,$addr,$phone,$email,$gender,$bdate,$pass);
                addCustomer($data);
                $subject = 'Registered succesfully';
                $body = 'You have succesfully registered an account';
                mail($email,$subject,$body,'From: KaonTaBai!');
            }

            else
            {
                echo '<script>alert("Password does not match!"); window.location="../../index.php"; </script>';
            }
        
    }
            $con = null;
?>