<?php
$id=$_GET['id'];
include 'config.php';
mysqli_query($conn,"DELETE FROM `product` WHERE `id`=$id");
header("Location:index.php");
