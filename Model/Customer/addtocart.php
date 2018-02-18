<?php
include_once '../../Controller/dbconn.php';
if(isset($_POST['carts'])){
     $qnty = $_POST['qtys'];
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
//    unset($_SESSION['cart']);
     $ResId = $_GET['cid'];
     $items = $_SESSION['cart'];
     $pid = $_GET['pid'];
     $rid = $_GET['rid'];
     $cartitems = explode(",",$items);
     if(in_array($_GET['id'],$cartitems)){
        echo '<script>alert("Product is already on the cart, Click the My Cart to change the quantity."); window.location="menu.php?cid='.$ResId.'&pid='.$pid.'&rid='.$rid.'"; </script>';        
    }else{
       /* print_r($_SESSION['cart']);
        echo "-";
        print_r($_SESSION['qty']);
        $items .= ",".$_GET['id'];
       $ResId = $_GET['cid'];
      $custId = $_GET['pid'];
        
             $_SESSION['cart'] = $items;
           $quantity = explode(",",$qnty);
             $qnty .=",".$_SESSION['qty'];
             $_SESSION['qty'] = $qnty;
             $_SESSION['count'] = count($cartitems) + 1;
          echo '<script>alert("Successlly added a menu to cart."); window.location="menu.php?cid='.$ResId.'&pid='.$pid.'&rid='.$rid.'"; </script>';  */   
       
        $myQty = $_SESSION['qty'];
        echo " qty before-".$myQty;
        $myQty.=",".$qnty;

        echo " qty after-".$myQty;
        $_SESSION["qty"]=$myQty;

          // print_r($_SESSION['cart']);
        //echo "-";
        //print_r($_SESSION['qty']);
        echo "items before  - ".$items;
        $items .= ",".$_GET['id'];

        echo "items after".$items;
       $ResId = $_GET['cid'];
      $custId = $_GET['pid'];
        
             $_SESSION['cart'] = $items;
           $quantity = explode(",",$qnty);
             $qnty .=",".$_SESSION['qty'];
            // $_SESSION['qty'] = $qnty;
             $_SESSION['count'] = count($cartitems) + 1;
          echo '<script>alert("Successlly added a menu to cart."); window.location="menu.php?cid='.$ResId.'&pid='.$pid.'&rid='.$rid.'"; </script>';       
       
    }
}else{
    //unset($_SESSION['cart']);
    $ResId = $_GET['cid'];
     $item = $_GET['id'];
     $pid = $_GET['pid'];
     $rid = $_GET['rid'];
     $_SESSION['cart'] = $item;
     $_SESSION['qty'] = $qnty;
     $_SESSION['count'] = count($item);
     // echo $_SESSION['qty'];
 echo '<script>alert("Successlly added a menu to cart."); window.location="menu.php?cid='.$ResId.'&pid='.$pid.'&rid='.$rid.'"; </script>';
}
}
