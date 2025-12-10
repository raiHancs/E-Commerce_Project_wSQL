<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upadate Product</title>
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include 'config.php';
        $id=$_GET['id'];
        $record= mysqli_query($conn, "SELECT * FROM `product` where `id`=$id ");
        $data=mysqli_fetch_array($record);
    ?>
    <div class="container row mt-5 col-md-4 border border-success rounded w-25 m-auto shadow-lg p-3 bg-body-tertiary ">
        <form action="upInsert.php" method="POST" enctype="multipart/form-data">
            <p class="text-center text-warning fs-3 fw-bolder ">Product Details</p>
            <div class="mb-3">
                <label class="form-label">Product Name:</label>
                <input type="text" value="<?php echo $data['pname'] ?>" name="pname" class="form-control " placeholder="Enter Product Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price:</label>
                <input type="text" value="<?php echo $data['pprice'] ?>" name="pprice" class="form-control" placeholder="Enter Product price">
            </div>
            <div class="mb-2">
                <label class="form-label ">Product Image:</label>
                <input type="file" name="pimage" class="form-control">
                <img src="<?php echo $data['pimage'] ?>" alt="" height="100rem">
            </div>
            <div class="mb-3">
                <label class="form-label ">Select Product Category:</label>
                <select class="form-select" name="pages" aria-label="">
                    <option selected>Select Category</option>
                    <option value="mobile">Mobile</option>
                    <option value="laptop">Laptop</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <button name="update" style="background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);" class="fs-5 fw-bold my-3 text-white form-control " type="submit">Update</button>
        </form>
    </div>
    
</body>
</html>