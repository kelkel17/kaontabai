<!-- ADD STAFF modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addStaff">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Add Staff</h3></center>
            </div>
            <form method="post" action="../../Controller/EmployeesController/addstaff.php" class="form-horizontal" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="tab-pane">
                        <label for="fname">Staff First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="mname">Staff Middle Name</label>
                        <input type="text" name="mname" id="mname" class="form-control">
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="lname">Staff Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="paddress">Staff Address</label>
                        <input type="text" name="address" id="paddress" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="pphone">Staff Phone Number</label>
                        <input type="number" name="phone" id="pphone" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label>Staff Gender</label>
                        <br />
                        <input type="radio" value="Male" name="gender" class="" required>Male
                        <input type="radio" name="gender" value="Female" class="" required>Female
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="pssn">Staff SSN</label>
                        <input type="number" name="ssn" id="pssn" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="puser">Staff Username</label>
                        <input type="text" name="username" id="puser" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="ppass">Staff Password</label>
                        <input type="password" name="password" id="ppass" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                    <button type="submit" name="Add" class="btn btn-primary hover">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end of add staff modal -->