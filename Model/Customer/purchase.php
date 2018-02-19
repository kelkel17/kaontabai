<?php 
include '../../Controller/dbconn.php';
if(isset($_POST['checkout'])){
      // $pid = $_POST['pid'];
      $cid = $_POST['cid'];
      $rid = $_POST['rid'];
      $restaurant = $_GET['cid'];
      $number = FLOOR(RAND(1000,20000));
      $total = $_POST['total'];
      $order = addOrder($_SESSION['id'],$cid,$rid,$number);
      // $mid = $_POST['mid'];
      $qty = $_POST['qty'];
     
      $get = getEmail(array($restaurant));
      $email = $get['owner_email'];
      foreach(array_combine($_POST['mid'],$qty) as $mid => $x){
      
       addOrderDetails($order,$mid,$x);
    
                  }  
      echo "<script> window.location='payment.php?cid=$order&total=$total&rid=$cid&email=$email'; </script>"; 
                }

?>