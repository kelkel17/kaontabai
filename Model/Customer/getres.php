<?php
    include('../../Controller/dbconn.php');
    $con = con();
    $id = $_GET['cid'];
    $sql = "SELECT max_capacity as max, temp as temp FROM restaurants WHERE restaurant_id = '$id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($row);

?>