<?php
$db = new mysqli('localhost', 'root', '', 'e-commerce_db');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO admin (Username, `e-mail`, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo '<>alert("Registration successful")
        window.location.href ="adminSign-in.html"
        </script>';
    } else {
        echo '<script>alert("Registration failed")
        window.location.href ="adminRegistry.html"
        </script>';
    }

    $stmt->close();
}

$db->close();
