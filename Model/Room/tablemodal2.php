<!-- update MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateTable<?php echo $row['table_id']?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Update Product</h3></center>
            </div>
            <form method="post" action="../../Controller/RestaurantsController/addtable.php" class="form-horizontal" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group text-center">
                        <label for="image<?php echo $row['table_id']; ?>" class="hover">
                            <!-- <img src="../../Image/blank.jpg" "> -->

                            <img src="../../Image/<?php echo $row['image']; ?>" id="preview<?php echo $row['table_id']; ?>" data-tooltip="true" title="Upload table image" data-animation="false" alt="table image" style="width:200px;height:200px" />

                        </label>
                        <input type="file" name="image" onchange="loadImage(event,'preview<?php echo $row['table_id']; ?>')" style="visibility:hidden" id="image<?php echo $row['table_id']; ?>">
                    </div>
                    <div class="tab-pane">
                        <label for="tnum">Table Number</label>
                        <input type="hidden" name="id" value="<?php echo $row['table_id'];?>">
                        <input type="number" name="tnum" value="<?php echo $row['table_num'];?>" id="tnum" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="desc">Area Description</label>
                        <textarea type="text" name="desc" id="desc" class="form-control">
                            <?php echo $row['area_desc'];?>
                        </textarea>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>

                    <br />
                    <div class="tab-pane">
                        <label for="min">Min Capacity</label>
                        <input type="number" step="any" name="min" value="<?php echo $row['mincapacity'];?>" id="desc" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>

                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="max">Max Capacity</label>
                        <input type="number" step="any" name="max" value="<?php echo $row['maxcapacity'];?>" id="max" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                    <button type="submit" name="update" class="btn btn-primary hover">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deactProduct<?php echo $row['table_id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Reserve this table</h3></center>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to reserve this table?</h5>
            </div>
            <div class="modal-footer">
                <form method="post" action="../../Controller/RestaurantsController/addtable.php">
                    <input type="submit" name="deactivate" class="btn btn-danger hover" value="Yes">
                    <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                    <input type="hidden" name="id" value="<?php echo $row['table_id'];?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of deactivate Product modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="actProduct<?php echo $row['table_id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Change status to available</h3></center>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to change the status of this table to available?</h5>

            </div>
            <div class="modal-footer">
                <form method="post" action="../../Controller/RestaurantsController/addtable.php">
                    <input type="submit" name="activate" class="btn btn-danger hover" value="Yes">
                    <button type="button" class="btn btn-secondary hover" data-dismiss="modal">No</button>
                    <input type="hidden" name="id" value="<?php echo $row['table_id'];?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of Activate Product modal -->