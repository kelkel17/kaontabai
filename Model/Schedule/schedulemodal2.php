  <!-- Schedule Modal -->
          <!-- Off-Peak Modal -->    
          <div class="modal fade" tabindex="-1" role="dialog" id="off<?php echo $row['sched_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Do you want to change the schedule status to off-peak?</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to change the status of this schedule?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/SchedulesController/deactivateschedule.php">
                        <input type="submit" name="off" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['sched_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Off-Peak modal --> 
          <!-- Peak Modal -->    
          <div class="modal fade" tabindex="-1" role="dialog" id="peak<?php echo $row['sched_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Do you want to change the schedule status to Peak Hour?</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to change the status of this schedule?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/SchedulesController/deactivateschedule.php">
                        <input type="submit" name="peak" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['sched_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Peak modal -->                  

                 <!-- Add Schedule Modal -->
   
       <div class="modal fade" tabindex="-1" role="dialog" id="update<?php echo $row['sched_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Update Schedule</h3></center>
                    </div>
                   <form action="../../Controller/SchedulesController/deactivateschedule.php" method="post"> 
                   <div class="modal-body"> 
                    
                   <div class="tab-pane">
                   <label for="pdate">Schedule Date & Time</label><br/>
                   <input type="hidden" name="id" value="<?php echo $row['sched_id']?>">
                   <input type="text" name="sdate" id="datepicker3" value="<?php echo $row['sched_sdate']; ?>" style="width:50%; float:left;" class="form-control" required>
                 <input type="text" name="stime" id="timepicker3" value="<?php echo $row['sched_stime']; ?>" style="width:50%; float:left;" class="form-control" required>
                   <!-- <label for="pdate">Schedule Date</label> -->           
                   <span class="highlight"></span><span class="bar"></span>
               </div><br /><br/><br/>    
               <div class="tab-pane">
                   <label for="ptime">Schedule End Date & Time</label><br/>
                   <input type="text" name="edate" id="datepicker4" value="<?php echo $row['sched_edate']; ?>" style="width:50%; float:left;" class="form-control" required>
                   <input type="text" name="etime" id="timepicker4" value="<?php echo $row['sched_etime']; ?>" style="width:50%; float:left;" class="form-control" required>
                   <span class="highlight"></span><span class="bar"></span>
               </div><br />
          <div class="modal-footer">
             <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
             <button type="submit" name="update" class="btn btn-primary hover">Save</button>
          </div>
         </div>
         </form>  
                </div>
            </div>
          </div><!-- end of Add Schedule modal -->
          <!-- End Schedule Modal -->