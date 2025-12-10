<?php
$id=$_GET['id'];
$db=mysqli_connect('localhost','root','','e-commerce_db');
mysqli_query($db,"DELETE FROM `userlog` WHERE `id`=$id");
header("location:allUser.php");