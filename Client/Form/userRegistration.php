<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
    session_start();
    $count=0;
    if(isset($_SESSION['cart'])){
        $count=count($_SESSION['cart']);
    }
    ?>
    <nav class="navbar bg-body-secondary">
        <div class="container-fluid font-monospace">
            <a class="navbar-brand pb-2 ">E-Shoppe</a>

            <div class="d-flex">
                <a class="text-decoration-none text-warning pe-2 " aria-current="page" href="index.php"><i class="fa-solid fa-house-chimney pe-1 "></i>Home |</a>
                <a class="text-decoration-none  text-warning pe-2 " href="viewCart.php"><i class="fa-solid fa-cart-plus pe-2 "></i>Cart(<?php echo $count ?>) |</a>
                <span class="text-warning pe-2">
                    <i class="fa-solid fa-users pe-2 "></i>Hello, |
                    <a href="#" class="text-decoration-none  text-warning pe-2 "><i class="pe-1 fa-sharp fa-solid fa-right-to-bracket"></i>Login |</a>
                    <a href="../Admin/myStore.php" class="text-decoration-none  text-warning pe-1  ">Admin</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
    <div class="container row mt-5 col-md-4 border border-success rounded w-25 m-auto shadow-lg p-3 bg-body-tertiary font-monospace ">
        <h2 class="m-auto text-center text-warning fw-bold my-3 ">User Registration</h2>
        <form action="userInsert.php" method="POST">
            <label for="">User Name:</label>
            <input class="form-control my-2" type="text" name="name" placeholder="Enter Your Name" required />
            <label for="">User E-mail:</label>
            <input class="form-control my-2" type="email" name="email" placeholder="Enter Your Email" required />
            <label for="">User Password:</label>
            <input class="form-control my-2" type="password" name="password" placeholder="Enter Your Password" required />
            <label for="">User Phone:</label>
            <input class="form-control my-2 mb-4" type="number" name="phone" placeholder="Enter Your Phone Number" required />

            <div class="text-center">
                <button name="submit" style="background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);" class="fs-5 border rounded fw-bold text-white w-100" type="submit">Register</button>
            </div>
        </form>
        <p class="my-2 p-2 ">
            Already have an account? <a class="text-decoration-none " href="userLogin.php">Login here</a>
        </p>
    </div>
    <?php include '../footer.php' ?>
</body>

</html>