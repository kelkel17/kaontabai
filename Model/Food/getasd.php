<?php 
    include ('../../Controller/dbconn.php');

    $con = con();
    $sql = "SELECT * FROM menu_category";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = array();
    foreach($view as $d){
        $data[] = $d;
    }
    echo json_encode($data);
?>