<?php
    include('../Controller/dbconn.php');
    $con = con();
    $sql = "SELECT count(*) as count, reservation_date as dat, reservation_time as tim FROM reservations WHERE res_status = 'Pending' AND restaurant_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $data = array();
        $data[] = $row;
    

    echo json_encode($data);

?>