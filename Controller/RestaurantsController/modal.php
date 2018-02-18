<div class="modal fade" tabindex="-1" role="dialog" id="reply<?php echo $row['customer_id']; ?>">
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
                                                    $customer = getOwner(array($_SESSION['id']));

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