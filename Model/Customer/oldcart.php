  <?php 
  
    include '../../Controller/dbconn.php';
    
   // if(isset($_GET["id"]))
    islogged2();
    viewAllOwners();
    $Resid = $_GET['cid']; 
    $cust_id = $_GET['pid'];
    $rid  = $_GET['rid'];
    // $cart = con();
    //islogged2();
   // checker();
?>


<!DOCTYPE html>
<html class="no-js" lang=""> 

  <head>

      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       
    <title>KaonTaBai!</title>

    <link href="../../something/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../something/css2/blog-post.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
   <link href="../../something/css/bootstrap.min.css" rel="stylesheet">
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
       <!-- <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
       <!-- <link rel="stylesheet" href="../../assets/css/bootstrap-theme.min.css"> -->

       <style type="text/css">
            .a>div { display: none; }
            .a:hover>div { 
                display: block;
             }
             th {
                width: 50px;
             }
        </style>
        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <!-- <link rel="stylesheet" href="../../assets/css/style.css"> --> 
        <link rel="stylesheet" href="../../assets/css/sample.css">
      
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />


        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>

  <body>
<div class="w3-container w3-margin">
  <a href="menu.php?cid=<?php echo $Resid?>&pid=<?php echo $cust_id?>&rid=<?php echo $rid?>">Back To Menu</a>
   <h1>My Cart</h1> 
