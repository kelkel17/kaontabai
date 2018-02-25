<?php
include '../dbconn.php';
islogged();
if (isset($_POST['Add'])) {
    $id    = $_SESSION["id"];
    $name  = $_POST['name'];
    $desc  = $_POST['desc'];
    $price = $_POST['price'];
    $qty   = $_POST['qty'];
    $image = $_FILES['image']['name'];
    if ($image != '') {
        $directory = "../../Image/";
        $path      = time() . $image;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $directory . $path)) {
            $sql  = "INSERT INTO desserts(restaurant_id,des_name,des_desc,des_price,des_qty,des_image) 
					VALUES (?,?,?,?,?,?)";
            $con  = con();
            $stmt = $con->prepare($sql);
            $stmt->execute(array(
                $id,
                $name,
                $desc,
                $price,
                $qty,
                $path
            ));
            echo '<script> alert("Successfully Added a Dessert"); window.location="../../Model/Dessert/dessert.php" </script>';
        }
    }
}
$con = null;
?>