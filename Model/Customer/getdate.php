<?php
        include('../../Controller/dbconn.php');
        $con = con();
        $id = $_SESSION['id'];
        $sql = "SELECT s.sched_sdate as dat, s.sched_edate as dats, r.maxdate as max, s.status as stat FROM schedules s, restaurants r WHERE r.restaurant_id = s.restaurant_id AND s.restaurant_id = 1";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($row);

    ?>