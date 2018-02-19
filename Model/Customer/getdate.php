<?php
    include('../../Controller/dbconn.php');
    $con = con();
    $id = $_GET['cid'];
    $sql = "SELECT sched_sdate as dat FROM schedules WHERE status = 1 AND restaurant_id = 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($row);

?>