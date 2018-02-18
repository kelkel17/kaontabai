<?php 
  include '../Controller/dbconn.php';
  if(isset($_POST['Save'])){
      $desc = $_POST['desc'];
      $table = $_POST['table'];
      $image = $_FILES['image']['name'];
      $directory = "uploads/";
      $path = time().$image;
      $imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
          if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
                // echo '<script> alert("Image must be a JPG/JPEG/PNG"); window.location="index.php?e=Invalid extension&style=danger&head=Oh snap!"; </script>';
            }else{  
  
        
            if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
            {
        
              $data = array($desc,$table,$path);
              addTable($data);
          }
         } 
  }

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Packery - save & restore drag position</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="../something/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style3.css">
        <script src="../something/vendor/jquery/jquery.min.js"></script>
    <script src="../something/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>

 

  
</head>

<body>
    <button type="button" class="btn btn-primary hover m-t-15" data-toggle="modal" data-target="#addProduct">Add</button>       
  
<div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
              <div class="modal-dialog" role="document"  style="z-index: 1041;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Table Details</h1>
                          <button class="close" data-dismiss="modal" type="button">
                              <span>&times;</span>
                          </button>
                      </div><!-- end modal-header -->
                      <form method="POST">
                        <div class="modal-body">
                          <div class="form-group text-center">
                            <label for="image" class="hover" >
                            <img src="blank.jpg" id="preview" data-tooltip="true" title="Upload product image" data-animation="false" alt="product image" style="width:200px;height:200px">
                            </label>
                            <input type="file" name="image" onchange="loadImage(event)" style="visibility:hidden" id="image">
                          </div>
                          <div class="form-group">
                                <label for="ptable">Number of Chairs</label>
                                <input type="number" name="table" id="ptable" class="form-control" required>
                                <span class="highlight"></span><span class="bar"></span>
                          </div>
                          <div class="form-group">
                                <label for="ptable">Area/Table Description</label>
                                <textarea name="desc" id="ptable" class="form-control" required></textarea>
                                <span class="highlight"></span><span class="bar"></span>
                          </div>
                        </div><!-- end modal-body -->
                         <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-secondary hover" data-animation="false">Close</button>
                              <input type="submit" name="Save" class="btn btn-primary hover" value="Save!">
                         </div><!-- end modal-footer -->
                    </form>
                  </div><!-- end modal-content --> 
              </div><!-- end modal-dialog -->
           </div><!-- end Message modal-->                     
<br /><br /><br />
<div class="grid">
  <div class="grid-sizer"></div>
  <?php 
        $con = con();
        $sql = "SELECT * FROM menus ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $view = $stmt->fetchAll();
        foreach ($view as $row) {
         echo '<div class="grid-item" data-item-id="1" style="background-image: url(../Image/'.$row['m_image'].');"></div>';
    }
    ?>
  <div class="grid-item" data-item-id="2"
    ></div>
  <div class="grid-item" data-item-id="3"
    ></div>
  <div class="grid-item" data-item-id="4"
    ></div>
  <div class="grid-item" data-item-id="5"
    ></div>
  <div class="grid-item" data-item-id="6"
    ></div>
  <div class="grid-item" data-item-id="7"
    ></div>
  <div class="grid-item" data-item-id="8"
    ></div>
  <div class="grid-item" data-item-id="9"
    ></div>
</div>
 <!-- <script src='js/jquery.min.js'></script> -->
<script src='js/packery.pkgd.js'></script>
<script src='js/draggabilly.pkgd.js'></script>

    <script  src="js/index.js"></script>

</body>
<script>
    function loadImage(){
        var loadImg = document.getElementById('preview');
        loadImg.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</html>
