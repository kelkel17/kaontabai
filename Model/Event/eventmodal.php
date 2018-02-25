<!-- Add Event Modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="addEvent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Add Event</h3></center>
            </div>
            <form action="../../Controller/EventsController/addevent.php" method="post">
                <div class="modal-body">
                    <div class="tab-pane">
                        <label for="pname">Event Name</label>
                        <input type="text" name="name" id="pname" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="venue">Event Venue</label>
                        <input type="text" name="venue" id="venue" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label>Event Date</label>
                        <input type="text" name="date" id="datepicker" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label>Event Time</label>
                        <input type="text" name="time" id="timepicker" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="pdesc">Event Desc</label>
                        <textarea name="desc" id="pdesc" class="form-control" required></textarea>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                        <button type="submit" name="addvenue" class="btn btn-primary hover">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end of Add Event modal -->