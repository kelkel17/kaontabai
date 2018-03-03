<?php 

    include '../../Controller/dbconn.php';
    islogged();
?>

    <!DOCTYPE html>
    <html>

    <?php include('../header.php');?>
        <div class="divider"></div>
        <ul class="nav menu">
            <li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
            <li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
            <li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
            <li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
            <li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
            <li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
            <li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
            <li class="active"><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
            <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
        </div>
        <!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header" style="float: left;margin: 10px;">Menu</h1>
                    <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct" style="float: left;margin: 10px;">Add a Menu</button>
                </div>

                <?php include_once('foodmodal.php'); ?>
            </div>
            <!--/.row-->

            <div class="table-responsive">

                <table id="dataTable" class="cell-border compact display">
                    <thead>
                        <tr class="info" id="tableHeader">
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Description</center>
                            </th>
                            <th>
                                <center>Category</center>
                            </th>
                            <th>
                                <center>Type</center>
                            </th>
                            <th>
                                <center>Pieces</center>
                            </th>
                            <th>
                                <center>Volume</center>
                            </th>
                            <th>
                                <center>Image</center>
                            </th>
                            <th>
                                <center>Price</center>
                            </th>
                            <th>
                                <center>Status</center>
                            </th>
                            <!--  <th>Image</th> -->

                            <th>
                                <center>Action</center>
                            </th>

                        </tr>

                    </thead>

                    <tbody id="tableFooter">
                        <tr>
                            <?php 
  $id = $_SESSION['id'];
        $sql = "SELECT * FROM menus m, menu_category c WHERE m.mc_id = c.mc_id AND m.restaurant_id = '$id'";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row)  
        {
        echo '<td><center>'.$row['menu_number'].'</center></td>';
        echo '<td>'.$row['m_name'].'</td>';
        echo '<td>'.substr($row['m_desc'], 0, 50).((strlen($row['m_desc']) > 50) ? '...' : '').'</td>';
        echo '<td><center>'.$row['mc_name'].'</center></td>';
        echo '<td><center>'.$row['m_category'].'</center></td>';
        echo '<td><center>'.$row['pieces'].'</center></td>';
        echo '<td><center>'.$row['volume'].'</center></td>';
        if($row['m_image'] != '')
          echo '<td><center><img src="../../Image/'.$row['m_image'].'" style="width:25px; height:25px;"></center></td>';
        else
          echo '<td><center><img src="../../Image/icon3.png" style="width:25px; height:25px;"></center></td>';
        echo '<td><center>'.$row['m_price'].'</center></td>';
        echo '<td><center>'.$row['m_status'].'</center></td>'; 

        ?>
                                <div class="cell">
                                    <td>
                                        <center>

                                            <?php if($row['m_status'] == "Available"){?>
                                                <a href="#" onclick="getMenu(<?php echo $row['menu_id']; ?>,<?php echo $row['mc_id']?>)"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
                                                <a href="#" onclick="deact(<?php echo $row['menu_id'];?>);">
                                                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                                                </a>
                                                <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
                                                <?php }elseif($row['m_status'] != "Available"){ ?>
                                                    <a href="#" onclick="getMenu(<?php echo $row['menu_id']; ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>
                                                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
                                                    <a href="#" onclick="active(<?php echo $row['menu_id'];?>);">
                                                        <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                                                    </a>
                                                    <?php } ?>
                                        </center>
                                    </td>

                                   <!-- Edit Product Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateProduct<?php echo $row['menu_id']; ?>">
    <div class="modal-dialog" role="document">
        <form method="post" class="form-horizontal" action="../../Controller/FoodsController/addfood.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        <span>&times;</span>
                    </button>
                    <center>
                        <h3 class="modal-title">Edit Product</h3></center>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <label for="image<?php echo $row['menu_id']; ?>" class="hover">
                            <?php
                                   $filename = '../../Image/'.$row['m_image'];

                                  if($row['m_image']=='' || !(file_exists($filename))){?>
                                <img src="../../Image/blank.jpg" id="preview<?php echo $row['menu_id']; ?>" data-tooltip="true" title="Product image" data-animation="false" alt="Product image" style="width:200px;height:200px" />
                                <?php } else{ ?>
                                    <img src="../../Image/<?php echo $row['m_image']; ?>" id="preview<?php echo $row['menu_id']; ?>" data-tooltip="true" title="Upload product image" data-animation="false" alt="Product image" style="width:200px;height:200px" />
                        </label>
                        <input type="file" name="image" onchange="loadImage(event,'preview<?php echo $row['menu_id']; ?>')" style="visibility:hidden" id="image<?php echo $row['menu_id']; ?>" value="<?php echo $row['m_image']?>">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                        <input type="text" value="<?php echo $row['m_name']; ?>" name="name" id="pname" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    <input type="hidden" name="testme2" value="<?php echo $row['m_category']; ?>" class="mickale">
                    </div><div id="category_types" class="tab-pane">
                    <label for="pcategory">Product Category</label>
                          <select name="category" class="form-control categories" id="" required>
                             <option value="0"></option>
                              <?php 
                                  $category = viewAllMenuCategory();
                                  foreach ($category as $asd){
                              ?>
                              <option value="<?php echo $asd['mc_id'];?>" <?php if($asd['mc_id'] == $row['mc_id']) echo 'selected'; ?>><?php echo $asd['mc_name'];?></option>
                              <?php } ?> 
                          </select>
                             <span class="highlight"></span><span class="bar"></span>
                </div>
                <div class="tab-content div1">   
                  <label for="ptype">Product Type</label>
                       <select name="type" class="form-control type6" required>
                          <option value="<?php echo $row['m_category']; ?>" <?php if($row['m_category'] == 'selected') echo 'selected'; ?>><?php echo $row['m_category']?></option>
                          <option value="Appetizer">Appetizer</option>
                          <option value="Pork">Pork</option>
                          <option value="Beef">Beef</option>
                          <option value="Fish">Fish</option>
                          <option value="Chicken">Chicken</option>
                          <option value="Juice">Juice</option>
                          <option value="Sizzlers/Grilled">SIZZLERS/GRILLED</option>
                          <option value="Noodles/and/Rice">NOODLES/RICE</option>
                          <option value="Soup/Vegetables">Soup/Vegetables/Salad</option>    
                      </select>   
                </div>    
                <div class="tab-content div2">
                  <label for="ptype">Product Type</label> 
                      <select name="type" class="form-control type7" required>
                        <option value="Beer">Beer</option>
                        <option value="Soft Drinks">Soft Drinks</option>
                        <option value="Tea">Tea</option>
                        <option value="Shake">Shake</option>
                        <option value="Wine">Wine</option>   
                 </select>
                </div>    
                <div class="tab-content div3">
                  <label for="ptype">Product Type</label>
                    <select name="type" class="form-control type8" required>
                        <option value="Ice Cream">Ice Cream</option>
                        <option value="Cake">Cake</option>
                        <option value="Halo-Halo">Halo-Halo</option>
                        <option value="Special">Special</option>
                     </select>   
                </div>
                 <div class="tab-pane">
                        <label>Pieces</label>
                       <input type="number" step="any" name="piece" id="ppiece" value="<?php echo $row['pieces'];?>" class="form-control">
                    </div>
                    <br/>
                     <div class="tab-pane">
                        <label>Volume</label>
                        <select name="vol" id="volume" class="form-control">
                            <option value="<?php echo $row['volume'];?>"><?php echo $row['volume'];?></option>
                            <option value="50mL">50mL</option>
                            <option value="100mL">100mL</option>
                            <option value="200mL">200mL</option>
                            <option value="300mL">300mL</option>
                            <option value="1L">1 Litre</option>
                            <option value="2L">2 Litre</option>
                            <option value="3L">3 Litre</option>
                            <option value="4L">4 Litre</option>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="pprice">Price</label>
                            <input type="number" step="any" value="<?php echo $row['m_price']; ?>" name="price" id="pprice" class="form-control" required>
                            <span class="highlight"></span><span class="bar"></span>
                        </div>
                        <div class="form-group">
                            <label for="psoh">Product Description</label>
                            <textarea type="text" name="desc" id="psoh" class="form-control" required><?php echo $row['m_desc']; ?>
                            </textarea>
                            <span class="highlight"></span><span class="bar"></span>
                        </div>
                </div>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                    <input type="submit" name="updateProduct" class="btn btn-primary hover" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>

                                </div>
                        </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/.main-->

        <script src="../../something/js/global.js"></script>
        <script>
                                $('.type6').on('change', function(){
                                    $('.mickale').val($(this).val());
                                });
                                $('.type7').on('change', function(){
                                    $('.mickale').val($(this).val());
                                });
                                $('.type8').on('change', function(){
                                    $('.mickale').val($(this).val());
                                });
            function getMenu(menuId,mcId){
                // alert(menuId);
                $('#updateProduct'+menuId).modal('show');
                //var n = $('.categories').val();
                //console.log(n);
                    // $('.div1').hide();
                    // $('.div2').hide();
                    // $('.div3').hide();
                if(mcId == 1){
                             
                            $('.div1').show();
                            $('.div2').hide();
                            $('.div3').hide();
                    $('.categories').on('change', function(){
                        var data = $(this).val();
                        if(data == 1){                 
                            $('.div1').show();
                            $('.div2').hide();
                            $('.div3').hide();
                                $('.mickale').val('Appetizer');
                                // $('.type6').on('change', function(){
                                //     //alert($('.mickale').val($(this).val()));
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 2){
                            $('.div1').hide();
                            $('.div2').show();
                            $('.div3').hide();
                                $('.mickale').val('Beer');
                                // $('.type7').on('change', function(){
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 3){                 
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').show();
                                $('.mickale').val('Ice Cream');
                                // $('.type8').on('change', function(){
                                //     console.log('dessert');
                                //     $('.mickale').val($(this).val());
                                // });
                        }else{
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').hide();
                            $('.mickale').val('');
                        }        
                    });                    
                }
                if(mcId == 2){
                            $('.div1').hide();
                            $('.div2').show();
                            $('.div3').hide();
                    $('.categories').on('change', function(){
                        var data = $(this).val();
                        if(data == 1){
                            $('.div1').show();
                            $('.div2').hide();
                            $('.div3').show();
                                $('.mickale').val('Appetizer');
                                // $('.type7').on('change', function(){
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 2){
                            $('.div1').hide();
                            $('.div2').show();
                            $('.div3').hide();
                                $('.mickale').val('Beer');
                                // $('.type7').on('change', function(){
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 3){                 
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').show();
                                $('.mickale').val('Ice Cream');
                                // $('.type8').on('change', function(){
                                //     console.log('dessert');
                                //     $('.mickale').val($(this).val());
                                // });
                        }else{
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').hide();
                            $('.mickale').val('');
                        }    
                    });    
                }            
                if(mcId == 3){
                                     
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').show();
                    $('.categories').on('change', function(){ 
                        var data = $(this).val();
                        if(data == 1){                 
                            $('.div1').show();
                            $('.div2').hide();
                            $('.div3').hide();
                                $('.mickale').val('Appetizer');
                                // $('.type8').on('change', function(){
                                //     console.log('dessert');
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 2){
                            $('.div1').hide();
                            $('.div2').show();
                            $('.div3').hide();
                                $('.mickale').val('Beer');
                                // $('.type7').on('change', function(){
                                //     $('.mickale').val($(this).val());
                                // });
                        }else if(data == 3){                 
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').show();
                                
                                $('.mickale').val('Ice Cream');
                                // $('.type8').on('change', function(){
                                //     console.log('dessert');
                                //     $('.mickale').val($(this).val());
                                // });
                        }else{
                            $('.div1').hide();
                            $('.div2').hide();
                            $('.div3').hide();
                            $('.mickale').val('');
                        }    
                    });
                }
            
                //     //console.log($(this).val());
                //     $('.main').show();
                    
                //     $('.mickale').val('Appetizer');
                //     $('.type6').on('change', function() {
                //         $('.mickale').val($(this).val());
                //         console.log($('.mickale').val($(this).val()));
                //     });

                //     $('.beverage').hide();
                //     $('.dessert').hide();
                // }else if($('#categories').val() == 2 || $('#categories').val() == 'Beverages'){
                //     console.log($(this).val());
                //     $('.mickale').val('Appetizer');
                //     $('.type7').on('change', function() {
                //         $('.mickale').val($(this).val());
                //         console.log($('.mickale').val($(this).val()));
                //     });
                //     $('.main').hide();
                //     $('.beverage').show();
                //     $('.dessert').hide();
                //    // alert($('#categories').val());
                // }else if($('#categories').val() == 3 || $('#categories').val() == 'Desserts'){
                //     console.log('dessert');
                //     $('.mickale').val('Appetizer');
                //     $('.type8').on('change', function() {
                //         $('.mickale').val($(this).val());
                //         console.log($('.mickale').val($(this).val()));
                //     });
                //     $('.main').hide();
                //     $('.beverage').hide();
                //     $('.dessert').show();
                //    // alert($('#categories').val());
                // }
            }
            function deact(eventId) {
                swal({
                    title: "Deactivate Menu",
                    text: "Are you sure you want to deactivate this menu?",
                    buttons: true,
                    dangerMode: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/FoodsController/deactivatefood.php",
                            data: {
                                'deactivate': eventId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully deactivated this menu",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "food.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in deactivating this menu", "", "error");
                    }
                });
            }

            function active(openId) {
                swal({
                    title: "Re-activate menu",
                    text: "Are you sure you want to re-activate this menu?",
                    buttons: true
                }).then(function(value) {
                    if (value) {
                        // alert(eventId);
                        $.ajax({
                            type: "post",
                            url: "../../Controller/FoodsController/deactivatefood.php",
                            data: {
                                'activate': openId
                            },
                            cache: false,
                            success: function(response) {
                                swal({
                                    title: "Succesfully re-activated this menu",
                                    text: "",
                                    icon: "success"
                                }).then(function() {
                                    window.location = "food.php";
                                });
                            }
                        });
                    } else {
                        swal("Error in re-deactivating this menu", "", "error");
                    }
                });
            }
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    type: "GET",
                    url: "../../Controller/RestaurantsController/getnotif.php",
                    dataType: 'json',
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            // console.log(data[i]);
                            var date = moment().format('LL');
                            // console.log(date);
                            var count = data[i].count;
                            var date2 = data[i].dat;
                            if (date2 == date) {
                                //	console.log(count);
                                //	console.log(date2);
                                swal("You have " + count + " new notifcation", {
                                    icon: "info"
                                });
                            }
                        }
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print']
                });
            });
        </script>

        </body>

    </html>