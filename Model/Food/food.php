<?php 
  
    include '../../Controller/dbconn.php';
    islogged();

  
  if(isset($_POST['updateProduct'])){
      $id = $_POST['id'];
      $name = $_POST['name']; 
        $desc = $_POST['desc'];   
        $type = $_POST['testme'];
        $category = $_POST['category']; 
        $price = $_POST['price'];
        $myID = $_SESSION['id'];
        $image = $_FILES['image']['name'];
        $directory = "../../Image/";
       if(!empty($image))
            $path = time().$image;
        else  $path = '';
      $imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
      if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && !empty($path)){
             echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="../../Model/Food/food.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
        }else{      
                if(empty($path))
                    $data = array($myID,$name,$desc,$category,$type,$price,$id);
                
                else{
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
                        $data = array($myID,$name,$desc,$category,$type,$price,$path, $id);
                    else
                        echo '<script> alert("Error in Updating a Product"); window.location="../../Model/Food/food.php" </script>';
                }
                    updateProduct($data,$path);   
                    echo '<script> alert("Successfully Updated the Product"); window.location="../../Model/Food/food.php" </script>';
        }
  
  }
    

?>

<!DOCTYPE html>
<html>

<?php include('../header.php');?>
    <div class="divider"></div>
    <ul class="nav menu">
      <li class=""><a href="../Restaurant/story.php"><em class="fa fa-opencart">&nbsp;</em> Orders</a></li>
      <li class=""><a href="../Restaurant/reservations.php"><em class="fa fa-bookmark">&nbsp;</em> Reservations</a></li>
      <li class=""><a href="../Event/events.php"><em class="fa fa-bar-chart">&nbsp;</em> Events</a></li>
      <li class=""><a href="../Schedule/schedules.php"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
      <li class=""><a href="../Restaurant/promo.php"><em class="fa fa-cutlery">&nbsp;</em> Combo Meals</a></li>
      <li class=""><a href="../Room/rooms.php"><em class="fa fa-clone">&nbsp;</em> Tables</a></li>
      <li class=""><a href="../Employee/staff.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
      <li class="active"><a href="../Food/food.php"><em class="fa fa-cutlery">&nbsp;</em> Menu</a></li>
      <li class=""><a href="../../Controller/logoutadmin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
  </div><!--/.sidebar-->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
      <div class="col-lg-6">
        <h1 class="page-header" style="float: left;margin: 10px;">Menu</h1>
        <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct"  style="float: left;margin: 10px;">Add a Menu</button> 
      </div>
        
        <?php include_once('foodmodal.php'); ?>
    </div><!--/.row-->

<div class="table-responsive">

<table id="dataTable" class="cell-border compact display">
      <thead>
        <tr class="info" id="tableHeader">  
          <th><center>Product ID</center></th>  
          <th><center>Product Name</center></th>  
          <th><center>Product Description</center></th>          
          <th><center>Product Category</center></th>           
          <th><center>Product Type</center></th>   
          <th><center>Product Price</center></th>
          <th><center>Product Status</center></th>
          <!--  <th>Image</th> -->
          
          <th><center>Action</center></th>

        </tr>
    
      </thead>

  <tbody id="tableFooter">
    <tr>
  <?php 
    $id = $_SESSION['id'];
        $sql = "SELECT * FROM menus m, menu_category c WHERE m.mc_id = c.mc_id AND m.restaurant_id = $id";
        $con = con();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
  
        foreach($rows as $row)  
        {
        echo '<td><center>'.$row['menu_number'].'</center></td>';
        echo '<td>'.$row['m_name'].'</td>';
        echo '<td>'.substr($row['m_desc'], 0, 50).((strlen($row['m_desc']) > 50) ? '...' : '').'</td>';
        echo '<td><center>'.$row['mc_name'].'</center></td>';
        echo '<td><center>'.$row['m_category'].'</center></td>';
          echo '<td><center>'.$row['m_price'].'</center></td>';
          echo '<td><center>'.$row['m_status'].'</center></td>'; 

        ?>
        <div class="cell">
              <td><center>
                  
           <?php if($row['m_status'] == "Available"){?>    
           <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['menu_id']; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>   
                  <a href="#" data-toggle="modal" data-target="#deactProduct<?php echo $row['menu_id']; ?>">
                    <i class="fa fa-times" aria-hidden="true" title="Deactivate"></i>
                  </a>
                    <i class="fa fa2 fa-circle-o" aria-hidden="true" title="Activate" disabled></i>
           <?php }elseif($row['m_status'] != "Available"){ ?>    
           <a href="#" data-toggle="modal" data-target="#updateProduct<?php echo $row['menu_id']; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i></a>   
                    <i class="fa fa2 fa-times" aria-hidden="true" title="Deactivate" disabled></i>
                  <a href="#" data-toggle="modal" data-target="#actProduct<?php echo $row['menu_id']; ?>">
                    <i class="fa fa-circle-o" aria-hidden="true" title="Activate"></i>
                  </a>
            <?php } ?>            
                  </center>
                </td>

        <?php include('foodmodal2.php');?>
           </div>   
         </tr>
         
      <?php } ?>   
        
    </tbody>
    </table>
    </div>
  </div>  <!--/.main-->

 <script src="../../something/js/global.js"></script>
  <script type="text/javascript">
     $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    } );
} );
 </script>

</body>
</html>
