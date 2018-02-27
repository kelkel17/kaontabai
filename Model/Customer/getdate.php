<?php
    include('../../Controller/dbconn.php');
    $con = con();
    $id = $_GET['cid'];
    // $id = 12;
    $sql = "SELECT s.sched_sdate as dat, s.sched_edate as dats, r.maxdate as max FROM schedules s, restaurants r WHERE s.restaurant_id = r.restaurant_id AND s.status = 1 AND s.restaurant_id = '$id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($row);

?>