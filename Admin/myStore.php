<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
</head>
<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location:adminSign-in.html");
  }
?>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid text-white ">
    <a class="navbar-brand"><h1>Admin Panel</h1></a>
    <span>
      <i class="fas fa-users-cog"></i>
      hello, <?php echo $_SESSION['username']; ?> |
      <a class="text-decoration-none "  href="adminSign-out.php"onMouseOver="this.style.color='#f1c201'" onMouseOut="this.style.color='#acf'"><i class="fas fa-sign-out-alt"></i> Sign out</a> |
      <a class="text-decoration-none" href="../Client/index.php" onMouseOver="this.style.color='#f1c201'" onMouseOut="this.style.color='#acf'">User Panel</a>

    </span>
  </div>
</nav>
<div>
  <h1 class="text-center ">Dashboard</h1>
</div>
<div class="col-md-6 bg-danger text-center m-auto">
  <a class="text-white text-decoration-none fs-4 fw-bold px-5 " href="products/index.php">Add Post</a>
  <a class="text-white text-decoration-none fs-4 fw-bold px-5 " href="allUser.php">Users</a>
</div>
<div class="text-center text-warning my-5"><h2>Our all Client List</h2></div>
    <?php
        $db=mysqli_connect('localhost','root','','e-commerce_db');
        $record=mysqli_query($db,"SELECT * FROM `userlog`");
        $totalUser=mysqli_num_rows($record);
    ?>
    <div class="container">
        <div class="row ">
            <div class="col-md-10 ">
                <table class="table table-secondary table-bordered text-center ">
                    <thead>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone No.</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                            while($row=mysqli_fetch_array($record)) {
                                echo "
                                    <tr>
                                        <td>" ?><?php echo ++$i ?><?php echo" </td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['e-mail']}</td> <!-- Enclosed 'e-mail' in backticks -->
                                        <td>0{$row['phone']}</td>
                                        <td><a class='btn btn-outline-danger ' href='delete.php?id={$row['id']}'>Delete</a></td> <!-- Assuming you want to pass the ID to the delete.php file -->
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2 text-center">
                <h3 class="text-warning ">Total Client</h3>
                <h1 class="bg-danger text-white border rounded-3"><?php echo $totalUser ?></h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include '../Client/footer.php' ?>
</body>

</html>