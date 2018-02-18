<?php
    include('../Controller/dbconn.php');
    $asd = 1;
    $con = con();
    date_default_timezone_set("Asia/Manila");
    $date2 = date('2018-02-21');
    $sql2 = "SELECT SUM(r.no_of_guests) as guest, t.max_capacity, r.reservation_date, r.res_status FROM reservations as r, restaurants as t WHERE r.restaurant_id = t.restaurant_id AND r.restaurant_id = '$asd' AND r.reservation_id = '4' GROUP BY r.reservation_date";
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute();
    $rsd = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    foreach($rsd as $r){
        //print_r($r);
        $date5 = date('Y-m-d', strtotime($r['reservation_date']));
        if($date2 <= $date5){
                //echo 'parihag adlaw';
            if($r['res_status']=='Reserved'){ 
                    //echo 'parihag status';
                    // $date8 = date('Y-m-d');
                    
                    if($r['max_capacity'] <= $r['guest'])
                    {
                        $status = 1;
                        $number = FLOOR(RAND(1000,50000));
                        $data = array($asd,$date5,$status,$number);
                        autoAdd2($data);
                    }
                    else if($r['max_capacity'] > $r['guest']){
                        echo 'pero dili sila equal';
                        $get = getAdd(array($asd));
                        $status = 0;
                        //print_R ($get);
                        $data = array($asd,$status,$get['sched_id']);
                        updateAdd2($data);
                        break;
                    }
            }
           
        }
        elseif($date2 > $date5){
                  //  echo 'dili parihag adlaw';
                    $get = getAdd2(array($date5));
                    $status = 0;
                    //print_r($get);
                   foreach($get as $jkl){
                    $date6 = date('Y-m-d', strtotime($jkl['sched_sdate']));
                          $data = array($asd,$status,$jkl['sched_id']);
                          updateAdd2($data);
            
                    }
                
        }
    }

?>
