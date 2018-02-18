<div id="category_types" class="tab-pane">
    <input type="hidden" name="testme" value="" id="testme2">
       <label for="pcategory">Product Category</label>
          <select name="category" id="category2" class="form-control" required>
             <option disabled selected></option>
              <?php 
                  $category = viewAllMenuCategory();
                  foreach ($category as $rows){  
              ?>
              <option value="<?php echo $rows['mc_id']?>" <?php if($row['mc_id']==$rows['mc_id']){ echo 'selected'; }?>><?php echo $rows['mc_name']?></option>
              <?php } ?> 
          </select>
             <span class="highlight"></span><span class="bar"></span>
</div>
<div id="11" class="tab-content">   
  <label for="ptype">Product Type</label>
       <select name="type[]" id="type4" class="form-control" required>
          <option value="<?php echo $row['m_category']?>" <?php if($row['m_category']==$row['m_category']){ echo 'selected'; }?>><?php echo $row['m_category']?></option>
          <option value="Appetizer">Appetizer</option>
          <option value="Pork">Pork</option>
          <option value="Beef">Beef</option>
          <option value="Fish">Fish</option>
          <option value="Chicken">Chicken</option>
          <option value="Juice">Juice</option>
          <option value="Sizzlers/Grilled">SIZZLERS/GRILLED</option>
          <option value="Noodles/and/Rice">NOODLES/RICE</option>
          <option value="Soup/Vegetables">Soup/Vegetables/Salad</option>    
      </select>   
</div>    
<div class="tab-content" id="12">
  <label for="ptype">Product Type</label> 
      <select name="type[]" id="type22" class="form-control" required>
        <option value="Beer">Beer</option>
        <option value="Soft Drinks">Soft Drinks</option>
        <option value="Tea">Tea</option>
        <option value="Shake">Shake</option>
        <option value="Wine">Wine</option>   
 </select>
</div>    
<div class="tab-content" id="13">
  <label for="ptype">Product Type</label>
    <select name="type[]" id="type32" class="form-control" required>
        <option value="Ice Cream">Ice Cream</option>
        <option value="Cake">Cake</option>
        <option value="Halo-Halo">Halo-Halo</option>
        <option value="Special">Special</option>
     </select>   
</div>
