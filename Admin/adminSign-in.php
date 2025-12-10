<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'e-commerce_db');
if ($db->connect_error) {die("Connection failed: " . $db->connect_error);}
if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];$password = $_POST['password'];
    $stmt = $db->prepare("SELECT id, Username, password FROM admin WHERE Username = ?");$stmt->bind_param("s", $name);
    if ($stmt->execute()) {$result = $stmt->get_result();
        if ($result->num_rows >= 1) {$row = $result->fetch_assoc();if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['Username'];header("location: myStore.php");} else {
                echo '<script>alert("Invalid password")window.location.href="adminSign-in.html";</script>';
            }} else {echo '<script>alert("User not found")</script>';}} 
            else {echo '<script>alert("Login failed")</script>';}$stmt->close();}$db->close();
