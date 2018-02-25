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
                                            <input value=<?php echo $rate[ 'rate'];?> type="number" class="rating" min=0 max=5 step=0 data-size="xs" data-stars="5" productId=
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
                                          $sql = "SELECT * FROM schedules WHERE restaurant_id = '$cid' GROUP BY restaurant_id";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          date_default_timezone_set("Asia/Manila");
                                          $date2 = date('Y-m-d g');
                                          $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                          foreach ($view as $rows) {
                                            $date = date('Y-m-d g', strtotime($rows['sched_sdate']));

                                           if($rows['status'] == 1 && $date == $date2){ ?>
                                                <a onclick="notAllo(<?php echo $row['restaurant_id'];?>,'<?php echo $row['restaurant_name'];?>');" class="btn btn-danger">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>
                                            <?php } else { ?>
                                                <a href="#" onclick="getDate(<?php echo $row['restaurant_id'];?>);" class="btn btn-primary">&nbsp;Book Now&nbsp;<i class="fa fa-bookmark" aria-hidden="true"></i></a>

                                                <?php } }  ?>
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
                                                                $(this).val(data[i].max);
                                                                console.log($(this).val() > data[i].max);
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
                                                    for (var i in data) {

                                                        test2.push(moment(data[i].dat).format('DD-M-YYYY'));
                                                        console.log(test2);
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