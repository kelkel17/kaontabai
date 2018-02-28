<?php
    include('../../Controller/dbconn.php');
    $con = con();
    // $id = $_GET['cid'];
    $id = 1;
    $sql = "SELECT r.max_capacity as max, r.temp as temp, res.reservation_date as dat FROM restaurants r, reservations res WHERE res.restaurant_id = r.restaurant_id AND r.restaurant_id = '$id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($row);

?>