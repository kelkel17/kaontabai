            			<!-- Edit STAFF modal -->
					    <div class="modal fade" tabindex="-1" role="dialog" id="updateStaff<?php echo $row['employee_id']?>">
					        <div class="modal-dialog" role="document">
					            <div class="modal-content">
					                <div class="modal-header">
				                    	<button class="close" data-dismiss="modal" type="button">
				                            <span>&times;</span>
				                        </button>
				                    	<center><h3 class="modal-title">Update Staff</h3></center>
                   					</div>
					                <form method="post" class="form-horizontal" enctype="multipart/form-data">
					                
					                <div class="modal-body">
 				                            	<div class="tab-pane">
					                            	<label for="fname">Staff First Name</label>
					                            	<input type="hidden" name="id" value="<?php echo $row['employee_id'];?>">
					                                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['employee_fname']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label for="mname">Staff Middle Name</label>
					                                <input type="text" name="mname" id="mname" class="form-control" value="<?php echo $row['employee_mname']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label for="lname">Staff Last Name</label>
					                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['employee_lname']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label for="paddress">Staff Address</label>
					                                <input type="text" name="address" id="paddress" class="form-control" value="<?php echo $row['employee_addr']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label for="pphone">Staff Phone Number</label>
					                                <input type="number" name="phone" id="pphone" class="form-control" value="<?php echo $row['employee_phone']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label>Staff Gender</label><br />
					                                <input type="radio" value="Male" name="gender" value="Male" <?php if($row['employee_gender'] == "Male"){ echo "checked";}?> required>Male
					                                <input type="radio" name="gender" value="Female" <?php if($row['employee_gender'] == "Female"){ echo "checked";}?> required>Female
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					                            <div class="tab-pane">
					                            	<label for="pssn">Staff SSN</label>
					                                <input type="number" name="ssn" id="pssn" class="form-control" value="<?php echo $row['employee_ssn']; ?>" required>
					                                <span class="highlight"></span><span class="bar"></span>
					                            </div><br />
					            	</div>
					                <div class="modal-footer">
					                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
					                    <button type="submit" name="updateStaff" class="btn btn-primary hover">Save</button>
					                </div>
					            	</form>
					            </div>
					        </div>
					  
					</div><!-- end of add staff modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="deactStaff<?php echo $row['employee_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Deactivate Staff</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to deactivate this staff?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/EmployeesController/deactivatestaff.php">
                        <input type="submit" name="deactivate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['employee_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
        	</div><!-- end of deactivate modal -->  

	        <div class="modal fade" tabindex="-1" role="dialog" id="actStaff<?php echo $row['employee_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Re-Activate Staff</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to re-activate this staff?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/EmployeesController/deactivatestaff.php">
                        <input type="submit" name="activate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['employee_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
        	</div><!-- end of Activate modal -->      
          
