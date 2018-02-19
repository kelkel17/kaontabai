<?php
    include('../dbconn.php');
    $con = con();
    // $id = $_SESSION['id'];
    $id = $_SESSION['id'];
    $sql = "SELECT count(*) as count, DATE_FORMAT(time_receive, '%M %d, %Y') as dat FROM notifications WHERE status = 0 AND restaurant_id = '$id' GROUP BY restaurant_id";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>