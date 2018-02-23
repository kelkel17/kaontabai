<div id="category_types2" class="tab-pane">
    
       <label for="pcategory">Product Category</label>
       <input type="hidden" name="testme" class="nanananan" id="tryme">
          <select name="category" id="category2" class="form-control mickale" required>
             <option disabled selected></option>
              <?php 
                  $category = viewAllMenuCategory();
                  foreach ($category as $asd){  
                  
              ?>
              <option value="<?php echo $asd['mc_id']?>" <?php if($row['mc_id'] == $asd['mc_id']){ echo 'selected'; }?>><?php echo $asd['mc_name'];?></option>
              <?php } ?> 
          </select>
             <span class="highlight"></span><span class="bar"></span>
</div>
<div id="11" class="tab-content wew">   
  <label for="ptype">Product Type</label>

       <select name="type[]" id="idk" class="form-control" required>
          <!-- <option value= "<?php if($row['m_category']==$row['m_category']){ echo 'selected'; }?>"><?php echo $row['m_category']?></option> -->
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
<div class="tab-content sdsd" id="12">
  <label for="ptype">Product Type</label> 
      <select name="type[]" id="yolo" class="form-control" required>
        <!-- <option value="<?php echo $row['m_category']?>" <?php if($row['m_category']==$asd['m_category']){ echo 'selected'; }?>><?php echo $row['m_category']?></option>  -->
        <option value="Beer">Beer</option>
        <option value="Soft Drinks">Soft Drinks</option>
        <option value="Tea">Tea</option>
        <option value="Shake">Shake</option>
        <option value="Wine">Wine</option>   
 </select>
</div>    
<div class="tab-content wuw" id="13">
  <label for="ptype">Product Type</label>
    <select name="type[]" id="adis" class="form-control" required>
        <!-- <option value="<?php echo $row['m_category']?>" <?php if($row['m_category']==$asd['m_category']){ echo 'selected'; }?>><?php echo $row['m_category']?></option>  -->
        <option value="Ice Cream">Ice Cream</option>
        <option value="Cake">Cake</option>
        <option value="Halo-Halo">Halo-Halo</option>
        <option value="Special">Special</option>
     </select>   
</div>
<script>
    // console.log($('.wew').html());
    //   $('.wew').hide();
    //   $('.sdsd').hide();
    //   $('.wuw').hide();
      
            $('.wew').hide();
            $('.sdsd').hide();
            $('.wuw').hide();
      
      $('.mickale').change(function(){
        var data = $(this).val();
       
        if(data == 1){
            $('.nanananan').val('Appetizer');
            $('#idk').on('change', function(){
                $('.nanananan').val($(this).val());
            });
            $('.wew').show();
            $('.sdsd').hide();
            $('.wuw').hide();
            $('#idk').attr("required". true);
        }else if(data == 2){
            $('.nanananan').val('Beer');
            $('#yolo').on('change', function(){
                $('.nanananan').val($(this).val());
            });
            $('.wew').hide();
            $('.sdsd').show();
            $('.wuw').hide();
            $('#yolo').attr("required". true);
        }else if(data == 3){
            $('.nanananan').val('Ice Cream');
            $('#adis').on('change', function(){
                $('.nanananan').val($(this).val());
            });
            $('.wew').hide();
            $('.sdsd').hide();
            $('.wuw').show();
            $('#adis').attr("required". true);    
        }else{
            $('.wew').hide();
            $('.sdsd').hide();
            $('.wuw').hide();
            $('.nanananan').val('');

        }
    }).change(); 
</script>   