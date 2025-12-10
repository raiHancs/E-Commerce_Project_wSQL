<?php 
include 'config.php';
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $product_name=$_POST['pname'];
        $product_price=$_POST['pprice'];
        $product_image=$_FILES['pimage'];
        $image_loc = $_FILES['pimage']['tmp_name'];
        $image_name = $_FILES['pimage']['name'];
        $image_des= "uploadedImage/".$image_name;
        move_uploaded_file($image_loc,$image_des);
        $product_category=$_POST['pages'];
        mysqli_query($conn,"UPDATE `product` SET `pname`='$product_name',`pprice`='$product_price',`pimage`='$image_des',`pcategory`='$product_category' WHERE `id`='$id'");
    }
    header("Location:index.php");
