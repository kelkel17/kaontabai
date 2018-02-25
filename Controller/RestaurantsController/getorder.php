<?php
    include('../dbconn.php');
    $con = con();
    $id = $_SESSION['id'];
   // $id = 1;
    $sql = "SELECT count(order_id) as count, order_time as dat FROM orders WHERE status = 'Queueing' AND restaurant_id = '$id' GROUP BY order_time";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>