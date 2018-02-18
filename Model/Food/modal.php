
<!-- add combo meal modal-->
<!-- ADD PRODUCT modal -->
              <div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button class="close" data-dismiss="modal" type="button">
                                    <span>&times;</span>
                                </button>
                              <center><h3 class="modal-title">Create a Combo Meal</h3></center>
                            </div>
                          <form method="post" action="../../Controller/RestaurantsController/combo.php" class="form-horizontal" enctype="multipart/form-data">
                          
                          <div class="modal-body">
                                          <div class="form-group text-center">
                                      <label for="image" class="hover">
                                      <!-- <img src="../../Image/blank.jpg" "> -->
                                      <img src="../../Image/blank.jpg" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px"/>
                                      </label>
                                      <input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:hidden" id="image" required>
                                  </div>
                                      <div class="tab-pane">
                                        <label for="pname">Combo Meal Name</label>

                                          <input type="text" name="name" id="pname" class="form-control" required>
                                          <span class="highlight"></span><span class="bar"></span>
                                      </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="pname">Menu List</label><br/>
                                          <?php 
                                            $con = con();
                                            $sql = "SELECT * FROM menus WHERE restaurant_id = '$id'";
                                            $stmt = $con->prepare($sql);
                                            $stmt->execute();
                                            $menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            if (count($menu) > 0) { 
                                            foreach ($menu as $row) {
                                            ?>
                                            <input type="checkbox" name="menu[]" value="<?php echo $row['menu_id'];?>"><?php echo $row['m_name']?>
                                            <?php }
                                              }
                                            ?>
                                  </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="pprice">Combo Meal Price</label>
                                          <input type="number" step="any" name="price" id="pprice" class="form-control" required>
                                          <span class="highlight"></span><span class="bar"></span>
                                          
                                      </div>
                                      <br />
                                      <div class="tab-pane">
                                        <label for="psoh">Combo Meal Description</label>
                                          <textarea type="text" name="desc" id="psoh" class="form-control"></textarea>
                                          <span class="highlight"></span><span class="bar"></span>
                                      </div>
                        </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                              <button type="submit" name="Add" class="btn btn-primary hover">Save</button>
                          </div>
                        </form>
                      </div>
                  </div>
            
          </div><!-- end of add product modal -->
<!-- end of add combo meal modal-->
       