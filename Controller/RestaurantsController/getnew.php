<?php
    include('../dbconn.php');
    $con = con();
    // $id = 1;
    $id = $_SESSION['id'];
    $sql = "SELECT count(*) as count, date_created as dc FROM customers WHERE status = 1 AND customer_id = '$id' ORDER BY date_created DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>