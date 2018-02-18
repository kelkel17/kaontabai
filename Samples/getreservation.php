<?php
    include('../Controller/dbconn.php');
    $con = con();
    $id = $_SESSION['id'];
    $sql = "SELECT reservation_number as num, reservation_date as dat, res_status as stat FROM reservations WHERE  customer_id = '$id' GROUP BY reservation_date";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>