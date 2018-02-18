<?php

    include '../../Controller/dbconn.php';
   
    viewAllOwners();
    $Resid = $_GET['cid']; 
   
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
  
<?php include('header.php'); ?>
           <span><br></span>
           <span><br></span>
           <span><br></span>
           <span><br></span>   
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <center><h1><!-- <?php echo $row['restaurant_name'];?>'s --> Menu</h1><br/></center>
         <div class="form-group" style="float:left; width: 70%">
                <label>Filter by: </label>
                  <select name="filter" id="filter"  class="form-control" style="width: 35%;">
                      <option value="0">All</option>
                      <option value="1">Main Course</option>
                      <option value="2">Beverage</option>
                      <option value="3">Dessert</option>
                      <option value="4">Combo Meal</option>
                  </select>
          </div>
         </div> 
    </div>  

              
        <div class="col-lg-12" id="div0">
           <center><h2 style="color: black;">All</h2></center>
      <?php 
                $menu = selectMenu();
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
        
    ?>
                    <div class="col-sm-4 container">
                         <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php } ?>
                        <div class="middle">
                          <div class="text">
                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                            <div id="demo<?php echo $id['menu_id'] ?>" class="collapse"> 
                              <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                            </div>
                              
                           
                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                            <button data-toggle="collapse" data-target="#demo<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>
                             
                          
                            <button data-toggle="modal" data-target="#book<?php echo $Resid;?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                         </div>
                        </div>    
                            
                    
                    </div>   
                    <?php } ?> 
                   
        </div>

        <div class="col-lg-12" id="div1">
           <center><h2 style="color: black;">Main Course</h2></center>
      <?php 
                $menu = selectMenu();
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==1 && $Resid==$id['restaurant_id']){    
    ?>
        
                    <div class="col-sm-4 container">
                         <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php } ?>
                        <div class="middle">
                          <div class="text">
                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                            <div id="demo2<?php echo $id['menu_id'] ?>" class="collapse"> 
                              <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                            </div>
                              
                           
                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                            <button data-toggle="collapse" data-target="#demo2<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>
                             
                          
                            <button data-toggle="modal" data-target="#book<?php echo $Resid;?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                         </div>
                        </div>    
                            
                    
                    </div>   
                    <?php } }  ?> 
                   
        </div>
         <div class="col-lg-12" id="div2">
           <center><h2 style="color: black;">Beverages</h2></center>
      <?php 
                $menu = selectMenu();
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==2 && $Resid==$id['restaurant_id']){    
    ?>
        
                    <div class="col-sm-4 container">
                         <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php } ?>
                        <div class="middle">
                          <div class="text">
                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                            <div id="demo3<?php echo $id['menu_id'] ?>" class="collapse"> 
                              <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                            </div>
                              
                           
                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                            <button data-toggle="collapse" data-target="#demo3<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>
                             
                          
                            <button data-toggle="modal" data-target="#book<?php echo $Resid;?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                         </div>
                        </div>    
                            
                    
                    </div>   
                    <?php } }  ?> 
                   
        </div>
         <div class="col-lg-12" id="div3">
           <center><h2 style="color: black;">Desserts</h2></center>
      <?php 
                $menu = selectMenu();
                foreach ($menu as $id) {
                    $cid = $id['mc_id'];
                    if($cid==3 && $Resid==$id['restaurant_id']){    
    ?>
        
                    <div class="col-sm-4 container">
                         <?php 
                        $filename = '../../Image/'.$id['m_image'].'';
                        if($id['m_image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $id['m_image']?>" alt="<?php echo $id['m_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php } ?>
                        <div class="middle">
                          <div class="text">
                            <h4>Name: <?php echo $id['m_name'];?> </h4>
                            <h5>Category: <?php echo $id['m_category'];?> </h5>
                            <div id="demo4<?php echo $id['menu_id'] ?>" class="collapse"> 
                              <h5>Description: <?php echo $id['m_desc']; ?> </h5>
                            </div>
                              
                           
                            <h5>Price: &#8369; <?php echo $id['m_price'];?> </h5>
                            <button data-toggle="collapse" data-target="#demo4<?php echo $id['menu_id'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>
                             
                          
                             <button data-toggle="modal" data-target="#book<?php echo $Resid;?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                         </div>
                        </div>    
                            
                    
                    </div>   
                    <?php } }  ?> 
                   
        </div>
        <div class="col-lg-12" id="div4">
           <center><h2 style="color: black;">Combo Meals</h2></center>
      <?php 
                $menu = getCombos(array($Resid));
                foreach ($menu as $id) {  
                
    ?>
        
                    <div class="col-sm-4 container">
                         <?php 
                        $filename = '../../Image/'.$id['image'].'';
                        if($id['image'] == '' || !(file_exists($filename))){?>
                        <img src="../../Image/icon3.png" alt="blank" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php }else{ ?>
                        <img src="../../Image/<?php echo $id['image']?>" alt="<?php echo $id['cm_name']?>" class="img-responsive thumbnail image" style="width: 100%; height: 300px;">
                        <?php } ?>
                        <div class="middle">
                          <div class="text">
                            <h4>Name: <?php echo $id['cm_name'];?> </h4>
                            <h5>Category: <?php echo $id['menu_id'];?> </h5>
                            <div id="demo5<?php echo $id['cm_number'] ?>" class="collapse"> 
                              <h5>Description: <?php echo $id['desc']; ?> </h5>
                            </div>
                              
                           
                            <h5>Price: &#8369; <?php echo $id['price'];?> </h5>
                            <button data-toggle="collapse" data-target="#demo5<?php echo $id['cm_number'] ?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Show Description</button>
                             
                          
                            <button data-toggle="modal" data-target="#book<?php echo $Resid;?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
                         </div>
                        </div>    
                            
                    
                    </div>   
                    <?php }   ?> 
                   
        </div>
          <div class="modal" id="book<?php echo $Resid;?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <?php
                                            $get = getOwner(array($Resid));
                                            foreach ($get as $row) {
                                         
                                            
                                          ?>
                                            <h1 class="modal-title">Sign up now to order this product.</h1>
                                       <?php } ?>
                                      </div><!-- end modal-header -->
                                         <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-primary hover" data-animation="false">Close</button>
                                              <a href="../../index.php" class="btn btn-primary">Sign up</a>
                                          </div><!-- end modal-footer -->   
                                  </div>
                              </div>
                          </div>
  </div>          
      
        <?php include('footer.php'); ?> 
        <script>
            for(var j = 0; j < 5; j++){
                if(j == 0){
                document.getElementById('div'+j).style.display = '';
                 console.log(j);
                }else{
               document.getElementById('div'+j).style.display = 'none';
                console.log(j);
                }
            }
            var opt = document.getElementById('filter');
            opt.onchange = function(){
                for(var i = 0; i < 5; i++){
                   // alert(i);
                document.getElementById('div'+i).style.display = 'none';
                }
                document.getElementById('div'+ this.value).style.display = '';
            }
        </script>
    
    </body>
</html>
