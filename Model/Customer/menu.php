<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    viewAllOwners();
    $Resid = $_GET['cid']; 
    $pid = $_GET['pid'];
    $rid = $_GET['rid'];

?>

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KaonTaBai!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="../../assets/fonts/css.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../assets/css/datatable.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
    <link rel="stylesheet" href="../../assets/css/plugins.css" />
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css">
    <!--Theme custom css -->
    <link rel="stylesheet" href="../../assets/css/style3.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />

    <link rel="shortcut icon" href="../../assets/img/logo.png">

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
                                        $rows = getCustomer(array($pid));
                                         foreach ($rows as $row) {

                                  ?>
                                            <li><a href="home.php?id=<?php echo $row['customer_id'];?>">Home</a></li>
                                            <li><a href="restaurant.php?id=<?php echo $row['customer_id'];?>">Restaurants</a></li>

                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <li><a href="cart.php?cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>"><i class="fa fa-cart-plus"></i>
                                                      <?php if(isset($_SESSION['count']) && !empty($_SESSION['count'])) {
                                                            if($_SESSION['count'] == 1){
                                                                echo $_SESSION['count'].' Item';
                                                            }elseif($_SESSION['count'] > 1){
                                                                echo $_SESSION['count'].' Items';
                                                            }
                                                      }else{
                                                        echo '0 Item';
                                                      }?> </a></li>
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
        <span><br></span>
        <span><br></span>
        <span><br></span>
        <span><br></span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h1><!-- <?php echo $row['restaurant_name'];?>'s --> Menu</h1>
                        <br/>
                    </center>
                    <div class="form-group" style="float:left; width: 70%">
                        <label>Filter by: </label>
                        <select name="filter" id="filter" class="form-control" style="width: 35%;">
                            <option value="0">All</option>
                            <option value="1">Main Course</option>
                            <option value="2">Beverage</option>
                            <option value="3">Dessert</option>
                            <option value="4">Combo Meal</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" id="div0">
                <center>
                    <h2 style="color: black;">All</h2></center>
                <?php 
                $menu = selectMenu($Resid);
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];

                    if($Resid==$id['restaurant_id']){    

    ?>
                    <div class="col-sm-4 container">
                        <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                            <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                            <?php }else{ ?>
                                <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                                <?php } ?>
                                    <div class="middle">
                                        <div class="text">
                                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                                            <h5>Pieces: <?php echo $id['pieces'];?> &nbsp; &nbsp; &nbsp;
                                            Volume: <?php echo $id['volume'];?> </h5>
                                            <div id="demo<?php echo $id['menu_id'] ?>" class="collapse">
                                                <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                                            </div>

                                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                                            <button data-toggle="collapse" data-target="#demo<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>

                                            <button data-toggle="modal" data-target="#book<?php echo $id['menu_id'];?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal" id="book<?php echo $id['menu_id'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="addtocart.php?id=<?php echo $id['menu_id'];?>&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">
                                    <div class="modal-header">
                                        <?php $get = getMenu2(array($id['menu_id']));
                                            foreach ($get as $row) {
                                        ?>
                                            <h3>How many <?php echo $row['m_name']?> would you like to order?</h3>
                                            <?php } ?>
                                                <input type="number" class="form-control" name="qtys" value="1">

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                        <input type="submit" name="carts" value="Order" class="btn btn-primary" />

                                    </div>
                                    <!-- end modal-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } }?>

            </div>

            <div class="col-lg-12" id="div1">
                <center>
                    <h2 style="color: black;">Main Course</h2></center>
                <?php 
                $menu = selectMenu($Resid);
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==1 && $Resid==$id['restaurant_id']){    
    ?>

                    <div class="col-sm-4 container">
                        <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                            <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                            <?php }else{ ?>
                                <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                                <?php } ?>
                                    <div class="middle">
                                        <div class="text">
                                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                                             <h5>Pieces: <?php echo $id['pieces'];?> &nbsp; &nbsp; &nbsp;
                                            Volume: <?php echo $id['volume'];?> </h5>
                                            <div id="demo2<?php echo $id['menu_id'] ?>" class="collapse">
                                                <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                                            </div>

                                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                                            <button data-toggle="collapse" data-target="#demo2<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>

                                            <button data-toggle="modal" data-target="#book2<?php echo $id['menu_id'];?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal" id="book2<?php echo $id['menu_id'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="addtocart.php?id=<?php echo $id['menu_id'];?>&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">

                                    <div class="modal-header">
                                        <?php $get = getMenu2(array($id['menu_id']));
                                            foreach ($get as $row) {
                                        ?>
                                            <h3>How many <?php echo $row['m_name']?> would you like to order?</h3>
                                            <?php } ?>
                                                <input type="number" class="form-control" name="qtys" value="1">

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                        <input type="submit" name="carts" value="Order" class="btn btn-primary" />

                                    </div>
                                    <!-- end modal-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } }  ?>

            </div>
            <div class="col-lg-12" id="div2">
                <center>
                    <h2 style="color: black;">Beverages</h2></center>
                <?php 
                $menu = selectMenu($Resid);
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==2 && $Resid==$id['restaurant_id']){    
    ?>

                    <div class="col-sm-4 container">
                        <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){ ?>
                            <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                            <?php }else{ ?>
                                <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                                <?php } ?>
                                    <div class="middle">
                                        <div class="text">
                                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                                             <h5>Pieces: <?php echo $id['pieces'];?> &nbsp; &nbsp; &nbsp;
                                            Volume: <?php echo $id['volume'];?> </h5>
                                            <div id="demo3<?php echo $id['menu_id'] ?>" class="collapse">
                                                <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                                            </div>

                                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                                            <button data-toggle="collapse" data-target="#demo3<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>

                                            <button data-toggle="modal" data-target="#book3<?php echo $id['menu_id'];?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal" id="book3<?php echo $id['menu_id'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="addtocart.php?id=<?php echo $id['menu_id'];?>&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">

                                    <div class="modal-header">
                                        <?php $get = getMenu2(array($id['menu_id']));
                                            foreach ($get as $row) {
                                        ?>
                                            <h3>How many <?php echo $row['m_name']?> would you like to order?</h3>
                                            <?php } ?>
                                                <input type="number" class="form-control" name="qtys" value="1">

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                        <input type="submit" name="carts" value="Order" class="btn btn-primary" />

                                    </div>
                                    <!-- end modal-footer -->
                                </form>
                            </div>
                        </div>
                    </div>>

                    <?php } }  ?>

            </div>
            <div class="col-lg-12" id="div3">
                <center>
                    <h2 style="color: black;">Desserts</h2></center>
                <?php 
                $menu = selectMenu($Resid);
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==3 && $Resid==$id['restaurant_id']){    
    ?>

                    <div class="col-sm-4 container">
                        <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                            <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                            <?php }else{ ?>
                                <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                                <?php } ?>
                                    <div class="middle">
                                        <div class="text">
                                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                                             <h5>Pieces: <?php echo $id['pieces'];?> &nbsp; &nbsp; &nbsp;
                                            Volume: <?php echo $id['volume'];?> </h5>
                                            <div id="demo4<?php echo $id['menu_id'] ?>" class="collapse">
                                                <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                                            </div>

                                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                                            <button data-toggle="collapse" data-target="#demo4<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>

                                            <button data-toggle="modal" data-target="#book4<?php echo $id['menu_id'];?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>

                    </div>
                    <div class="modal" id="book4<?php echo $id['menu_id'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="addtocart.php?id=<?php echo $id['menu_id'];?>&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">

                                    <div class="modal-header">
                                        <?php $get = getMenu2(array($id['menu_id']));
                                            foreach ($get as $row) {
                                        ?>
                                            <h3>How many <?php echo $row['m_name']?> would you like to order?</h3>
                                            <?php } ?>
                                                <input type="number" class="form-control" name="qtys" value="1">

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                        <input type="submit" name="carts" value="Order" class="btn btn-primary" />

                                    </div>
                                    <!-- end modal-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } }  ?>

            </div>

            <div class="col-lg-12" id="div4">
                <center>
                    <h2 style="color: black;">Combo Meals</h2></center>
                <?php 
                $menu = getCombos(array($Resid));
                foreach ($menu as $id) {  

    ?>

                    <div class="col-sm-4 container">
                        <?php 
                        $filename = '../../Image/'.$id['image'].'';
                        if($id['image'] == '' || !(file_exists($filename))){?>
                            <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                            <?php }else{ ?>
                                <img src="../../Image/<?php echo $id['image']?>" alt="<?php echo $id['cm_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                                <?php } ?>
                                    <div class="middle">
                                        <div class="text">
                                            <h4>Name: <?php echo $id['cm_name'];?> </h4>
                                            <h5>Category: <?php echo $id['cm_id'];?> </h5>
                                            <div id="demo5<?php echo $id['cm_number'] ?>" class="collapse">
                                                <h5>Description: <?php echo $id['cm_desc']; ?> </h5>
                                            </div>

                                            <h5>Price: &#8369; <?php echo $id['price'];?> </h5>

                                            <button data-toggle="collapse" data-target="#demo5<?php echo $id['cm_number'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>

                                            <button data-toggle="modal" data-target="#book5<?php echo $id['cm_id'];?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        </div>
                                    </div>

                    </div>

                    <div class="modal" id="book5<?php echo $id['cm_id'];?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="addtocartcomb.php?id=<?php echo $id['cm_id'];?>&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">

                                    <input type="hidden" name="cim" value="<?php echo $id['cm_id']; ?>">
                                     <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                                     <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="cid" value="<?php echo $Resid; ?>">

                                    <div class="modal-header">

                                        <?php $get = getCombo3(array($id['cm_id']));
                                            foreach ($get as $row) {
                                        ?>
                                            <h3>How many <?php echo $row['cm_name']?> would you like to order?</h3>
                                            <?php } ?>

                                             <input type="number" class="form-control" name="qtys" value="1">
                                                <br><br>
                                        <label for="pname"> Customize <?php echo $id['cm_name'];?></label>
                                                <br/>
                                                    
                                                    <?php 

                                                    $id = $id['cm_id'];
                                                    $sql = "SELECT *, cm.menu_id as combo_menu_id FROM combo_meals cm, menus m WHERE cm.menu_id = m.menu_id AND cm.restaurant_id = m.restaurant_id AND cm.cm_id = '$id'";
                                                    $con = con();
                                                    $stmt = $con->prepare($sql);
                                                    $stmt->execute();
                                                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    foreach($rows as $row)  
                                                    {    
                                                        $menu = getCombo2(array($id));
                                                        $menu_id = explode(",",$row['combo_menu_id']);
                                                        foreach($menu as $key => $asd){
                                                            if(in_array($asd['menu_id'],$menu_id))
                                                                echo '<input type="checkbox" name="menu[]" value="'.$asd['m_price'].'" checked />'.$asd['m_name'].'<br/>';
                                                            else
                                                                echo '<input type="checkbox" name="menu[]" value="'.$asd['m_price'].'">'.$asd['m_name'].' <br/>';
                                                        }
                                                    }
                                                 ?>

                                               

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                        <input type="submit" name="carts" value="Order" class="btn btn-primary" />

                                    </div>
                                    <!-- end modal-footer -->
                                </form>
                            </div>
                        </div>
                    </div>


<?php } ?>



            </div>







        </div>

        <?php include('footer.php'); ?>
            <script>
                for (var j = 0; j < 5; j++) {
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
                    for (var i = 0; i < 5; i++) {
                        // alert(i);
                        document.getElementById('div' + i).style.display = 'none';
                    }
                    document.getElementById('div' + this.value).style.display = '';
                }
            </script>

    </body>

    </html>