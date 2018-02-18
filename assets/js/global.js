
         $('document').ready(function(){
          $('#search').on('input',function(){
           $search=$(this).val();
           // $rate = $('#rate').val();
           // $prodId = $('#rate').data('id');
           // console.log($prodId);
           $.get('../../Controller/CustomersController/search2.php',{search:$search},function($result){
                $('#result').html($result)
           })
          })
         })

        var map;
        var geocoder;
        var marker;
        

       function initMap() {
        var location = {lat: 10.3157, lng: 123.8854};
         var iconBase = '../../Image/';
              var icons = {
                male: {
                  icon: iconBase + 'male.png'
                }
              }

        
        map = new google.maps.Map(document.getElementById('map'), {
          center: location,
          zoom: 14
        });


       
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

         

            infoWindow.setPosition(pos);
            // infoWindow.setContent('Location found.');
            // infoWindow.open(map);
            map.setCenter(pos);
            var marker = new google.maps.Marker({
            position: pos,
            icon: icons['male'].icon,
            map: map
            });
          }, function() {
            enableHighAccuracy(true),
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
                   
          // var cdata =  JSON.parse(document.getElementById('data').innerHTML);
          // geocoder = new google.maps.Geocoder();
          // codeAddress(cdata);    

           var alldata =  JSON.parse(document.getElementById('alldata').innerHTML);
           showAlldata(alldata);
                   
      }
       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function showAlldata(alldata)
      {
        var infoWind = new google.maps.InfoWindow;
        Array.prototype.forEach.call(alldata,function(data){
          var content = document.createElement('div');
          var strong = document.createElement('strong');
          // strong.textContent = data.name;
          content.appendChild(strong);

          // var img = document.createElement('img');
          // img.src = 'img/..';
          // img.style.width = '100px';
          // content.appendChild(img);

          var link = document.createElement('a');
          link.setAttribute('href','http://localhost/kaontabai2/Model/Customer/restaurantinfo.php?cid='+data.restaurant_id+'&id='+<?php echo $id;?>);
          link.innerHTML = data.restaurant_name;
          content.appendChild(link);

          var iconBase = '../../Image/';
          var icons = {
            restaurant: {
              icon: iconBase + 'restaurant.png'
            }
          };


          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            icon: icons['restaurant'].icon,
            map: map
            });

          marker.addListener('click', function(){
            infoWind.setContent(content);
            infoWind.open(map, marker);
          })
        })
      }

         