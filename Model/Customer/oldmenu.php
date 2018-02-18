<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    viewAllOwners();
    $Resid = $_GET['cid']; 
    $pid = $_GET['pid'];
//fa fa-cart-plus

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KaonTaBai!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
       <link href="../../assets/fonts/css.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> -->
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
        <link rel="stylesheet" href="../../assets/css/sample.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />

       
         
        <link rel="shortcut icon" href="../../assets/img/logo.png">
    </head>
    <body style="background-color: white;">
    
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
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <li><a href="#portfolio">Most Ordered Food</a></li>
                                        <li><a href="#ourPakeg">News & Events</a></li>
                                        <li><a href="#mobaileapps">Blogs</a></li>
                                        
                                    </ul>
                                           <ul class="nav navbar-nav navbar-right">
                                                <li>
                                                     
                                                    <li><a href="customerprofile.php?id=<?php echo $row['customer_id'];?>" clas="booking"><?php echo $row['customer_fname'].' '.$row['customer_lname'];?></a></li>
                                                    <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>

                                            
                                            </ul>
                                <?php } ?>
                                          <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->
                                                 
                                </div><!-- /.navbar-collapse -->   
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->
<br><br>
<div class="w3-container w3-margin">
  
<h1>Menu</h1>
     <div class="form-group">
            <label >Filter by: </label>
              <select name="filter" id="filter"  class="form-control" style="width: 15%;">
                  <option value="0">Main Course</option>
                  <option value="1">Beverage</option>
                  <option value="2">Dessert</option>
              </select>
     </div>                                
           
<div class="w3-row w3-padding w3-animate-opacity product"  id="div0">

<table>

            <!-- <input class="form-control glyphicon" placeholder="&#xe003;" name="text" id="search" type="text" style="width:50%;"> -->
          
<?php
?>
<thead>
<tr>
<center><h2 style="color: black;">Main Course</h2></center>
</tr>
</thead>
<?php 
    $menu = selectMenu();
    foreach ($menu as $id) {
        $cid = $id['mc_id'];
    if($cid==1 && $Resid==$id['restaurant_id']){    
?>
<!--  -->
<tbody>
<tr>
    <div class="w3-third w3-section">
        <div class="w3-card-4 w3-margin" >
            <?php 
            $filename = '../../Image/'.$id['m_image'].'';
            if($id['m_image'] == '' || !(file_exists($filename))){?>
            <img src="../../Image/icon3.png" alt="blank" style="width:100%;height:200px">
            <?php }else{ ?>
            
            <img src="../../Image/<?php echo $id['m_image']?>" alt="blank" style="width:100%;height:200px">
            <?php } ?>
            <div class="w3-container w3-white" style="width:80% height: 250px;">
                <h4>Name: <?php echo $id['m_name'];?> </h4>
                <p>Category: <?php echo $id['m_category'];?> </p>
                <div id="some-div">
                <p>Description: <?php echo substr($id['m_desc'], 0, 50) .((strlen($id['m_desc']) > 100) ? '...' : '');?></p><span id="some-element">dhasgkjdhsjkdhsakdhsajkdhsadkjlahdsahdsalkhdsakdsakjdhalkdhsajkdshajkdhsalkjdhaldjshaldskaj</span>
                </div>
                <p>Price:&#8369; <?php echo $id['m_price'];?> </p>
                <div class="w3-right w3-padding">
                
                <a href="addtocart.php?id=<?php echo $id['menu_id'];?>&qty=1&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">
                </a>
                </div>
            </div>
        </div>
    </div>
</tr>
</tbody>
<?php }}?>
 </table> 
</div>
<div class="w3-row w3-padding w3-animate-opacity product"  id="div1">
 <table>
    <tr>
<center><h2 style="color: black;">Beverages</h2></center>
<?php 
    $menu = selectMenu();
    foreach ($menu as $id) {
        $cid = $id['mc_id'];  

    if($cid==2 && $Resid==$id['restaurant_id']){    
?>
    <div class="w3-third w3-section">
        <div class="w3-card-4 w3-margin"><?php if($id['m_image'] == ''){?>
            <img src="../../Image/blank.jpg" alt="blank" style="width:100%;height:200px">
            <?php }else{ ?>

            <img src="../../Image/<?php echo $id['m_image']?>" alt="blank" style="width:100%;height:200px">
            <div class="w3-container w3-white"  style="width:80%; height: 250px;">
                <h4>Name: <?php echo $id['m_name'];?> </h4>
                <p>Category: <?php echo $id['m_category'];?> </p>
                <div id="some-div">
                <p>Description: <?php echo substr($id['m_desc'], 0, 50) .((strlen($id['m_desc']) > 100) ? '...' : '');?></p><span id="some-element"><?php echo $id['m_desc'];?></span>
                </div>
                <p>Price:&#8369; <?php echo $id['m_price'];?> </p>
                <div class="w3-right w3-padding">
                
                <a href="addtocart.php?id=<?php echo $id['menu_id'];?>&qty=1&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">
                </a>
                </div>
            </div>
        </div>
    </div>
<?php }}}?>
</tr>
 </table> 
</div>

<div class="w3-row w3-padding w3-animate-opacity product"  id="div2">
<table>
<center><h2 style="color: black;">Desserts</h2></center>
<?php 
    $menu = selectMenu();
    foreach ($menu as $id) {
        $cid = $id['mc_id'];  

    if($cid==3 && $Resid==$id['restaurant_id']){    
?>
<!--  -->
    <div class="w3-third w3-section" >
        <div class="w3-card-4 w3-margin">
            <?php if($id['m_image'] == ''){?>
            <img src="../../Image/blank.jpg" alt="blank" style="width:100%;height:200px">
            <?php }else{ ?>
            <img src="../../Image/<?php echo $id['m_image']?>" alt="blank" style="width:100%;height:200px">
            <div class="w3-container w3-white" style="width:80%; height: 250px;">
                <h4>Name: <?php echo $id['m_name'];?> </h4>
                <p>Category: <?php echo $id['m_category'];?> </p>
                <div id="some-div">
                <p>Description: <?php echo substr($id['m_desc'], 0, 50) .((strlen($id['m_desc']) > 100) ? '...' : '');?></p><span id="some-element"><?php echo $id['m_desc'];?></span>
                </div>
                <p>Price:&#8369; <?php echo $id['m_price'];?> </p>
                <div class="w3-right w3-padding">
                
                <a href="addtocart.php?id=<?php echo $id['menu_id'];?>&qty=1&cid=<?php echo $Resid?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>">
                </a>
                </div>
            </div>
        </div>
    </div>
<?php }}}?>
 </table>
</div>



</div>
                      
    <div class="scrollup">
      <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>    

        
        <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <!-- <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script> -->
        <script src="../../assets/js/wow/wow.min.js"></script>
        <!-- <script src="../../assets/js/plugins.js"></script> -->
        <script src="../../assets/js/main.js"></script>
        <script>
            for(var j = 0; j < 3; j++){
                if(j == 0){
                document.getElementById('div'+j).style.display = '';
                 console.log(j);
                }else{
               document.getElementById('div'+j).style.display = 'none';
                console.log(j);
                }
            }
            var opt = document.getElementById('filter');
            opt.onchange = function(){
                //document.getElementById('div0').style.display = 'none';
                for(var i = 0; i < 3; i++){
                   // alert(i);
                document.getElementById('div'+i).style.display = 'none';
                }
                document.getElementById('div'+ this.value).style.display = '';
            }
    

</script>
    
    </body>
</html>
