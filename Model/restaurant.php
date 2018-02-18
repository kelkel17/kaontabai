<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    if(isset($_POST['visit'])){
        $id = $_POST['id'];
        $cid = $_POST['cid'];
        $sql = "SELECT customer_id, restaurant_id FROM visitors WHERE customer_id = '$id' AND restaurant_id = '$cid'";
            $con = con();
            $sthandler = $con->prepare($sql);
            //$sthandler->bindParam(':id', $id);
            $sthandler->execute();

           if($sthandler->rowCount() > 0){
                header('location: restaurantinfo.php?cid='.$cid.'&id='.$id.'');
           }else{
                     $data = array($cid,$id);
                     visit($data);
                     header('location: restaurantinfo.php?cid='.$cid.'&id='.$id.'');
            }
    }
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
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
        <link rel="stylesheet" href="../../assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="../../assets/css/style3.css">
        <!--Theme Responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css" />
         <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />

        <script src="../../assets/js/vendor/jquery-3.2.1.js"></script>
        <script src="../../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
         <script src="../../assets/js/vendor/star-rating.min.js"></script>
         
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
                                    <a class="navbar-brand our_logo" href="#"></a><!--<img src="assets/images/logo.png" alt="" /></a>-->
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-left">
                                        <li><a href="home.php?id=<?php echo $_SESSION['id']?>">Home</a></li>
                                         <li><a href="restaurant.php?id=<?php echo $_SESSION['id'];?>">Restaurants</a></li>
                                        <!--<li><a href="#features">Tables</a></li>-->
                                        <li><a href="#portfolio">Most Ordered Food</a></li>
                                        <li><a href="#ourPakeg">News & Events</a></li>
                                        <li><a href="#mobaileapps">Blogs</a></li>  
                                    </ul> 
                                  <?php        
                                    if($_SESSION['id'])
                                     {
                                        $customer = getCustomer(array($_SESSION['id']));
                                        foreach ($customer as $row) {
                                    ?>  
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a  href="customerprofile.php?id=<?php echo $row['customer_id']; ?>"><?php echo $row['customer_fname'].' '.$row['customer_lname']?></a></li>
                                        <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>
                                    </ul>
                                <?php } }?>
                                          <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->
                                                 
                                </div><!-- /.navbar-collapse -->   
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->
                        
        <section>
            <div class="container">
                <div class="row">
                    <div class="abouts_content" style="width: 100%;">
                        <center><input class="form-control glyphicon" placeholder="&#xe003;" name="text" id="search" type="text"></center>
                      <!-- <i class="glyphicon glyphicon-search"></i><input type="text"  class="form-control"  onkeyup="searchTable()" placeholder="Search for..."> -->
                    </div>
                </div>
            </div>
        </section>
        <section id="abouts" class="abouts">
              <?php 
                  $restaurant = viewAllOwners();
                  foreach ($restaurant as $row) {
                  $id = $_GET['id'];
                ?>
            <div class="container" id="result">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" align="top" alt=""/>'; ?>
                            </div>
                        </div>
                        <form method="post">
                        <div class="col-md-6" id="tableFooter">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4><?php echo $row['restaurant_name']; ?></h4>
                                <p><?php echo substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) > 500) ? '...' : ''); ?></p>
                                <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>">
                                <input type="hidden" name="cid" value="<?php echo $row['restaurant_id']; ?>">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="submit" name="visit" value="More Info" class="btn btn-primary"></a>
                                <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>" class="btn btn-primary">Book A Table</a>
                                <?php
                                   $resId = $row['restaurant_id'];
                                   $rate = getRate($resId);
                                ?>
                               <br /><br/>
                               <input value=<?php echo $rate?> type="number" id="rate" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId=<?php echo $resId;?> disabled>
                            </div>  
                        </div>
                        </form>
                    </div>
                   </div>
            </div>
               <?php } ?>
        </section>
     
       
      
		
		<footer class="footer">
            <div class="text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copyright  wow zoomIn" data-wow-duration="3s">
                            <p><a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                            <a href=""><i class="fa fa-linkedin"></i></a>
                                        <a href=""><i class="fa fa-pinterest-p"></i></a>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                        <a href=""><i class="fa fa-phone"></i></a>
                                        <a href=""><i class="fa fa-camera"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>      

        <script src="../../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script src="../../assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="../../assets/js/wow/wow.min.js"></script>
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/main.js"></script>
        <!-- <script type="text/javascript">
               $(document).ready(function(){
                $('#search_text').keyup(function(){
                     var txt = $(this).val();
                     if(txt != ''){

                     } else{
                        $('#result').html('');
                        $.ajax({
                            url: "../../Controller/CustomersController/search.php",
                            method: "post",
                            data:{search:text},
                            dataType:"text",
                            success:function(data){
                                $('#result').html($data);
                            }
                        });
                     }
                    });
                 });



        </script> -->
        <script>
         $('document').ready(function(){
          $('#search').on('input',function(){
           $search=$(this).val();
           // $rate = $('#rate').val();
           // $prodId = $('#rate').data('id');
           // console.log($prodId);
           $.get('../../Controller/CustomersController/search2.php',{search:$search},function($result){
                $('#result').html($result)
           });
          });
         });
        </script>
    </body>
</html>