<?php 
if(isset($_SESSION['qty']) && isset($_SESSION['cart']) && !empty($_SESSION['qty']) && !empty($_SESSION['cart'])){
$items = $_SESSION['cart'];
$cartitems = explode(",",$items);
$qnty = $_SESSION['qty'];
$cartqty = explode(",",$qnty);
//echo $qnty;
$total = 0;
// $i = 0;
// $quantity = 0;
$price = array();
?>

<form method="post" action="purchase.php">
<table class="table table-bordered">
<td>Foods<td>
<td></td>
<td></td>
<td></td>  
<tr>
  <th>Name</th>
  <th>Quantity</th>
  <th>Price</th>
  <th>Total Price Per Product</th>
  <th>Action</th>
</tr>
  <?php 
  $i = 0;
foreach(array_combine($cartitems, $cartqty) as $key => $value){

  $item = getMenu($key);
   $price[] = $item['m_price'];
?>
<tr>


  <td><a class="a"><?php echo $item['m_name'];?><div><img src="../../Image/<?php echo $item['m_image'];?>" style="width: 200px; height: 150px;" /></div></a></td>
  <td>
         <input type="hidden" name="mid[]" value="<?php echo $item['menu_id']; ?>">
         <input type="hidden" name="resid" value="<?php echo $Resid;?>">
         <input type="hidden" name="cid" value="<?php echo $cust_id; ?>">
         <input type="hidden" name="rid" value="<?php echo $rid; ?>">
        <input type="hidden" name="qty[]" value="<?php echo $value; ?>">

        <?php if(isset($_SESSION['cart'])){ ?>  
        <a href="#" onclick="document.getElementById('quantity<?php echo $item['menu_id']; ?>').style.display='block'" class="w3-tooltip w3-border w3-padding" style="text-decoration:none">
        <?php echo $value; } ?>

        <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:24px">Edit</span>
        </a>
  </td>

  <td><p id="price<?php echo $i; ?>">&#8369; <?php echo $item['m_price'];?></p></td>
  <?php $test = $value * $item['m_price'];?>
  <td><p id="price<?php echo $i; ?>">&#8369; <?php echo number_format($test, 2); ?></p></td>


  <td><a href="deleteitem.php?itemID=<?php echo $i; ?>" class="w3-tooltip">
                    <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px">Remove</span>
                    <i class="fa fa-trash w3-text-red"></i></a></td>

</tr>

<?php 
                   $initial = $value * $item['m_price'];
                   $total = $total + $initial; 
                   $i++;
                 }?>
                <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total: <span>&#8369;</span><label id="total"><?php echo number_format($total, 2); ?></label>
                 <input type="hidden" name="total" value=<?php echo $total?> ></th>
              </tr>

</table>
<button type="submit" name="checkout" class="btn btn-primary hover">Checkout</button>
</form>
<!-- <form action="sample.php" method="POST">
      <input type="hidden" name="total" value=<?php echo $total?> >
    <button type="submit" name="submit">Submit</button>
  </form> -->


</div>
 <?php 
            $x = 0;
             foreach(array_combine($cartitems, $cartqty) as $key => $value){
                $item = getMenu($key);    
            ?>
<div class="w3-modal" id="quantity<?php echo $item['menu_id']; ?>">
  <div class="w3-modal-content" style="width:30%">
     <header class="w3-container w3-blue">
     <button type="button" onclick="document.getElementById('quantity<?php echo $item['menu_id']; ?>').style.display='none'" class="w3-display-topright w3-button"><span>&times;</span></button>
      <h3>Add more quantity</h3>
     </header>
     <div class="w3-container">
      <form action="#" method="post">
       <label>Quantity to buy: </label>
       <input type="number" name="quantity" value="1" id="quantity" class="w3-input input">
       <input type="hidden" name="indexqty" value="<?php echo $x; ?>">
     </div>
  <div class="w3-container w3-border w3-padding w3-right-align w3-margin-top">
  <button type="button" class="w3-btn w3-border" onclick="document.getElementById('quantity<?php echo $item['menu_id']; ?>').style.display='none'">Cancel</button>
  <button type="submit" name="update" class="w3-btn w3-blue w3-right w3-border">Submit</button>
  </div>
  </form>
  </div>
</div>
 <?php  $x++; } 
} else { ?>
  
  <table class="table table-bordered">
  
<tr>
  <th>Name</th>
  <th>Image</th>
  <th>Quantity</th>
  <th>Price</th>
  <th>Total Price Per Product</th>
  <th>Action</th>
</tr>

<tr>
  <td></td>
  <td></td>
  <td></td>
  <td><h3>Cart is empty</h3></td>
  <td></td>
  <td></td>

</tr>

                <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Total: <span>&#8369;</span><label id="total">0.00</label></th>
                <th></th>
  
</table>
  
<?php } ?>   

    
    <?php if(isset($_POST['update'])){
    $quantity = $_POST['quantity'];
    $indexqty = $_POST['indexqty'];
        $qnty = $_SESSION['qty'];
        $cartqty = explode(",",$qnty);
        $cartqty[$indexqty] = $quantity; 
        $qnty = implode(",",$cartqty);
        $_SESSION['qty'] = $qnty;
        echo "<script> window.location='cart.php?cid=$Resid&pid=$cust_id&rid=$rid&e=Checkout success&style=success&head=Well done!'; </script>"; 
    } 

     if(isset($_POST['checkout'])){
                    //$pid = $_POST['pid'];
     
      $order = addOrder($_SESSION['id'],$total);
      // $mid = $_POST['mid'];
      $qty = $_POST['qty'];
      foreach($_POST['mid'] as $mid){
      // $tempqty = $quantity - $x;
      //  $newqty = max($tempqty, 0);
      // setQuantity($newqty,$pid);
       addOrderDetails($order,$mid,$qty);
    
                  }  
                  /*  $id = addPurchase('3',$total);
                    addPurchaseDetails($id,)
                    echo $id; */
      unset($_SESSION['cart']);
      unset($_SESSION['count']); 
      unset($_SESSION['qty']);
      echo "<script> window.location='cart.php?cid=$Resid&pid=$cust_id&rid=$rid&e=Checkout success&style=success&head=Well done!'; </script>"; 
                }
?>


<br><footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">KaonTaBai! &copy; 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../../something/vendor/jquery/jquery.min.js"></script>
    <script src="../../something/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>


  </body>

</html>
