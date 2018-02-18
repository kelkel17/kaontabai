<?php
   include '../dbconn.php';
//    print_r($_REQUEST['lng']);
    


    $id=$_REQUEST['id'];
    $lat=$_REQUEST['lat'];
    $lng=$_REQUEST['lng'];

    $loc = updateLoc($id,$lat,$lng);
?>