
          <!-- Event Modals -->
           <!-- Edit Modal -->
           <div class="modal fade" tabindex="-1" role="dialog" id="updateEvent<?php echo $row['event_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Update Event</h3></center>
                    </div>
                    <form method="post">

                    <div class="modal-body">
                       <div class="tab-pane">
                <label for="pname">Event Name</label>
                <input type="text" name="name" id="pname" class="form-control" value="<?php echo $row['event_name']; ?>" required>
                <span class="highlight"></span><span class="bar"></span>
            </div><br />
             <div class="tab-pane">
                <label for="venue">Event Venue</label>
                <input type="text" name="venue" id="venue" class="form-control" value="<?php echo $row['event_venue']; ?>" required>
                <span class="highlight"></span><span class="bar"></span>
            </div><br />
            <div class="tab-pane">
              <label>Event Date</label>
              <input type="text" name="date" id="datepicker2" value="<?php echo $row['event_date']?>" class="form-control" required>
              <span class="highlight"></span><span class="bar"></span>
          </div><br />
          <div class="tab-pane">
              <label>Event Time</label>
              <input type="text" name="time" id="timepicker2" value="<?php echo $row['event_time']?>" class="form-control" required>
              <span class="highlight"></span><span class="bar"></span>
          </div><br />
            <div class="tab-pane">
                <label for="pdesc">Event Desc</label>
                <textarea name="desc" id="pdesc" class="form-control" required><?php echo $row['event_desc']; ?></textarea>
                <span class="highlight"></span><span class="bar"></span>
            </div><br /> 
                      </div>
                    <div class="modal-footer">
                        
                        <input type="submit" name="updateEvent" class="btn btn-info hover" value="Update">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">Cancel</button>
                        <input type="hidden" name="id" value="<?php echo $row['event_id'];?>">
                        
                    </div>
                    </form>
                </div>
            </div>
          </div><!-- end of Edit modal -->
            
          
            <!-- Open Modal -->
          <div class="modal fade" tabindex="-1" role="dialog" id="open<?php echo $row['event_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Do you want to Open</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to change the status of this event?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/EventsController/deactivateevent.php">
                        <input type="submit" name="open" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['event_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Open modal -->  
            <!-- Close Modal -->
          <div class="modal fade" tabindex="-1" role="dialog" id="close<?php echo $row['event_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Do you want to Close this event?</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to change the status of this event?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/EventsController/deactivateevent.php">
                        <input type="submit" name="close" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['event_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Close modal -->          

          <!-- end Event Modal -->
