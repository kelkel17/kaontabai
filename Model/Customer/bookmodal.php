                         <div class="modal" id="notAvail<?php echo $row['restaurant_id'];?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <!-- <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button> -->
                                          
                                          <h3 class="modal-title"><?php echo $row['restaurant_name'];?> doesn't allow online reservation at the moment, please do contact them for more information</h3>
                                      </div>
                                      <div class="modal-footer">
                                          <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                      </div><!-- end modal-footer -->
                                  </div>
                              </div>
                          </div>
                         
                             <!-- Message Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="messageUs<?php echo $row['restaurant_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index:1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Your Message!</h1>
                                          
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
                                               <textarea name="message" id="pmessage" class="form-control"></textarea>
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
                           <!-- Reservation Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="bookNow<?php echo $row['restaurant_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index: 1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Book Now!</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/reservation.php?cid=<?php echo $row['restaurant_id']; ?>" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label for="pdate">Reservation Date</label>
                                               <input type="hidden" name="cid" value="<?php echo $row['restaurant_id'];?>">
                                               <input type="text" id="datepicker" name="dat" class="form-control" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pdate">Reservation Time</label>
                                               <input type="text" name="tim" id="timepicker" class="form-control" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="pno">No. of Guests</label>
                                               <input type="number"   name="guest" id="pno" class="form-control" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label for="preq">Special Requests</label>
                                               <textarea name="special" id="preq" class="form-control"></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="submit" class="btn btn-primary hover" value="Book Now!">

                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Resevation modal-->