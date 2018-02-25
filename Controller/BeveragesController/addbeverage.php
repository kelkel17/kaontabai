<?php
include '../dbconn.php';
islogged();

if (isset($_POST['Add']))
{

    $id = $_SESSION["id"];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $image = $_FILES['image']['name'];
    if ($image != '')
    {
        //if (move_uploaded_file($image,'../../Image'.$filename)) {
        $directory = "../../Image/";
        $path = time() . $image;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $directory . $path))
        {
            $sql = "INSERT INTO beverages(restaurant_id,bev_name,bev_desc,bev_type,bev_price,bev_qty,bev_image) 
					VALUES (?,?,?,?,?,?,?)";

            $con = con();
            $stmt = $con->prepare($sql);
            $stmt->execute(array(
                $id,
                $name,
                $desc,
                $type,
                $price,
                $qty,
                $path
            ));
            //$_SESSION['id'] = $con->lastInsertId();
            echo '<script> alert("Successfully Added a Beverage"); window.location="../../Model/Beverage/beverage.php" </script>';

        }
    }
}
$con = null;
?>
