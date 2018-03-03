<?php
include('../../controller/dbconn.php');
$Resid = $_GET['cid']; 
$cust_id = $_GET['pid'];
$rid  = $_GET['rid'];
if(!isset($_SESSION['id'])){
    header('location:cart.php');
}else{
$items = $_SESSION['cart2'];
$cartitems = explode(",",$items);
// QTY
$qnty = $_SESSION['qty2'];
$cartqty = explode(",",$qnty);
if(isset($_GET['itemID'])){
    $index = $_GET['itemID'];
    unset($cartitems[$index]);
    $itemms = implode(",",$cartitems);
    $_SESSION['cart2'] = $itemms;
    unset($cartqty[$index]);
    $qntyy = implode(",",$cartqty);
    $_SESSION['qty2'] = $qntyy;
    $_SESSION['count2'] -= 1;

    //$qnty = $_SESSION['qty'];
  
}
    echo '<script>alert("Succesfully remove the item from your cart"); window.location="cart.php?cid='.$Resid.'&pid='.$cust_id.'&rid='.$rid.'"; </script>';

}
?>
    