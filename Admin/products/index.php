<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porduct page</title>

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
</head>

<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location:../adminSign-in.html");
  }
?>

<body>
<nav class="navbar navbar-dark bg-dark rounded-bottom-4">
  <div class="container-fluid text-white ">
    <a class="navbar-brand"><h1>Admin Panel</h1></a>
    <span>
      <i class="fas fa-users-cog"></i>
      hello, <?php echo $_SESSION['username']; ?> |
      <a class="text-decoration-none "  href="../adminSign-out.php"onMouseOver="this.style.color='#f1c201'" onMouseOut="this.style.color='#acf'"><i class="fas fa-sign-out-alt"></i> Sign out</a> |
      <a class="text-decoration-none" href="../../Client/index.php" onMouseOver="this.style.color='#f1c201'" onMouseOut="this.style.color='#acf'">User Panel</a>

    </span>
  </div>
</nav>
    <div class="container row mt-5 col-md-4 border border-success rounded w-25 m-auto shadow-lg p-3 bg-body-tertiary ">
        <form action=" insert.php" method="POST" enctype="multipart/form-data">
            <p class="text-center text-warning fs-3 fw-bolder ">Product Details</p>
            <div class="mb-3">
                <label class="form-label">Product Name:</label>
                <input type="text" name="pname" class="form-control " placeholder="Enter Product Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price:</label>
                <input type="text" name="pprice" class="form-control" placeholder="Enter Product price">
            </div>
            <div class="mb-3">
                <label class="form-label ">Product Image:</label>
                <input type="file" name="pimage" class="form-control">
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
            <button name="submit" style="background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);" class="fs-5 fw-bold my-3 text-white form-control " type="submit">Upload</button>
        </form>
    </div>
    <div class="container row mt-5 col-md-6 border border-success rounded  m-auto shadow-lg p-3 bg-body-secondary mb-5 ">
        <table class="table border border-warning-subtle rounded  table-hover ">
            <thead class="text-center fs-4 font-monospace">
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            
            <?php
                include 'config.php';
                $records = mysqli_query($conn, "SELECT * FROM `product`");
                $i = 0;
                while ($row = mysqli_fetch_array($records)) {
                    if ($row != null) { // Check if $row is not null
                        echo "
                            <tr>
                                <td>" . ++$i . "</td>
                                <td>{$row['pname']}</td>
                                <td>{$row['pprice']} TK</td>
                                <td><img src='{$row['pimage']}' alt='' height='90px' width='120px' ></td>
                                <td>{$row['pcategory']}</td>
                                <td><a href='update.php?id={$row['id']}' style='background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);' class='btn btn-primary fs-8 fw-bold my-3 text-white form-control'>Update</a></td>
                                <td><a href='delete.php?id={$row['id']}' style='background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);' class='btn btn-primary fs-8 fw-bold my-3 text-white form-control'>Delete</a></td>
                            </tr>
                        ";
                    }
                }
                ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

