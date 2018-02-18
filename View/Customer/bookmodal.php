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
                                      <h1 class="modal-title">Sign up now to message <?php echo $row['restaurant_name']; ?>'s Restaurant</h1>
                                          
                                      </div><!-- end modal-header -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <a href="../../index.php" class="btn btn-primary">Sign up</a>
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
                                      <h1 class="modal-title">Sign up now to Book a reservation in <?php echo $row['restaurant_name']; ?>'s Restaurant</h1>
                                          
                                      </div><!-- end modal-header -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <a href="../../index.php" class="btn btn-primary">Sign up</a>
                                          </div><!-- end modal-footer -->
                                  </div><!-- end modal-content --> 
                              </div><!-- end modal-dialog -->
                           </div><!-- end Resevation modal-->