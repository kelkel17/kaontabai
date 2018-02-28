<section>
    <?php 
                $cid = $_GET['cid'];
                $rows = getOwner(array($cid));
                foreach ($rows as $row) {
                    $id = $_GET['id'];
              ?>

        <section id="abouts" class="abouts">
            <div class="container">

                <div class="row">
                    <div class="col-lg-7">
                        <div class="abouts_content">

                            <h1 class="mt-4"><?php echo $row['restaurant_name'];?>'s Restaurant</h1>
                            <br/>
                            <!-- Preview Image -->
                            <div>
                                <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" class="img-fluid rounded" style="display: block;margin-left: auto;margin-right:auto;"  align="top" alt=""/>'; ?>
                            </div>
                            <hr/>
                            <div>
                                <p>
                                    <?php echo '<td>'.$row['restaurant_desc'].'</td>'; ?>
                                </p>
                            </div>
                            <hr/>
                        </div>
                    </div>
                    <?php
                                    $lnglat = getLL();
                                    $lnglat = json_encode($lnglat,true);

                                    echo '<div id="data" style="display:none;">'.$lnglat.'</div>';

                                    // $latlng = getMap();
                                    // $latlng = json_encode($latlng,true);

                                    // echo '<div id="alldata" style="display:none;">'.$latlng.'</div>';
                                    $cid = $_GET['cid'];
                                    $byId = getMapbyId($cid);
                                    // $byId = json_encode();
                                    foreach($byId as $r) {
                                    echo '<div id="getbyid" style="display:none;">'.$r.'</div>';
                                  }
                                ?>
                        <div class="col-sm-4">
                            <div class="abouts_content" style="margin-top:-5%;">
                                <div class="card my-6">
                                    <h5 class="card-header">Address</h5>
                                    <div class="card-body">
                                        <span class="fa fa-map-marker" aria-hidden="true"></span>&nbsp;&nbsp;
                                        <?php echo '<td>'.$row['restaurant_addr'].'</td>'; ?>
                                            <div id="map" style="width: 100%; height: 300px"></div>

                                    </div>
                                </div>
                                <hr/>
                                <div class="card my-4">
                                    <h5 class="card-header">Hours Open</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <span class="fa fa-clock-o" aria-hidden="true"></span>&nbsp;&nbsp;
                                                <?php echo '<td>'.date('g:i A', strtotime($row['hour_open'])).'</td>'; ?> to
                                                    <?php echo '<td>'.date('g:i A', strtotime($row['hour_close'])).'</td>'; ?>(Mon-Sun)

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <!-- Side Widget -->
                                <div class="card my-4">
                                    <h5 class="card-header">Contact Details</h5>
                                    <div class="card-body">
                                        <span class="fa fa-phone" aria-hidden="true"></span>&nbsp;&nbsp;
                                        <?php echo '<td>'.$row['restaurant_contact'].'</td>'; ?>
                                    </div>
                                </div>
                                <hr/>
                                <div class="card my-4">
                                    <div class="card-body">
                                        <?php
                                         $id = $_SESSION['id'];
                                         $resId = $row['restaurant_id'];
                                         $rate = doneRating($id,$resId);

                                         if($rate){
                                          ?>

                                            <h5 class="card-header">Thank you for ratings us</h5>
                                            <input value=<?php echo $rate[ 'rate'];?> type="number" class="rating" min="0" max="5" step="0" data-size="xs" data-stars="5" productId=
                                            <?php echo $resId;?> name="rate" disabled />
                                                <?php } else{?>

                                                    <h5 class="card-header">Rate us</h5>
                                                    <form action="getstar.php?cid=<?php echo $row['restaurant_id'];?>" method="POST">

                                                        <input value="" type="number" class="rating" min=0 max=5 step=0 data-size="xs" data-stars="5" productId=<?php echo $resId;?> name="rate" />
                                                        <button type="submit" name="submit" class="btn btn-primary hover" style="float:left; ">Rate Us</button>

                                                    </form>
                                                    <?php } ?>
                                                        <a href="menu2.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">Menu&nbsp;<i class="fa fa-cutlery" aria-hidden="true"></i></a>
                                                        <a href="tables.php?cid=<?php echo $row['restaurant_id'];?>&pid=<?php echo $id;?>" class="btn btn-primary">&nbsp; Tables&nbsp;&nbsp;</a>
                                    </div>
                                </div>
                                <br/>
                                <div class="card my-4">
                                    <div class="card-body">

                                        <?php include('bookmodal.php'); 
                                          $cid = $row['restaurant_id'];
                                          $con = con();
                                          //$sql = "SELECT * FROM schedules WHERE restaurant_id = '$cid' GROUP BY restaurant_id ORDER BY DATE_FORMAT(sched_sdate, '%D')";
                                          $sql = "SELECT * FROM schedules WHERE restaurant_id = '$cid' ORDER BY DATE_FORMAT(sched_sdate, '%D')";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          date_default_timezone_set("Asia/Manila");
                                          $date2 = date('Y-m-d');
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          $flag = false;
                                          foreach ($view as $rows) {
                                            $date = date('Y-m-d', strtotime($rows['sched_sdate']));
                                            $date3 = date('Y-m-d', strtotime($rows['sched_edate']));
                                            // echo $date2;
                                            // echo '<br>';
                                            // echo $date3;
                                                if($date <= $date2 && $date3 >= $date2 && $rows['status'] == 1){
                                                    
                                                    $flag = true;
                                                    ?>
                                                        <!-- <a onclick="notAllo(<?php echo $row['restaurant_id'];?>,'<?php echo $row['restaurant_name'];?>');" class="btn btn-danger">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a> -->
                                                <?php }  
                                                 }  

                                                if($flag){
                                                    $flag = true;
                                                    ?>
                                                        <a onclick="notAllo(<?php echo $row['restaurant_id'];?>,`<?php echo $row['restaurant_name'];?>`);" class="btn btn-danger">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                <?php } else{ ?>
                                                <a href="#" onclick="getDate(<?php echo $row['restaurant_id'];?>);" class="btn btn-primary">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                                <?php } ?>
                                                    <a href="#" data-toggle="modal" data-target="#messageUs<?php echo $row['restaurant_id'];?>" class="btn btn-primary">&nbsp;Message Us&nbsp;<i class="fa fa-comment" aria-hidden="true"></i></a>
                                    </div>
                                    <script>
                                        function notAllo(eventId, resName) {
                                            swal({
                                                title: "Notice",
                                                text: resName + "'s Restaurant doesn't allow online reservation at the moment.",
                                                icon: "warning"
                                            });
                                        }
                                    </script>
                                    <script>
                                        function getDate(restId) {
                                            // alert(restId);
 
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
                                                    for (var i in data) {
                                                      //test.push('data[i].stat');
                                                     
                                                    }
                                                    if(data[i].stat == '0'){
                                                    $('#datepicker').datepicker({
                                                                format: 'MM dd, yyyy',
                                                                startDate: '-0d',
                                                                endDate: "+"+data[i].max+"d",
                                                               // datesDisabled: test2,
                                                        });
                                                        console.log('ni agi');
                                                    }else if(data[i].stat == '1'){
                                                        
                                                        console.log('wa ni agi');
                                                        test2 = [moment(data[i].dat).format('M-D-YYYY'),moment(data[i].dats).format('M-D-YYYY')];
                                                   
                                                    //   test2.push(moment(data[i].dat).format('M-D-YYYY'),moment(data[i].dats).format('M-D-YYYY'));
                                                    //     for (var d = new Date(data[i].dat); d <= new Date(data[i].dats); d.setDate(d.getDate() + 1)) {
                                                    //     dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
                                                    // }
                                                       
                                                    // }
                                                    // if(data[i].stat == 1){ 
                                                    //             $('#datepicker').datepicker({
                                                    //                 beforeShowDay: function (date) {
                                                    //                     var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                                    //                     return [dateRange.indexOf(dateString) == -1];
                                                    //                 },
                                                    //                 minDate: -0,
                                                    //                 maxDate: "+"+data[i].max+"D",
                                                    //                 changeMonth: true,
                                                    //                 changeYear: true,
                                                    //                // showAnim: "fold",
                                                    //                 numberOfMonths: 1,
                                                    //                 dateFormat: 'MM dd, yy'
                                                    //             });
                                                    //         }
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
                                                                                if (moment(currentDate).unix()==moment(test2[i],'M-D-YYYY').unix()){
                                                                                    return false;
                                                                            }
                                                                            }
                                                                        }
                                                                        return true;
                                                                    }
                                                            });
                                                        }
                                                    // use this array 
                                                    
                                                   // console.log(test2);
                                                    
                                                    
                                                            
                                                            var disabledDays = [];
                                                            disabledDays.push("3-1-2018");
                                                            // console.log(disabledDays);
                                                            function nationalDays(date) {
                                                                var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                                                                for(i = 0; i < test2.length; i++) {
                                                                    if($.inArray((m+1) + '-' + d + '-' + y,test2) != -1 || new Date() > date) {
                                                                        return [false];
                                                                    }else
                                                                        return [true];
                                                                }
                                                              }
                                                             /*  function nationalDays(date) {
                                                                dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                                                               // console.log(dmy);
                                                                if ($.inArray(dmy, test2) == -1) {
                                                                    return [true, ""];
                                                                } else {
                                                                    return [false, "", "Unavailable"];
                                                                }
                                                            }  */
                                                           /* else if(data[i].test2 == ''){
                                                                $('#datepicker').datepicker({
                                                                    minDate: -0,
                                                                    maxDate: "+"+data[i].max+"D",
                                                                    changeMonth: true,
                                                                    changeYear: true,
                                                                   // showAnim: "fold",
                                                                    numberOfMonths: 1,
                                                                    dateFormat: 'MM dd, yy'
                                                                });
                                                            } */
                                                           
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
                                                            }
                                                        }
                                                    });    
                                                }
                                                
                                            });

                                        }
                                    </script>
                                    <!-- <script>
                              function getDate(restId){
                                // alert(restId);
                                $('#bookNow'+restId).modal('show');
                                  $.ajax({
                                        type: "GET",
                                        url: "gettime.php?cid="+restId,    
                                        dataType: 'json',
                                        success: function(data) {
                                        // console.log(data);
                                        // var test2 = [];
                                        for(var i in data) {

                                        // test2.push(moment(data[i].dat).format('DD-M-YYYY'));
                                          console.log(data[i]);
                                              $("#timepicker").timepicker({
                                                  timeFormat: 'g:i A',
                                                  minTime: data[i].open,
                                                  maxTime: data[i].close
                                              });
                                        }

                                    }
                                  });

                                } 
                                </script> -->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <?php } ?>
</section>