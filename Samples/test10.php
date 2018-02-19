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
    
	<link href="../assets/css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="sweetalert.min.js"></script>
    
    <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
    <script src="moment.js"></script>
    
</head>
<body>
    <input type="text" name="date" id="iDate">
</body>
<script>
    $(document).ready(function(){
        var test = '';
	$.ajax({
        type: "GET",
		url: "getdate.php",    
        dataType: 'json',
        success: function(data) {

           var test2 = [];
            for(var i in data) {
				test2.push(moment(data[i].dat).format('DD-M-YYYY'));
            console.log(test2);
			}
            
        
            function unavailable(date) {
                dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
                    if ($.inArray(dmy, test2) == -1) {
                            return [true, ""];
                                console.log(test2);
                    } else {
                            return [false,"","Unavailable"];
                            console.log(test2);
                    }
             }
        $('#iDate').datepicker({ beforeShowDay: unavailable});

        }
        });
       

    });
</script>
<script>
    

            
</script>
<!-- <script>
    $(document).ready(function(){
	$.ajax({
        type: "GET",
		url: "getorder.php",    
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
</script> -->

</html>