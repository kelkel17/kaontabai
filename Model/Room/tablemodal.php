<!-- ADD MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="addTable">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Add Table Layout</h3></center>
            </div>
            <form method="post" action="../../Controller/RestaurantsController/addtable.php" class="form-horizontal" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group text-center">
                        <label for="image" class="hover">
                            <!-- <img src="../../Image/blank.jpg" "> -->
                            <img src="../../Image/blank.jpg" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px" />
                        </label>
                        <input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:hidden" id="image">
                    </div>
                    <div class="tab-pane">
                        <label for="tnum">Table Number</label>
                        <input type="number" name="tnum" id="tnum" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="desc">Area Description</label>
                        <textarea type="text" name="desc" id="desc" class="form-control"></textarea>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="min">Min Capacity</label>
                        <input type="number" step="any" name="min" id="desc" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>

                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="max">Max Capacity</label>
                        <input type="number" step="any" name="max" id="max" class="form-control" required>
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
</div>
<!-- END ADD MODAL -->