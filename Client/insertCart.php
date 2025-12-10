<?php

session_start();
if(isset($_SESSION['user_nm'])){

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$product_name=$_POST['pname'];
$product_price=$_POST['pprice'];
$product_quantity=$_POST['pqtn'];


if(isset($_POST['addCart'])){
    $checkProduct=array_column($_SESSION['cart'],'p_name');
    if(in_array($product_name,$checkProduct)){
        echo"
            <script>
                alert('Product already added');
                window.location.href='index.php';
            </script>
        ";
    }else{
    $_SESSION['cart'][]=array('p_name'=>$product_name,'p_price'=>$product_price, 'p_quantity'=>$product_quantity);
    header('location:viewCart.php');
    }
}

//Remove products
if(isset($_POST['remove'])){
    foreach($_SESSION['cart'] as $key=>$value){
        if (is_array($value)) {
        if($value['p_name']===$_POST['item']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            header('location:viewCart.php');
        }
    }
    }
}

//Update the cart
if(isset($_POST['update'])){
    foreach($_SESSION['cart'] as $key=>$value){
        if (is_array($value)) {
        if($value['p_name']===$_POST['item']){
            $_SESSION['cart'][$key]=array('p_name'=>$product_name,'p_price'=>$product_price, 'p_quantity'=>$product_quantity);
            header('location:viewCart.php');
        }
    }
    }
}
}else{
    header('location:Form/userLogin.php');
}

//session_destroy();