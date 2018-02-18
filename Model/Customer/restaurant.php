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
            $sthandler->bindParam(':id', $id);
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
     
      <?php include('header.php');?>
      <?php include('section.php');?>
      <?php include('footer.php');?>
      <?php include('map.php');?>
 
    
        <script src="../../assets/js/extension.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSycgg4KWvJUmyptQTnn84wV5q0XCMKC0&callback=initMap" async defer></script>
    </body>
</html>
