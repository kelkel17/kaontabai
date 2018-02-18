<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    if(isset($_GET['cid'])){
      $data = array($_GET['cid'],$_SESSION['id']);
       visitcount($data);

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
         <?php include('header.php');?>
         <?php include('sectionrestaurant.php');?>

         <?php } ?>
      
         <?php include('footer.php'); ?> 
        <script src="../../assets/js/extension2.js"></script>

         <script>

        var map;
        var geocoder;
        var marker;
        

      function initMap(getbyid) {
        // var location = {lat: 10.3157, lng: 123.8854};

        var location = new google.maps.LatLng(<?php echo $byId['lat']; ?>,<?php echo $byId['lng'];  ?>);
           var iconBase = '../../Image/';
          var icons = {
            restaurant: {
              icon: iconBase + 'restaurant.png'
            }
          };
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: location,

          zoom: 12  
        });

         var marker = new google.maps.Marker({
            position: location,
            icon: icons['restaurant'].icon,
            map: map
            });
            
                   
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSycgg4KWvJUmyptQTnn84wV5q0XCMKC0&callback=initMap"
    async defer></script>
    
    </body>
</html>