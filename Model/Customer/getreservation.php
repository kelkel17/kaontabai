<?php
    include('../../Controller/dbconn.php');
    $con = con();
    $id = $_SESSION['id'];
    $sql = "SELECT r.reservation_number as num, r.reservation_date as dat, r.res_status as stat, s.restaurant_name as name FROM reservations r, restaurants s WHERE r.restaurant_id = s.restaurant_id AND  r.customer_id = '$id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($row);

?>