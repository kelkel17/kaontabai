       <!-- Edit Product Modal -->
           <div class="modal fade" tabindex="-1" role="dialog" id="updateProduct<?php echo $row['menu_id']; ?>">
              <div class="modal-dialog" role="document">
                 <form method="post" class="form-horizontal" enctype="multipart/form-data">
                  <div class="modal-content">
                     <div class="modal-header">
                          <button class="close" data-dismiss="modal" type="button">
                             <span>&times;</span>
                          </button>
                          <center><h3 class="modal-title">Edit Product</h3></center>
                      </div>
                      <div class="modal-body">
                            <div class="form-group text-center">
                              <label for="image<?php echo $row['menu_id']; ?>" class="hover">
                                <?php
                                   $filename = '../../Image/'.$row['m_image'];

                                  if($row['m_image']=='' || !(file_exists($filename))){?>
                                <img src="../../Image/blank.jpg" id="preview<?php echo $row['menu_id']; ?>" data-tooltip="true" title="Product image" data-animation="false" alt="Product image" style="width:200px;height:200px"/>
                                <?php } else{ ?>
                                <img src="../../Image/<?php echo $row['m_image']; ?>" id="preview<?php echo $row['menu_id']; ?>" data-tooltip="true" title="Upload product image" data-animation="false" alt="Product image" style="width:200px;height:200px"/>
                              </label>
                              <input type="file" name="image" onchange="loadImage(event,'preview<?php echo $row['menu_id']; ?>')" style="visibility:hidden" id="image<?php echo $row['menu_id']; ?>" value="<?php echo $row['m_image']?>">
                              <?php } ?>
                            </div>
                            <div class="form-group">
                              <label for="pname">Product Name</label>
                              <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                              <input type="text" value="<?php echo $row['m_name']; ?>" name="name" id="pname" class="form-control" required>
                              <span class="highlight"></span><span class="bar"></span>
                             </div>
                              <?php include('tabs.php');?>
                              <div class="form-group">
                                <label for="pprice">Price</label>
                                  <input type="number" step="any" value="<?php echo $row['m_price']; ?>"  name="price" id="pprice" class="form-control" required>
                                  <span class="highlight"></span><span class="bar"></span>
                              </div>
                              <div class="form-group">
                                <label for="psoh">Product Description</label>
                                  <textarea type="text" name="desc" id="psoh" class="form-control" required><?php echo $row['m_desc']; ?></textarea>
                                  <span class="highlight"></span><span class="bar"></span>
                              </div>
                        </div>
                    
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                              <input type="submit" name="updateProduct" class="btn btn-primary hover" value="Update">
                          </div>
                      </div> 
                    </form>
                </div>
            </div><!--End of Edit Product Modal -->   

          <div class="modal fade" tabindex="-1" role="dialog" id="deactProduct<?php echo $row['menu_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Deactivate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to deactivate this product?</h5>
                        <p class="m-t-30">
                            If you deactivate this product, it will not be shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/addfood.php">
                        <input type="submit" name="deactivate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of deactivate modal -->  

          <div class="modal fade" tabindex="-1" role="dialog" id="actProduct<?php echo $row['menu_id']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button class="close" data-dismiss="modal" type="button">
                            <span>&times;</span>
                        </button>
                    <center><h3 class="modal-title">Re-Activate Product</h3></center>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Are you sure you want to re-activate this product?</h5>
                        <p class="m-t-30">
                            If you re-activate this product, it will be again shown in your restaurant's menu.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="../../Controller/FoodsController/addfood.php">
                        <input type="submit" name="activate" class="btn btn-danger hover" value="Yes">
                        <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                        <input type="hidden" name="id" value="<?php echo $row['menu_id'];?>">
                        </form>
                    </div>
                </div>
            </div>
          </div><!-- end of Activate modal -->      