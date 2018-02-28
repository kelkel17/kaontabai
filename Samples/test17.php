<?php
    include ('../Controller/dbconn.php');

    $con = con();
    $sql = "SELECT * FROM restaurants WHERE restaurant_id = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(isset($_POST['add'])){
        $guest = $_POST['guest'];
        $temp = $row['temp'] + $guest;
        echo $temp;
        updateTemp(array($temp,1));
        // echo $temp;
        var_dump($temp);        
    }    
    
?>
<form action="" method="post">
<input type="text" name="guest">
<input type="submit" name="add">
</form>