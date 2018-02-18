<?php 
        include('../Controller/dbconn.php');
        $data = 1;
        
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');
         $test = viewAllReservations2(array($data));
         foreach($test as $t){
               if($date == $t['dat'])
                print_r($t);
                else{
                print_r($t);
                echo 'bleee';
           }
         }
	
?>