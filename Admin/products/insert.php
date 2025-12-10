<?php
    if (isset($_POST['submit'])){
        include 'config.php';
        $product_name=$_POST['pname'];
        $product_price=$_POST['pprice'];
        $product_image=$_FILES['pimage'];
        $image_loc = $_FILES['pimage']['tmp_name'];
        $image_name = $_FILES['pimage']['name'];
        $image_des= "uploadedImage/".$image_name;
        move_uploaded_file($image_loc,$image_des);
        $product_category=$_POST['pages'];
        //insert product 

        mysqli_query($conn,"INSERT INTO `product`(`pname`, `pprice`, `pimage`, `pcategory`) VALUES ('$product_name','$product_price','$image_des','$product_category')");
    }
    header("location:index.php");
