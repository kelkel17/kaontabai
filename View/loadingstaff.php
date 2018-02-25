<?php 
  include('../Controller/dbconn.php'); 

?>
    <!DOCTYPE html>
    <html>

    <head>
        <link href="../something/css/loading.css" rel="stylesheet">
        <script src="../something/js/jquery.min.js"></script>
    </head>

    <body>

        <h1>Cooking in progress..</h1>
        <div id="cooking">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div id="area">
                <div id="sides">
                    <div id="pan"></div>
                    <div id="handle"></div>
                </div>
                <div id="pancake">
                    <div id="pastry"></div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        setTimeout(function() {
            // $('#asd').hide();
            $('#cooking').fadeOut("slow");
            // $('#cube1').fadeOut("slow");
            // $('#cube2').fadeOut("slow");
            // $('#asd').fadeIn();
            window.location = "indexstaff.php?id=<?php echo $_SESSION['id']; ?>";

        }, 3000);
    </script>

    </html>