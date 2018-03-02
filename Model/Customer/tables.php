<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    viewAllOwners();
    $Resid = $_GET['cid']; 
    $pid = $_GET['pid'];
    $basta = getSingleOwner(array($Resid));
    $max = $basta['maxdate'];
    echo $max;
?>

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="">
    <!--<![endif]-->
    <?php include('header.php');?>
        <span><br></span>
        <span><br></span>
        <span><br></span>
        <span><br></span>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12" id="div0">
                    <center>
                        <h2 style="color: black;">Tables</h2></center>
                    <?php $tables = getTables(array($Resid));
                 foreach($tables as $t){ ?>
                        <!-- SECTION -->
                        <div class="col-sm-4 container" style="margin-bottom: 5%;">
                            <?php 
                        $filename = '../../Image/'.$t['image'].'';
                        if($t['image'] == '' || !(file_exists($filename))){?>
                                <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail" style="width: 100%; height: 300px;">
                                <?php }else{ ?>
                                    <img src="../../Image/<?php echo $t['image']?>" class="img-responsive thumbnail" style="width: 100%; height: 300px;">
                                    <?php } ?>
                                        <h5>Table Number: <?php echo $t['table_num']; ?></h5>
                                        <h5>Description: <?php echo $t['area_desc']; ?></h5>
                                        <h5>Min Capacity: <?php echo $t['mincapacity'];?></h5>
                                        <h5>Max Capacity: <?php echo $t['maxcapacity'];?></h5>

                                        <?php 
                                          $con = con();
                                         // $sql = "SELECT * FROM schedules WHERE restaurant_id = '$Resid' GROUP BY restaurant_id ORDER BY sched_id desc";
                                         $sql = "SELECT * FROM schedules s, restaurants r WHERE r.restaurant_id = s.restaurant_id AND s.restaurant_id = '$Resid' ORDER BY DATE_FORMAT(s.sched_sdate, '%D')";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          date_default_timezone_set("Asia/Manila");
                                          $flag = false;
                                          $flag2 = false;
                                          $date2 = date('Y-m-d');
                                         
                                          foreach ($view as $r) {
                                         //  print_r($r);
                                            $date = date('Y-m-d', strtotime($r['sched_sdate']));
                                            $date3 = date('Y-m-d', strtotime($r['sched_edate']));
                                            
                                                if($date <= $date2 && $date3 >= $date2 && $r['status'] == 1){ 
                                                        $flag = true;
                                                }
                                                if($t['status'] == 1){ 
                                                            $flag2 = true;
                                                    }  
                                          }
                                                if($flag){?>
                                                    <a onclick="notAllo(<?php echo $r['restaurant_id'];?>,'<?php echo $r['restaurant_name'];?>','<?php echo $r['sched_sdate'];?>');" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                <?php  } 
                                                if($flag2){ ?>
                                                    <a onclick="alreadyBook(<?php echo $r['restaurant_id'];?>,'<?php echo $r['restaurant_name'];?>');" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                <?php } elseif(!($flag) && !($flag2)){ ?>
                                                    <a href="#" onclick="getDate(<?php echo $_GET['cid'];?>,<?php echo $t['table_id'];?>,<?php echo $basta['maxdate'];?>);" class="btn btn-primary pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>                                    
                                                <?php }
                                            ?>
                        </div>
                        <?php include('tablemodal.php'); ?>
                            <script>
                                function notAllo(eventId, resName,sDate) {
                                    var date = moment(sDate).format('LL');
                                    swal({
                                        title: "Notice",
                                        text: resName + "'s Restaurant doesn't allow online reservation at the moment.",
                                        icon: "warning"
                                    });
                                }
                                function alreadyBook(eventId, resName) {
                                    swal({
                                        title: "Notice",
                                        text: resName + "This table is already been reserved",
                                        icon: "warning"
                                    });
                                }
                            </script>
                            <script>
                                        function getDate(restId,tableId,maxDate) {
 //                                           alert(maxDate);
 
                                            $('#bookNow' + restId).modal('show');
                                            $.ajax({
                                                type: "GET",
                                                url: "getres.php?cid=" + restId,
                                                dataType: 'json',
                                                success: function(data) {
                                                    for (var i in data) {

                                                        $('.equipCatValidation').on('keyup keydown', function(e) {

                                                            if ($(this).val() > parseInt(data[i].max) && e.keyCode != 46 && e.keyCode != 8) {
                                                                e.preventDefault();
                                                                 var newvalue = data[i].max - data[i].temp;
                                                                $(this).val(newvalue);
                                                                console.log($(this).val() > newvalue);
                                                            }
                                                        });
                                                    }
                                                }
                                            });
                                            $.ajax({
                                                type: "GET",
                                                url: "getdate.php?cid=" + restId,
                                                dataType: 'json',
                                                success: function(data) {
                                                    // console.log(data);
                                                    var test2 = [];
                                                    var dateRange = [];
                                                    var test = [];
                                                   if(data.length == 0){
                                                       console.log(maxDate);
                                                         $('#datepicker').datepicker({
                                                                        format: 'MM dd, yyyy',
                                                                        startDate: '-0d',
                                                                        endDate: "+"+maxDate+"d",
                                                                    // datesDisabled: test2,
                                                         });
                                                         $.ajax({
                                                                type: "GET",
                                                                url: "gettime.php?cid=" + restId,
                                                                dataType: 'json',
                                                                success: function(datas) {
                                                                    for (var x in datas) {
                                                                       // console.log(datas[x]);
                                                                        $("#timepicker").timepicker({
                                                                            timeFormat: 'g:i A',
                                                                            minTime: datas[x].open,
                                                                            maxTime: datas[x].close
                                                                        });
                                                                    }
                                                                }
                                                            });    
                                                   }
                                                   else if(data.length > 0){
                                                            for (var i in data) {
                                                        
                                                            if(data[i].stat == '0'){
                                                        
                                                            }
                                                            if(data[i].stat == '1'){

                                                                // console.log('wa ni agi');
                                                                var asd = data[i].dat;
                                                                //console.log(asd);
                                                                test2 = [moment(data[i].dat).format('M-D-YYYY'),moment(data[i].dats).format('M-D-YYYY')];
                                                                test3 = [moment(data[i].dat).format('M-D-YYYY')];
                                                                test4 = [moment(data[i].dats).format('M-D-YYYY')];
                                                        
                                                                }
                                                            }
                                                            if(data[i].stat == '0'){
                                                            $('#datepicker').datepicker({
                                                                        format: 'MM dd, yyyy',
                                                                        startDate: '-0d',
                                                                        endDate: "+"+data[i].max+"d",
                                                                    // datesDisabled: test2,
                                                            });
                                                            }
                                                            if(data[i].stat == '1'){
                                                             //   console.log(data[i].max);
                                                            $('#datepicker').datepicker({
                                                                        format: 'MM dd, yyyy',
                                                                        startDate: '-0d',
                                                                        endDate: "+"+data[i].max+"d",
                                                                        // todayHighlight: true,
                                                                        beforeShowDay:  function (currentDate) {
                                                                            var dayNr = currentDate.getDay();
                                                                            var dateNr = moment(currentDate.getDate()).format('M-D-YYYY');
                                                                                if (test2.length > 0) {
                                                                                    for (var i = 0; i < test2.length; i++) {                        
                                                                                        if (moment(currentDate).unix()>=moment(test3[i],'M-D-YYYY').unix() && moment(currentDate).unix()<=moment(test4[i],'M-D-YYYY').unix()){
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                }
                                                                                return true;
                                                                            }
                                                                    });
                                                            }        
                                                                
                                                            $.ajax({
                                                                type: "GET",
                                                                url: "gettime.php?cid=" + restId,
                                                                dataType: 'json',
                                                                success: function(datas) {
                                                                    for (var x in datas) {
                                                                       // console.log(datas[x]);
                                                                        $("#timepicker").timepicker({
                                                                            timeFormat: 'g:i A',
                                                                            minTime: datas[x].open,
                                                                            maxTime: datas[x].close
                                                                        });
                                                                    }
                                                                }
                                                            });  
                                                        }    
                                                    }
                                                    
                                                });

                                        }
                                    </script>
                            <?php } ?>

                </div>
            </div>
        </div>

        <?php include('footer.php');?>

            <!-- <script src="../../assets/js/extension2.js"></script> -->

            </body>

    </html>