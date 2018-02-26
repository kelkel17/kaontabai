<?php
    include('../Controller/dbconn.php');
?>  
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="sweetalert.min.js"></script>
    <script src="moment.js"></script>
</head>
<body>
    <input type="text" id="content">
    <div id="category_type">
        <select name="category" id="category">
            <option value="0"></option>
            <option value="1">Main Course</option>
            <option value="2">Beverages</option>
            <option value="3">Desserts</option>
        </select>
    </div>
    <div id="1">
        <select name="type[]" id="type1">
            <option value="Pork">Pork</option>
            <option value="Chicken">Chicken</option>
            <option value="Beef">Beef</option>
            <option value="Fish">Fish</option>
        </select>    
    </div>
    <div id="2">
        <select name="type[]" id="type2">
            <option value="Shakes">Shakes</option>
            <option value="Soft Drinks">Soft Drinks"</option>
            <option value="Beers">Beers</option>
            <option value="Tea">Tea</option>
        </select>
    </div>
    <div id="3">
        <select name="type[]" id="type3">
            <option value="Ice Cream">Ice Cream</option>
            <option value="Halo-Halo">Halo-Halo</option>
            <option value="Cake">Cake</option>
            <option value="Special">Special</option>
        </select>
    </div>
</body>
<script>
    
        $('#1').hide();
        $('#2').hide();
        $('#3').hide(); 
    $('#category').on('change', function(){
        var data = $(this).val();
        console.log(data);
       if(data == 1){
           $('#content').val('Pork');
           $('#1').show();
            $('#type1').on('change', function(){
                $('#content').val($(this).val());     
            });
           $('#2').hide();
           $('#3').hide(); 
       }else if(data == 2){
           $('#content').val('Shakes');
            $('#type2').on('change', function(){
                $('#content').val($(this).val());     
            });
           $('#1').hide();
           $('#2').show();
           $('#3').hide();
       }else if(data ==3){
           $('#content').val('Ice Cream');
            $('#type3').on('change', function(){
                $('#content').val($(this).val());     
            });
           $('#1').hide();
           $('#2').hide();
           $('#3').show();
       }else if(data == 0){
           $('#1').hide();
           $('#2').hide();
           $('#3').hide();
            $('#content').val(''); 
       }
    });
</script>
</html>