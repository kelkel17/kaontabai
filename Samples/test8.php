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
    
</body>
<script>
    $(document).ready(function(){
	$.ajax({
        type: "GET",
		url: "getdata.php",    
        dataType: 'json',
        success: function(data) {
            for(var i = 0; i < data.length;i++)
            console.log(data[i]);
            var date = moment().format('LL');
            console.log(date);
            var date2 = data[0].dat; 
            console.log(date2);

            if(date != date2){
                console.log('dili okay');
                swal("As of today you have "+data[0].count+" reservation",{
                    icon: "info"
                });
            }else{
                console.log('okay');
            }

        }
        });
    });
</script>
<script>
    $(document).ready(function(){
	$.ajax({
        type: "GET",
		url: "getnotif.php",    
        dataType: 'json',
        success: function(data) {
            for(var i = 0; i < data.length;i++)
            console.log(data[i]);
            var date = moment().format('LL');
            console.log(date);
            var date2 = data[0].count; 
            console.log(date2);
            // if(date != date2){
            //     console.log('dili okay');
                swal("You have new "+date2+" notifications",{
                    icon: "info"
                });
            // }else{
            //     console.log('okay');
            // }

        }
        });
    });
</script>

</html>