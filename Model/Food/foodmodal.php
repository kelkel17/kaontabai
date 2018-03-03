<!-- ADD PRODUCT modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>&times;</span>
                </button>
                <center>
                    <h3 class="modal-title">Add Product</h3></center>
            </div>
            <form method="post" action="../../Controller/FoodsController/addfood.php" class="form-horizontal" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group text-center">
                        <label for="image" class="hover">
                            <!-- <img src="../../Image/blank.jpg" "> -->
                            <img src="../../Image/blank.jpg" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px" />
                        </label>
                        <input type="file" name="image" onchange="loadImage(event,'preview')" style="visibility:hidden" id="image">
                    </div>
                    <div class="tab-pane">
                        <label for="pname">Product Name</label>
                        <input type="text" name="name" id="pname" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <br />
                    <div id="category_types" class="tab-pane">
                        <input type="hidden" name="testme" value="" id="content">
                        <label for="pcategory">Product Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="0"></option>
                            <?php 
                                                    $category = viewAllMenuCategory();
                                                    foreach ($category as $rows){  
                                                ?>
                                <option value="<?php echo $rows['mc_id']?>">
                                    <?php echo $rows['mc_name']?>
                                </option>
                                <?php } ?>
                        </select>
                        <span class="highlight"></span><span class="bar"></span>
                    </div>
                    <div id="1" class="tab-content">
                        <label for="ptype">Product Type</label>
                        <select name="type[]" id="type" class="form-control" required>
                            <!-- <option value="<?php echo $row['m_category']?>" <?php if($row['m_category']==$row['m_category']){ echo 'selected'; }?>><?php echo $row['m_category']?></option> -->
                            <option value="Appetizer">Appetizer</option>
                            <option value="Pork">Pork</option>
                            <option value="Beef">Beef</option>
                            <option value="Fish">Fish</option>
                            <option value="Chicken">Chicken</option>
                            <option value="Sizzlers/Grilled">SIZZLERS/GRILLED</option>
                            <option value="Noodles/and/Rice">NOODLES/RICE</option>
                            <option value="Soup/Vegetables">Soup/Vegetables/Salad</option>
                        </select>
                    </div>
                    <div class="tab-content" id="2">
                        <label for="ptype">Product Type</label>
                        <select name="type[]" id="type2" class="form-control" required>
                            <option value="Beer">Beer</option>
                            <option value="Soft Drinks">Soft Drinks</option>
                            <option value="Tea">Tea</option>
                            <option value="Shake">Shake</option>
                            <option value="Wine">Wine</option>
                            <option value="Juice">Juice</option>
                        </select>
                    </div>
                    <div class="tab-content" id="3">
                        <label for="ptype">Product Type</label>
                        <select name="type[]" id="type3" class="form-control" required>
                            <option value="Ice Cream">Ice Cream</option>
                            <option value="Cake">Cake</option>
                            <option value="Halo-Halo">Halo-Halo</option>
                            <option value="Special">Special</option>
                        </select>
                    </div>
                    <br>
                    <div class="tab-pane">
                        <label>Pieces</label>
                       <input type="number" step="any" name="piece" id="ppiece" class="form-control">
                    </div>
                    <br/>
                     <div class="tab-pane">
                        <label>Volume</label>
                        <select name="vol" id="volume" class="form-control">
                            <option value="" selected=""></option>
                            <option value="50mL">50mL</option>
                            <option value="100mL">100mL</option>
                            <option value="200mL">200mL</option>
                            <option value="300mL">300mL</option>
                            <option value="1L">1 Litre</option>
                            <option value="2L">2 Litre</option>
                            <option value="3L">3 Litre</option>
                            <option value="4L">4 Litre</option>
                        </select>
                    </div>
                    <br/>
                    <div class="tab-pane">
                        <label for="pprice">Price</label>
                        <input type="number" step="any" name="price" id="pprice" class="form-control" required>
                        <span class="highlight"></span><span class="bar"></span>

                    </div>
                    <br />
                    <div class="tab-pane">
                        <label for="psoh">Product Description</label>
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

</div>
<script>
	$('#1').hide();
	$('#2').hide();
	$('#3').hide();
	$('#category').on('change', function() {
        var data = $(this).val();
        console.log(data);
		if(data == 1) {
            
			$('#1').show();
			$('#content').val('Appetizer');
			$('#type').on('change', function() {
				$('#content').val($(this).val());
			});
			$('#2').hide();
			$('#3').hide();
		//	$('#type').attr("required".true);
		} else if(data == 2) {
			$('#content').val('Beer');
			$('#type2').on('change', function() {
				$('#content').val($(this).val());
			});
			$('#1').hide();
			$('#2').show();
			$('#3').hide();
		//	$('#type2').attr("required".true);
		} else if(data == 3) {
			$('#content').val('Ice Cream');
			$('#type3').on('change', function() {
				$('#content').val($(this).val());
			});
			$('#1').hide();
			$('#2').hide();
			$('#3').show();
		//	$('#type3').attr("required".true);
		} else if(data == 0){
			$('#1').hide();
			$('#2').hide();
			$('#3').hide();
			$('#testme').val('');
		}
	});
</script>
<!-- end of add product modal -->