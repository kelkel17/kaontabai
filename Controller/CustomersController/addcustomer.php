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
                
			    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $subject = 'Registered succesfully';
                $body = 'You have succesfully registered an account. 
                Your email is '.$email.' and your password is '.$pass.'.
                ';
                $data = array($fname,$mname,$lname,$addr,$phone,$email,$gender,$bdate,$hashed_password);
                addCustomer($data);
                mail($email,$subject,$body,'From: KaonTaBai!');
                echo '<script> alert("Successfully Registered"); window.location="../../index.php" </script>';
			
            }

            else
            {
                echo '<script>alert("Password does not match!"); window.location="../../index.php"; </script>';
            }
        
    }
            $con = null;
?>