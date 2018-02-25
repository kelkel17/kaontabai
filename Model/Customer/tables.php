<?php

    include '../../Controller/dbconn.php';
    //include '../../try.php';
    islogged2();
    viewAllOwners();
    $Resid = $_GET['cid']; 
    $pid = $_GET['pid'];

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
                                          $sql = "SELECT * FROM schedules WHERE restaurant_id = '$Resid' GROUP BY restaurant_id ORDER BY sched_id desc";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          date_default_timezone_set("Asia/Manila");
                                          $date2 = date('Y-m-d');
                                          foreach ($view as $rows) {
                                            print_r($rows);
                                            $date = date('Y-m-d', strtotime($rows['sched_sdate']));
                                            if($rows['status'] == 1 && $date == $date2){ ?>
                                                <a onclick="notAllo(<?php echo $rows['restaurant_id'];?>,'<?php echo $rows['restaurant_name'];?>','<?php echo $rows['sched_sdate'];?>');" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                            <?php }
                                           if($t['status'] == 1){ ?>
                                                <a onclick="alreadyBook(<?php echo $rows['restaurant_id'];?>,'<?php echo $rows['restaurant_name'];?>');" class="btn btn-danger pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                <?php } else if($rows['status'] == 0) { ?>
                                                    <a href="#" onclick="getDate(<?php echo $_GET['cid'];?>,<?php echo $t['table_id'];?>)" class="btn btn-primary pull-right">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                    <?php } } ?>
                        </div>
                        <?php include('tablemodal.php'); ?>
                            <script>
                                function notAllo(eventId, resName,sDate) {
                                    swal({
                                        title: "Notice",
                                        text: resName + "'s Restaurant doesn't allow online reservation at the moment."+sDate,
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
                                function getDate(restId, tableId) {
                                    $('#bookNow' + tableId).modal('show');
                                    $.ajax({
                                        type: "GET",
                                        url: "getdate.php?cid=" + restId,
                                        dataType: 'json',
                                        success: function(data) {
                                            // console.log(data);
                                            var test2 = [];
                                            for (var i in data) {

                                                test2.push(moment(data[i].dat).format('DD-M-YYYY'));
                                                console.log(test2);
                                                $('.equipCatValidation').on('keydown keyup', function(e) {
                                                    if ($(this).val() > data[i].max && e.keyCode != 46 && e.keyCode != 8) {
                                                        e.preventDefault();
                                                        $(this).val(data[i].max);
                                                    }
                                                });

                                            }
                                            $.ajax({
                                                type: "GET",
                                                url: "gettime.php?cid=" + restId,
                                                dataType: 'json',
                                                success: function(datas) {
                                                    for (var x in datas) {
                                                        console.log(datas[x]);
                                                        $("#timepicker").timepicker({
                                                            timeFormat: 'g:i A',
                                                            minTime: datas[x].open,
                                                            maxTime: datas[x].close
                                                        });
                                                        $(".timepicker2").timepicker({
                                                            timeFormat: 'g:i A',
                                                            minTime: datas[x].open,
                                                            maxTime: datas[x].close
                                                        });
                                                    }
                                                }
                                            });

                                            function unavailable(date) {
                                                dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                                                if ($.inArray(dmy, test2) == -1) {
                                                    return [true, ""];
                                                    // console.log(test2);
                                                } else {
                                                    return [false, "", "Unavailable"];
                                                    // console.log(test2);
                                                }
                                            }
                                            $('#datepicker').datepicker({
                                                beforeShowDay: unavailable,
                                                minDate: -0,
                                                maxDate: "+14D",
                                                changeMonth: true,
                                                changeYear: true,
                                                numberOfMonths: 1,
                                                dateFormat: 'MM dd, yy'
                                            });
                                            $('.datepicker2').datepicker({
                                                beforeShowDay: unavailable,
                                                minDate: -0,
                                                maxDate: "+14D",
                                                changeMonth: true,
                                                changeYear: true,
                                                numberOfMonths: 1,
                                                dateFormat: 'MM dd, yy'
                                            });

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