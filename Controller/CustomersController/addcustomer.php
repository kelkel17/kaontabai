<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
    function sweetMimitch(){
    $(function(){
        swal({
                title:"Successfully Registered!",
                text:"",
                icon: "success"
        }).then(function(){
                window.location = "../../index.php";
            });
        });
    }

    function warningAlert(){
        $(function(){
            swal({
                title:"Failed",
                text:"Password does not match!",
                icon: "error"
            }).then(function(){
                    window.location = "../../index.php";
            });
        });
    }

    function error(){
        $(function(){
            swal({
                title:"Failed",
                text:"Email already exist!",
                icon: "error"
            }).then(function(){
                    window.location = "../../index.php";
            });
        });
    }

</script>

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

            $link = "http://localhost/kaontabai/index.php";
            
            $sql = "SELECT customer_email FROM customers WHERE customer_email = :email";
            $con = con();
            $sthandler = $con->prepare($sql);
            $sthandler->bindParam(':email', $email);
            $sthandler->execute();

            if($sthandler->rowCount() > 0){
                echo '<script>error();</script>';
            }
                elseif($pass==$pass2){
                
			    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $subject = 'Registered succesfully';
                $body = 'You have succesfully registered an account. 
                Click <a href='.$link.'>here</a> link to login ';
                $data = array($fname,$mname,$lname,$addr,$phone,$email,$gender,$bdate,$hashed_password);
                addCustomer($data);
                mail($email,$subject,$body,'From: KaonTaBai!');
                echo '<script>sweetMimitch();</script>';
			
            }

            else
            {
                echo '<script> warningAlert();</script>';
            }
        
    }
            $con = null;
?>