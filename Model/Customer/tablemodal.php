<div class="modal" id="notAvail<?php echo $_GET['cid'];?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <!-- <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button> -->
                                          
                                          <h3 class="modal-title"><?php echo $rows['restaurant_name'];?> doesn't allow online reservation at the moment, please do contact them for more information</h3>
                                      </div>
                                      <div class="modal-footer">
                                          <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                      </div><!-- end modal-footer -->
                                  </div>
                              </div>
                          </div>
                            <div class="modal" id="notAvails<?php echo $_GET['cid'];?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <!-- <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button> -->
                                          
                                          <h3 class="modal-title">This table has already been booked</h3>
                                      </div>
                                      <div class="modal-footer">
                                          <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                      </div><!-- end modal-footer -->
                                  </div>
                              </div>
                          </div> 
                        <!-- Reservation Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="bookNow<?php echo $t['table_id']; ?>">
                              <div class="modal-dialog" role="document" style="z-index: 1041;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button class="close" data-dismiss="modal" type="button">
                                              <span>&times;</span>
                                          </button>
                                      <h1 class="modal-title">Book Now!</h1>
                                          
                                      </div><!-- end modal-header -->
                                      <form action="../../Controller/CustomersController/reservation.php?cid=<?php echo $_GET['cid']; ?>" method="POST">
                                        <div class="modal-body" style="left:20px;">
                                             <div class="form-group">
                                               <label>Reservation Date</label>
                                               <input type="hidden" name="cid" value="<?php echo  $_GET['cid'];?>">
                                               <input type="text" name="table" value="<?php echo $t['table_id'];?>">
                                               <input type="text" id="" name="dat" class="form-control datepicker2" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label>Reservation Time</label>
                                               <input type="text" name="tim" id="" class="form-control timepicker2" required>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label >No. of Guests</label>
                                               <input type="number" value="<?php echo $t['maxcapacity'];?>" name="guest" class="form-control" readonly>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                             <div class="form-group">
                                               <label>Special Requests</label>
                                               <textarea name="special" class="form-control"></textarea>
                                               <span class="highlight"></span><span class="bar"></span>
                                             </div>
                                        </div><!-- end modal-body -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <input type="submit" name="book" class="btn btn-primary hover" value="Book Now!">

                                          </div><!-- end modal-footer -->
                                    </form>
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Resevation modal-->