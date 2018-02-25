<?php
    include('../dbconn.php');
    $con = con();
    $id = $_SESSION['id'];
   // $id = 1;
    $sql = "SELECT count(event_id) as count, event_date as dat FROM events WHERE event_status = 'Open' AND restaurant_id = '$id' GROUP BY event_date";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>