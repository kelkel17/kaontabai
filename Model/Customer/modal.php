                          <div class="modal fade" tabindex="-1" role="dialog" id="editReservation<?php echo $row['reservation_id'];?>">
                              <div class="modal-dialog" role="document" style="z-index:1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Edit Reservation</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/reservation.php" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label for="pdate">Reservation Date</label>
                                               <input type="text" id="datepicker" name="dat" class="form-control" value="<?php echo $row['reservation_date']?>" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pdate">Reservation Time</label>
                                               <input type="hidden" name="rid" value="<?php echo $row['reservation_id'];?>">
                                               
                                               <input type="text" value="<?php echo $row['reservation_time'];?>" name="tim" id="timepicker" class="form-control" required>
                                               <span class="highlight" value="reservation_time"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pno">No. of Guests</label>
                                               <input type="number" name="guest" id="pno" class="form-control" value="<?php echo $row['no_of_guests'];?>" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="preq">Special Requests</label>
                                               <textarea name="special" id="preq" class="form-control"><?php echo $row['spec_reqs'];?></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="edit" class="btn btn-primary hover" value="Send">
                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Edit Reservation modal-->


                                    <div class="modal fade" tabindex="-1" role="dialog" id="viewOrder<?php echo $rows['order_id']; ?>">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                <button class="close" data-dismiss="modal" type="button">
                                                      <span>&times;</span>
                                                  </button>
                                              <center><h3 class="modal-title"><?php echo $row['customer_fname'];?>'s Receipt</h3></center>
                                              </div>
                                              <div class="modal-body" style="padding-left: 30px;"><strong>
                                                  <div class="row">    
                                                      Order ID: <?php echo $rows['num'];?> 
                                                   </div>
                                                  <div class="row">   
                                                    Reservation ID: <?php echo $rows['reservation_id'];?> 
                                                  </div>
                                                  <div class="row">
                                                    Payment ID: <?php echo $rows['payment_id'];?>
                                                  </div>
                                                  <div class="row">
                                                    Order Date & Time: <?php echo date('F d, Y g:i A', strtotime($rows['tim']));?>
                                                  </div>
                                                  <div class="row">
                                                    Total Payment: &#8369;<?php echo number_format($rows['pr'],2);?>
                                                  </div>
                                                  <div class="row">
                                                    </div>
                                                  <div class="row">
                                                    Payment Status: <?php if($rows['order_status']==1){ echo "Paid"; } else{ echo "Not Paid"; }?>
                                                  </div>
                                                  <div class="row">
                                                    Order Status: <?php echo $rows['stat'];?>
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

                                            if($rows['order_id'] == $r['order_id']){
                                                ?>
                                                    <?php echo $r['m_name'].' '.$r['order_qty'];?> pcs<br/>
                                               <?php } } }?>    
                                             
                                          </strong></div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary hover" data-dismiss="modal">Close</button>
                                                  
                                              </div>
                                            </div>
                                      </div>
                                    </div><!-- end of receipt modal -->

                                     <!-- Message Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="cancelReservation<?php echo $row['reservation_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index:1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Cancellation Request!</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/message.php" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label for="pfrom">From:</label>
                                               <?php
                                                    $customer = getCustomer(array($_SESSION['id']));

                                                    if(count($customer)>0){
                                                      foreach ($customer as $s) {
                                                      ?>
                                                      <input type="text" name="customer" value="<?php echo $s['customer_fname'].' '.$s['customer_lname'];?>" id="pfrom" class="form-control" readonly>
                                                      <?php
                                                      }
                                                    }
                                              ?>
                                               <input type="hidden" name="cid" value="<?php echo $row['restaurant_id'];?>">
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pto">To:</label>
                                               <input type="text" name="restaurant" value="<?php echo $row['restaurant_name'].' Restaurant';?>"  id="pto" class="form-control" readonly>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pmessage">Your Message</label>
                                               <textarea name="message" id="pmessage" class="form-control">I would like to cancel my reservation. The reservation number is <?php echo $row['reservation_number'];?></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="send" class="btn btn-primary hover" value="Send">
                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Message modal-->