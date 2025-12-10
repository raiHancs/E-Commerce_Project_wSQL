<?php 
session_start();

$db=new mysqli('localhost','root','','e-commerce_db');

if($db->connect_error){
    die("Error when connecting to Database.$db->connect_error");
}

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $result=mysqli_query($db,"SELECT * FROM `userLog` WHERE (`name` = '$name' OR `e-mail`='$name')");
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_nm'] = $row['name'];
            header("location: ../index.php");
        } else {
            echo '<script>alert("Invalid password")
            window.location.href="userLogin.php";
                </script>';
        }
    } else {
        echo '<script>alert("User not found")
        window.location.href="userLogin.php";
        </script>';
    }
}