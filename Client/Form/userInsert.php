<?php
$db = new mysqli('localhost', 'root', '', 'e-commerce_db');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phn=$_POST['phone'];

    $dup_email= mysqli_query($db,"SELECT * FROM `userLog` WHERE `e-mail` = '$email'");
    $dup_name= mysqli_query($db,"SELECT * FROM `userLog` WHERE `name` = '$name'");

    if(mysqli_num_rows($dup_email)){
        echo '
            <script>
                alert("This email is already taken");
                window.location.href="userRegistration.php";
            </script>
        ';
    }
    elseif(mysqli_num_rows($dup_name)){
        echo '
            <script>
                alert("This username is already taken");
                window.location.href="userRegistration.php";
            </script>
        ';
    }
    else{
        mysqli_query($db,"INSERT INTO `userLog` (`name`,`e-mail`,`password`,`phone`) values('$name','$email','$password','$phn')");
        echo '
            <script>
                alert("Registration is successfully done");
                window.location.href="userRegistration.php";
            </script>
        ';
    }
}

$db->close();
