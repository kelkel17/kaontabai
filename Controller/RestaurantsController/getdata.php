<?php
    include('../dbconn.php');
    $con = con();
    $id = $_SESSION['id'];
    $sql = "SELECT count(reservation_id) as count, reservation_date as dat, reservation_time as tim FROM reservations WHERE res_status = 'Pending' AND restaurant_id = '$id' GROUP BY reservation_date";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>