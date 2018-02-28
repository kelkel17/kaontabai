<?php
    include('../dbconn.php');
    $con = con();
    // $id = 1;
    $sql = "SELECT count(customer_id) as count, date_created as dat FROM customers WHERE customer_status = 'Active' GROUP BY DATE_FORMAT(date_created, '%D %M %Y') ORDER BY DATE_FORMAT(date_created, '%D %M %Y') DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($row as $r){
        $data[] = $r;
    }

    echo json_encode($data);

?>