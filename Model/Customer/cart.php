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

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KaonTaBai!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link href="../../assets/fonts/css.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->

        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
        <link rel="stylesheet" href="../../assets/css/sample.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />

        <!-- RATINGS -->
        <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />
        <!-- <link rel="stylesheet" href="../../assets/css/star.css" /> -->

        <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
        <script src="../../assets/js/vendor/star-rating.min.js"></script>

        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>

        <header id="home" class="navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="#"><!--<img src="assets/images/logo.png" alt="" /></a>-->
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-left">
                                        <?php        
                                        $rows = getCustomer(array($cust_id));
                                         foreach ($rows as $row) {

                                  ?>
                                            <li><a href="home.php?id=<?php echo $row['customer_id'];?>">Home</a></li>
                                            <li><a href="restaurant.php?id=<?php echo $row['customer_id'];?>">Restaurants</a></li>
                                            <li><a href="menu.php?cid=<?php echo $Resid?>&pid=<?php echo $cust_id?>&rid=<?php echo $rid?>">Back To Menu</a></li>

                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <li>
                                                <a href="customerprofile.php?id=<?php echo $row['customer_id'];?>" clas="booking">
                                                    <?php echo $row['customer_fname'].' '.$row['customer_lname'];?>
                                                </a>
                                            </li>
                                            <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                        <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->

                                </div>
                                <!-- /.navbar-collapse -->
                            </div>
                            <!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Section -->
        <br>
        <br>

        <div class="w3-container w3-margin table-responsive">
            <h1>My Cart</h1>
            <?php 
        if(isset($_SESSION['qty']) && isset($_SESSION['cart']) && !empty($_SESSION['qty']) && !empty($_SESSION['cart']) || isset($_SESSION['qty2']) && isset($_SESSION['cart2']) && !empty($_SESSION['qty2']) && !empty($_SESSION['cart2']) ){
        $items = $_SESSION['cart'];
        $items2 = $_SESSION['cart2'];
        $cartitems = explode(",",$items);
        $cartitems2 = explode(",",$items2);
        $qnty = $_SESSION['qty'];
        $qnty2 = $_SESSION['qty2'];
        $cartqty = explode(",",$qnty);
        $cartqty2 = explode(",",$qnty2);
        //echo $qnty;
        $total = 0;
        $total2 = 0;
        // $i = 0;
        // $quantity = 0;
        $price = array();
        $price2 = array();
        ?>

                <form method="post" action="purchase.php?cid=<?php echo $_GET['cid']; ?>">
                    <table class="table table-bordered">
                        <td>Foods
                            <td>
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
                            </td>
                        </td>
                        <?php 
              $i = 0;
            foreach(array_combine($cartitems, $cartqty) as $key => $value) {
              $item = getMenu($key);
         
               $price[] = $item['m_price'];
             
                if(!empty($item)){
            ?>
                            <tr>
                                <td>
                                    <a class="a">
                                        <?php 
                                         echo $item['m_name'];          
                                         ?>
                                            <div><img src="../../Image/<?php echo $item['m_image'];?>" style="width: 200px; height: 150px;" /></div>
                                        
                                    </a>
                                </td>
                                <td>
                                    <input type="hidden" name="mid[]" value="<?php echo $item['menu_id']; ?>">
                                    <input type="hidden" name="resid" value="<?php echo $Resid;?>">
                                    <input type="hidden" name="cid" value="<?php echo $cust_id; ?>">
                                    <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                    <input type="hidden" name="qty[]" value="<?php echo $value; ?>">

                                    <?php 
                                    if(isset($_SESSION['cart'])){ ?>
                                        <a href="#" onclick="document.getElementById('quantity<?php echo $item['menu_id']; ?>').style.display='block'" class="w3-tooltip w3-border w3-padding" style="text-decoration:none">
                                            <?php echo $value; } ?>

                                                <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:24px">Edit</span>
                                        </a>
                                </td>
                                <td>
                                    
                                    <p id="price<?php echo $i; ?>">&#8369;
                                        <?php echo $item['m_price'];?>
                                    </p>

                                </td>
                                <?php
                                 $test = $value * $item['m_price'];?>
                                    <td>

                                        <p id="price<?php echo $i; ?>">&#8369;
                                            <?php echo number_format($test, 2); ?>
                                        </p>
                                    </td>

                                    <td>

                                        <a href="deleteitem.php?itemID=<?php echo $i; ?>&cid=<?php echo $Resid; ?>&pid=<?php echo $cust_id;?>&rid=<?php echo $rid; ?>" class="w3-tooltip">
                                            <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px">Remove</span>
                                            <i class="fa fa-trash w3-text-red"></i></a>
                                    </td>
                            </tr>
                            <?php }else{?>

                            <tr>
                                <td> 
                                </td>
                                <td> 
                                </td>
                                <td>
                                </td>
                                </td>
                                <td>
                              </td>
                            </tr>
                            <?php } }
             
              $o = 0;
              foreach(array_combine($cartitems2, $cartqty2) as $key2 => $value2){
              $item2 = getCom($key2);
              $price2[] = $item2['price_temp'];

               if(!empty($item2)){
               ?>
                            <tr>
                                <td>
                                    <a class="a">
                                        <?php 
                                         echo $item2['cm_name'];          
                                         ?>
                                            <div><img src="../../Image/<?php echo $item2['image'];?>" style="width: 200px; height: 150px;" /></div>
                                        
                                    </a>
                                </td>
                                <td>
                                    <input type="hidden" name="cmd[]" value="<?php echo $item2['cm_id']; ?>">
                                    <input type="hidden" name="resid" value="<?php echo $Resid;?>">
                                    <input type="hidden" name="cid" value="<?php echo $cust_id; ?>">
                                    <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                    <input type="hidden" name="qty[]" value="<?php echo $value2; ?>">

                                    <?php 
                                    if(isset($_SESSION['cart2'])) {?>
                                             <a href="#" onclick="document.getElementById('quantity2<?php echo $item2['cm_id']; ?>').style.display='block'" class="w3-tooltip w3-border w3-padding" style="text-decoration:none">
                                            <?php echo $value2; } ?>

                                                <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:24px">Edit</span>
                                        </a>
                                </td>
                                <td>
                                    
                                    <p id="price<?php echo $i; ?>">&#8369;
                                        <?php echo number_format($item2['price_temp'],2);?>
                                    </p>

                                </td>
                                <?php
                                 $test2 = $value2 * $item2['price_temp'];
                                 ?>
                                    <td>

                                        <p id="price<?php echo $i; ?>">&#8369;
                                            <?php echo number_format($test2, 2); ?>
                                        </p>
                                    </td>

                                    <td>

                                         <a href="deleteitem2.php?itemID=<?php echo $i; ?>&cid=<?php echo $Resid; ?>&pid=<?php echo $cust_id;?>&rid=<?php echo $rid; ?>" class="w3-tooltip">
                                            <span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px">Remove</span>
                                            <i class="fa fa-trash w3-text-red"></i></a>
                                    </td>
                            </tr>
                            <?php } else {
                                ?>
                                <tr>
                                <td> 
                                </td>
                                <td> 
                                </td>
                                <td>
                                </td>
                                </td>
                                <td>
                              </td>
                            </tr>
                            <?php } ?>

                  <?php  $initial = $value * $item['m_price'];
                   $initial2 = $value2 * $item2['price_temp'];
                   $temp = $initial2 + $initial; 
                   $total = $total + $temp;
                   $i++;
                 

             }?>
                                <tr>
                                    <th style="border:#ffff;"></th>
                                    <th style="border:#ffff;" ></th>
                                    <th style="border:#ffff;"></th>
                                    <th style="border:#ffff;" ></th>
                                    <th>Sub Total: <span style="float:right">&#8369;<?php $temp = number_format($total, 2) - (number_format($total, 2) * .12); echo $temp; ?></span> </th>
                               </tr>
                                <tr>
                                <th style="border:#ffff;"></th>
                                <th style="border:#ffff;" ></th>
                                <th style="border:#ffff;"></th>
                                <th style="border:#ffff;" ></th>
                                    <th>VAT: <span style="float:right">12%</span> </th>
                               </tr>         
                                    <tr>
                                    <th style="border:#ffff;"></th>
                                    <th style="border:#ffff;" ></th>
                                    <th style="border:#ffff;"></th>
                                    <th style="border:#ffff;" ></th>
                                   
                                    <th>Total:
                                        <label id="total" style="float:right;">
                                        &#8369;<?php echo number_format($total, 2); ?>
                                        </label>
                                        
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

             
            $y = 0;
             foreach(array_combine($cartitems2, $cartqty2) as $key => $value2){
                $item2 = getCom($key);    
            ?>
            <div class="w3-modal" id="quantity2<?php echo $item2['cm_id']; ?>">
                <div class="w3-modal-content" style="width:30%">
                    <header class="w3-container w3-blue">
                        <button type="button" onclick="document.getElementById('quantity2<?php echo $item2['cm_id']; ?>').style.display='none'" class="w3-display-topright w3-button"><span>&times;</span></button>
                        <h3>Add more quantity</h3>
                    </header>
                    <div class="w3-container">
                        <form action="#" method="post">
                            <label>Quantity to buy: </label>
                            <input type="number" name="quantity2" value="1" id="quantity" class="w3-input input">
                            <input type="hidden" name="indexqty2" value="<?php echo $y; ?>">
                    </div>
                    <div class="w3-container w3-border w3-padding w3-right-align w3-margin-top">
                        <button type="button" class="w3-btn w3-border" onclick="document.getElementById('quantity2<?php echo $item2['cm_id']; ?>').style.display='none'">Cancel</button>
                        <button type="submit" name="update2" class="w3-btn w3-blue w3-right w3-border">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
            <?php  $y++; } 


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
                        <td>
                            <h3>Cart is empty</h3></td>
                        <td></td>
                        <td></td>

                    </tr>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total: <span>&#8369;</span>
                            <label id="total">0.00</label>
                        </th>
                        <th></th>
                    </tr>
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

    if(isset($_POST['update2'])){
    $quantity = $_POST['quantity2'];
    $indexqty = $_POST['indexqty2'];
        $qnty = $_SESSION['qty2'];
        $cartqty = explode(",",$qnty);
        $cartqty[$indexqty] = $quantity; 
        $qnty = implode(",",$cartqty);
        $_SESSION['qty2'] = $qnty;
        echo "<script> window.location='cart.php?cid=$Resid&pid=$cust_id&rid=$rid&e=Checkout success&style=success&head=Well done!'; </script>"; 
    } 

     if(isset($_POST['checkout'])){
                    //$pid = $_POST['pid'];

      $order = addOrder($_SESSION['id'],$total);
      // $mid = $_POST['mid'];
      $qty = $_POST['qty'];

        $get = getOrders(array($cust_id));
        foreach ($get as $row) {
            $set = $row['order_id'];
            $con = con();
            $sql2 = "INSERT INTO notifications(customer_id,restaurant_id,order_id) VALUES (?,?,?)";
            $true = $con->prepare($sql2);
            $true->execute(array($cust_id,$Resid,$set));
            foreach($_POST['mid'] as $mid){
               addOrderDetails($order,$mid,$qty);
            }

        }  
      unset($_SESSION['cart']);
      unset($_SESSION['count']); 
      unset($_SESSION['qty']);
      echo "<script> window.location='cart.php?cid=$Resid&pid=$cust_id&rid=$rid&e=Checkout success&style=success&head=Well done!'; </script>"; 
                }
?>

                        <div class="scrollup">
                            <a href="#"><i class="fa fa-chevron-up"></i></a>
                        </div>

                        <!-- <script src="../assets/js/vendor/jquery-1.11.2.min.js"></script> -->
                        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

                        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
                        <script src="../../assets/js/wow/wow.min.js"></script>
                        <script src="../../assets/js/plugins.js"></script>
                        <script src="../../assets/js/main.js"></script>
                        <script>
                            for (var j = 0; j < 3; j++) {
                                if (j == 0) {
                                    document.getElementById('div' + j).style.display = '';
                                    console.log(j);
                                } else {
                                    document.getElementById('div' + j).style.display = 'none';
                                    console.log(j);
                                }
                            }
                            var opt = document.getElementById('filter');
                            opt.onchange = function() {
                                //document.getElementById('div0').style.display = 'none';
                                for (var i = 0; i < 3; i++) {
                                    // alert(i);
                                    document.getElementById('div' + i).style.display = 'none';
                                }
                                document.getElementById('div' + this.value).style.display = '';
                            }
                        </script>

    </body>

    </html>