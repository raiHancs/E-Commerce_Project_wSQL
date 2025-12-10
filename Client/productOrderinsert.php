<?php
$db = new mysqli('localhost', 'root', '', 'e-commerce_db');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if(isset($_POST['submit'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $address=$_POST['address1'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $payment=$_POST['paymentMethod'];

    // mysqli_query($db,"INSERT INTO `productorder`(`ufname`, `ulname`, `email`, `address`, `country`, `city`, `zip`, `payment`) 
    // VALUES ('$fname','$lname','$email','$address','$country','$city','$zip','$payment')");
}
//header("Location:voucherGeneration.php");