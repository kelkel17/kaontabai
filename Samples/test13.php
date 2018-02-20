<link rel="stylesheet" href="../something/css/jquery.timepicker.css">
<script src="../something/js/jquery.min.js"></script>
<script src="../something/js/jquery.timepicker.js"></script>
  <input type="text" name="time" id="timepicker">
<script>
    $.ajax({
        type: "GET",
        url: "gettime.php",    
        dataType: 'json',
        success: function(data) {
            for(var i in data) {
            
                console.log(data[i].open);
                console.log(data[i].close);
                $("#timepicker").timepicker({
                    timeFormat: 'g:i A',
                    minTime: data[i].open,
                    maxTime: data[i].close
                });
            }
        }
    
    });
</script>