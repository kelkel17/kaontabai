

          <!-- Order Modal -->
          <div class="modal fade" tabindex="-1" role="dialog" id="cancelReservation<?php echo $row['order_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Notify <?php echo $row['customer_fname'].' '.$row['customer_lname']?></h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that <?php if($row['customer_gender']=="Male"){ echo 'his'; } elseif($row['customer_gender']=="Female"){ echo 'her'; }?> order is now being cook and will be serve soon?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/cooking.php">
                        <input type="submit" name="cooking" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['order_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of accept modal --> 
          <div class="modal fade" tabindex="-1" role="dialog" id="acceptOrder<?php echo $row['order_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Notify <?php echo $row['customer_fname'].' '.$row['customer_lname']?></h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that <?php if($row['customer_gender']=="Male"){ echo 'his'; } elseif($row['customer_gender']=="Female"){ echo 'her'; }?> order is ready to be serve?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/cooking.php">
                        <input type="submit" name="serve" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['order_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of cancel modal -->  
          <div class="modal fade" tabindex="-1" role="dialog" id="serveOrder<?php echo $row['order_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Notify <?php echo $row['customer_fname'].' '.$row['customer_lname']?></h3></center>
                    </div> -->
                    <div class="modal-body">
                        <h5 class="text-center">Is <?php echo $row['customer_fname'].' '.$row['customer_lname'];?>'s order has been served?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/cooking.php">
                        <input type="submit" name="served" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['order_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of cancel modal --> 

          <div class="modal fade" tabindex="-1" role="dialog" id="cancelptOrder<?php echo $row['order_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Notify <?php echo $row['customer_fname'].' '.$row['customer_lname']?></h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to notify <?php echo $row['customer_fname'].' '.$row['customer_lname'];?> that <?php if($row['customer_gender']=="Male"){ echo 'his'; } elseif($row['customer_gender']=="Female"){ echo 'her'; }?> order will be cancelled?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/RestaurantsController/cooking.php">
                        <input type="submit" name="cancel" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['order_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of cancel modal --> 
          <div class="modal fade" tabindex="-1" role="dialog" id="viewOrder<?php echo $row['order_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title"><?php echo $row['customer_fname']?>'s Receipt</h3></center>
                    </div>
                    <div class="modal-body" style="padding-left: 30px;"><strong>
                        <div class="row">    
                            Order ID: <?php echo $row['order_number'];?> 
                         </div>
                        <div class="row">   
                          Reservation ID: <?php echo $row['reservation_number'];?> 
                        </div>
                        <div class="row">
                          Payment ID: <?php echo $row['payment_id'];?>
                        </div>
                        <div class="row">
                          Order Date & Time: <?php echo date('F d, Y g:i A', strtotime($row['order_time']));?>
                        </div>
                        <div class="row">
                          Total Payment: &#8369;<?php echo number_format($row['total_price'],2);?>
                        </div>
                        <div class="row">
                          </div>
                        <div class="row">
                          Payment Status: <?php if($row['order_status']==1){ echo "Paid"; } else{ echo "Not Paid"; }?>
                        </div>
                        <div class="row">
                          Order Status: <?php echo $row['status'];?>
                        </div>
                        <div class="row">
                          List of Product Order:
                        </div>  
                      <?php 
                        $con = con();
                        $sql = "SELECT * FROM  order_details as od, menus as m WHERE od.menu_id = m.menu_id";
                        $stmt = $con->prepare($sql);
                  $stmt->execute();
                  $view = $stmt->fetchAll(PDO::FETCH_ASSOC);
                   
                   if(count($view)>0){
                    foreach($view as $r){

                  if($row['order_id'] == $r['order_id']){
                      ?>
                          <?php echo $r['m_name'].' '.$r['order_qty'];?> pcs<br/>
                     <?php } } }?>    
                    </strong></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary hover" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
          </div><!-- end of cancel modal -->   
          <!-- End Order Modal -->

        
<!-- Combo meal Modal -->
<!-- Edit Product Modal -->
           <div class="modal fade" tabindex="-1" role="dialog" id="updateProduct<?php echo $row['cm_id']; ?>">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Edit Product</h3></center>
                    </div>
                     <form method="post" action="../../Controller/RestaurantsController/combo.php" class="form-horizontal" enctype="multipart/form-data">
                          
                          <div class="modal-body">
                                          <div class="form-group text-center">
                                      <label for="image" class="hover">
                                      <!-- <img src="../../Image/blank.jpg" "> -->
                                      <img src="../../Image/<?php echo $row['image']?>" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px"/>
                                      </label>
                                      <input type="file" name="image" onchange="loadImage(event,'preview')" id="image" value="../../Image/<?php echo $row['image']?>">
                                  </div>
                                      <div class="tab-pane">

                                        <input type="hidden" name="cmid" value="<?php echo $row['cm_number']; ?>">
                                        <input type="hidden" name="cim" value="<?php echo $row['cm_id']; ?>">
                                        
                                        <label for="pname">Combo Meal Name</label>
                                          <input type="text" name="name" id="pname" class="form-control" value="<?php echo $row['cm_name'];?>" required>
                                          <span class="highlight"></span><span class="bar"></span>
                                      </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="pname">Menu List</label><br/>
                                          <?php 
                                            //echo $row['cm_id'];
                                            $menu = getCombo(array($_SESSION['id']));
                                            if (count($menu) > 0) { 
                                            foreach ($menu as $rows) {
                                            ?>
                                            <input type="checkbox" name="menu[]" value="<?php echo $rows['menu_id'];?>" <?php if($row['cm_number'] == $rows['cm_number']){ echo 'checked';}?>><?php echo $rows['m_name']?><br/>
                          
                                            <?php }
                                              }
                                            ?>
                                  </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="pprice">Combo Meal Price</label>
                                          <input type="number" step="any" name="price" id="pprice" class="form-control" value="<?php echo $row['price'];?>" required>
                                          <span class="highlight"></span><span class="bar"></span>
                                          
                                      </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="psoh">Combo Meal Description</label>
                                          <textarea type="text" name="desc" id="psoh" class="form-control"><?php echo $row['cm_desc'];?></textarea>
                                          <span class="highlight"></span><span class="bar"></span>
                                      </div>
                        </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                              <button type="submit" name="update" class="btn btn-primary hover">Save</button>
                          </div>
                        </form>
                </div>
            </div>
          </div> <!--End of Edit Product Modal -->    

          <div class="modal fade" tabindex="-1" role="dialog" id="deactProduct<?php echo $row['cm_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Deactivate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to deactivate this product?</h5>
                        <p class="m-t-30">
                            If you deactivate this product, it will not be shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/deactivatefood.php">
                        <input type="submit" name="deactivate" class="btn btn-info hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['cm_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of deactivate modal -->  

          <div class="modal fade" tabindex="-1" role="dialog" id="actProduct<?php echo $row['cm_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Re-Activate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to re-activate this product?</h5>
                        <p class="m-t-30">
                            If you re-activate this product, it will be again shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/deactivatefood.php">
                        <input type="submit" name="activate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['cm_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Activate modal -->      
<!-- end of combo meal modal -->