   <!-- Add Schedule Modal -->
   
       <div class="modal fade" tabindex="-1" role="dialog" id="addSchedule">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Add Schedule</h3></center>
                    </div>
                   <form action="../../Controller/SchedulesController/addschedule.php" method="post"> 
                   <div class="modal-body"> 
                    
          <div class="tab-pane">
              <label for="pdate">Schedule Date & Time</label><br/>
              <input type="text" name="sdate" id="datepicker" style="width:50%; float:left;" class="form-control" required>
            <input type="text" name="stime" id="timepicker" style="width:50%; float:left;" class="form-control" required>
              <!-- <label for="pdate">Schedule Date</label> -->           
              <span class="highlight"></span><span class="bar"></span>
          </div><br /><br/><br/>    
          <div class="tab-pane">
              <label for="ptime">Schedule End Date & Time</label><br/>
              <input type="text" name="edate" id="datepicker2" style="width:50%; float:left;" class="form-control" required>
              <input type="text" name="etime" id="timepicker2" style="width:50%; float:left;" class="form-control" required>
              <span class="highlight"></span><span class="bar"></span>
          </div><br />
          <div class="modal-footer">
             <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
             <button type="submit" name="Add" class="btn btn-primary hover">Save</button>
          </div>
         </div>
         </form>  
                </div>
            </div>
          </div><!-- end of Add Schedule modal -->