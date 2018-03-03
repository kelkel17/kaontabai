<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
    function updateAlert(rid,id,cid){
        $(function(){
            swal({
                title:"Successfully",
                text:"Customized your Combo meal",
                icon: "success"
            }).then(function(){
                    window.location = "../../Model/Customer/addtocart.php?cid="+cid+"&pid="+id+"&rid="+rid;
            });
        });
    }
</script>

<?php
include_once '../../Controller/dbconn.php';
if (isset($_POST['carts'])) {

        $cim = $_POST['cim'];
        $rid = $_POST['rid'];
        $id = $_POST['id'];
        $cid = $_POST['cid'];
        // $id = $_SESSION["id"];
        $menu = $_POST['menu'];

        $men = implode(",",$menu);  

        $data = array($men,$cim);       
        customizeCombo($data);
        echo "<script>updateAlert('$rid','$id','$cid');</script>";
        

    $qnty = $_POST['qtys'];
    if (isset($_SESSION['cart2']) && !empty($_SESSION['cart2'])) {
        //    unset($_SESSION['cart']);
        $ResId = $_GET['cid'];
        $items = $_SESSION['cart2'];
        $pid = $_GET['pid'];
        $rid = $_GET['rid'];
        $cartitems = explode(",", $items);
        if (in_array($_GET['id'], $cartitems)) {
            echo '<script>alert("Product is already on the cart, Click the My Cart to change the quantity."); window.location="menu.php?cid='.$ResId.
            '&pid='.$pid.
            '&rid='.$rid.
            '"; </script>';
        } else {
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

            $myQty = $_SESSION['qty2'];
            //echo " qty before-".$myQty;
            $myQty.= ",".$qnty;

            echo " qty after-".$myQty;
            $_SESSION["qty2"] = $myQty;

            // print_r($_SESSION['cart']);
            //echo "-";
            //print_r($_SESSION['qty']);
            //echo "items before  - ".$items;
            $items.= ",".$_GET['id'];

            echo "items after".$items;
            $ResId = $_GET['cid'];
            $custId = $_GET['pid'];

            $_SESSION['cart2'] = $items;
            $quantity = explode(",", $qnty);
            $qnty.= ",".$_SESSION['qty2'];
            // $_SESSION['qty'] = $qnty;
            $_SESSION['count'] = count($cartitems) + 1;
            echo '<script>window.location="menu.php?cid='.$ResId.
            '&pid='.$pid.
            '&rid='.$rid.
            '"; </script>';

        }
    } else {
        //unset($_SESSION['cart']);
        $ResId = $_GET['cid'];
        $item = $_GET['id'];
        $pid = $_GET['pid'];
        $rid = $_GET['rid'];
        $_SESSION['cart2'] = $item;
        $_SESSION['qty2'] = $qnty;
        $_SESSION['count2'] = count($item);
        // echo $_SESSION['qty'];
        echo '<script>window.location="menu.php?cid='.$ResId.
        '&pid='.$pid.
        '&rid='.$rid.
        '"; </script>';
    }
}
?>