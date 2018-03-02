<?php
    include('../../Controller/dbconn.php');
    $con = con();
    $id = $_GET['cid'];
<<<<<<< HEAD
    // $id = 11;
    $sql = "SELECT max_capacity as max, temp as temp  FROM restaurants  WHERE restaurant_id = '$id'";
=======
    // $id = 1;
    $sql = "SELECT max_capacity as max, temp as temp FROM restaurants  WHERE restaurant_id = '$id'";
>>>>>>> 82235b35d98417179766c52c6f9a33dd651fc7db
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($row);

?>