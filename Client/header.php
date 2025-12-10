<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Trade</title>
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-KGkYqG3gD435LMZAC/8byquZiD5665LheNozmHAqp8vrOKBaBL/bFUO5Er5tMRNi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/js/coreui.bundle.min.js" integrity="sha384-Wl6mLWl+C0OgKzQqXtoEXuTkm2RwXManFDTNyMRxPR5zh3DFIUIDhq7Fp1JCFm1V" crossorigin="anonymous"></script>
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
            <a class="navbar-brand pb-2 ">E-Shopee</a>

            <div class="d-flex">
                <a class="text-decoration-none text-warning pe-2 " aria-current="page" href="index.php"><i class="fa-solid fa-house-chimney pe-1 "></i>Home |</a>
                <a class="text-decoration-none text-warning pe-2 " href="viewCart.php"><i class="fa-solid fa-cart-plus pe-2 "></i>Cart(<?php echo $count ?>) |</a>
                <span class="text-warning pe-2">
                    <i class="fa-solid fa-users pe-2 "></i>Hello, 
                    <?php 
                        if(isset($_SESSION['user_nm'])){
                            echo $_SESSION['user_nm'].' |';
                            echo '
                            <a href="Form/logout.php" class="text-decoration-none  text-warning pe-2 "><i class="pe-1 fa-solid fa-right-from-bracket"></i>Log Out |</a>
                            ';
                        }else{
                            echo '
                            | <a href="Form/userLogin.php" class="text-decoration-none  text-warning pe-2 "><i class="pe-1 fa-solid fa-right-to-bracket"></i>Log in |</a>
                            ';
                        }
                    ?>
                    
                    <a href="../Admin/myStore.php" class="text-decoration-none  text-warning pe-1  ">Admin</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
    <div class="bg-danger-subtle font-monospace sticky-top ">
        <ul class="list-unstyled d-flex justify-content-center ">
            <li><a href="laptop.php" class="text-decoration-none text-light-emphasis fs-2 fw-bold px-5">Laptop's</a></li>
            <li><a href="accessories.php" class="text-decoration-none text-light-emphasis fs-2 fw-bold px-5">Accessories</a></li>
            <li><a href="mobile.php" class="text-decoration-none text-light-emphasis fs-2 fw-bold px-5">Mobile's</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
</body>

</html>