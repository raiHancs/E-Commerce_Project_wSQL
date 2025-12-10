<?php
// Include configuration file and initialize session
include 'config.php';

// Process filter options
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process filter options
    $category = $_POST['category'];
    $priceMin = $_POST['min_price'];
    $priceMax = $_POST['max_price'];
    
    // Construct SQL query based on filter options
    $sql = "SELECT * FROM `product` WHERE 1";
    if (!empty($category)) {
        $sql .= " AND `pcategory` = '$category'";
    }
    if (!empty($priceMin) || !empty($priceMax)) {
        $sql .= " AND `pprice` BETWEEN $priceMin AND $priceMax ";
    }
    
    // Execute query and fetch filtered results
    $result = mysqli_query($conn, $sql);
}

// Process search query
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    
    // Construct SQL query for search
    $sql = "SELECT * FROM `product` WHERE `pname` LIKE '%$searchQuery%'";
    
    // Execute query and fetch search results
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Search - Shope-E Website</title>
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/384fc544c2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-KGkYqG3gD435LMZAC/8byquZiD5665LheNozmHAqp8vrOKBaBL/bFUO5Er5tMRNi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/js/coreui.bundle.min.js" integrity="sha384-Wl6mLWl+C0OgKzQqXtoEXuTkm2RwXManFDTNyMRxPR5zh3DFIUIDhq7Fp1JCFm1V" crossorigin="anonymous"></script>

</head>
<body>

<?php include 'header.php'; // Include header ?>

<div class="container bg-body-secondary rounded ">
    <div class="row justify-content-between ">
        <!-- Filter options form -->
        <div class="col-md-3 mt-3 ">
            <form method="post">
                <label for="category"><h5 class="card-title ">Category:</h5></label>
                <select class="rounded" name="category" id="category">
                    <option value="">All</option>
                    <!-- Populate dropdown with categories from database -->
                    <?php
                    $categories = ["Laptop", "Accessories", "Mobile"]; // Sample categories
                    foreach ($categories as $category) {
                        echo "<option value='$category'>$category</option>";
                    }
                    ?>
                </select>
                
                <label for="price_range" class="d-block form-label mt-2 "><h5 class="card-title ">Price Range:</h5></label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="min" class="form-label">Min</label>
                        <input type="text" class="form-control" name="min_price" id="min_price">
                    </div>
                    <div class="col-md-6">
                        <label for="max" class="form-label">Max</label>
                        <input type="text" class="form-control" name="max_price" id="max_price">
                    </div>
                </div>

                
                <button type="submit" class="mt-3 btn btn-primary ms-auto  ">Apply Filters</button>
            </form>
        </div>
    
        <!-- Search form -->
        <div class="col-md-9 w-25 mt-5 ">
            <div class="card">
                <div class="card-body">
                    <!-- Search Section -->
                    <h5 class="card-title">Search</h5>
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Display filtered or searched results -->
    <div class="container-fluid mt-5 ">
    <div class="col-md-12 ">
      <div class="row ">
        <?php
          while ($row = mysqli_fetch_array($result)) {
            echo "
              <div class='col-md-6 col-lg-3 m-auto mb-5 '>
                <form action='insertCart.php' method='POST'>
                  <div class='card m-auto shadow-lg' style=' height:40rem'>
                    <img src='../Admin/products/$row[pimage]' class='card-img-top' alt='Product Image' style='height: 25rem;'>
                    <div class='card-body text-center '>
                      <h5 class='card-title fw-bold '><span style='color: chartreuse; font-size:xx-large; padding-right:0.4rem;'>$row[pname]</span></h5>
                      <p class='card-text fw-bold'><span style='color: chartreuse; font-size:x-large; padding-right:0.4rem;'>TK : "?><?php echo number_format($row['pprice'],2) ?><?php echo"</span></p>
                    </div>
                    <div class='card-footer text-center text-warning '>
                    <input type='hidden' name='pname' value='$row[pname]'> 
                    <input type='hidden' name='pprice' value='$row[pprice]'>
                    <input type='number' name='pqtn' class='' value='1' min='1' max='100' placeholder='1'><br><br>
                    <input type='submit' name='addCart' class='btn btn-warning w-100' value='Add to Cart' >
                    </div>
                  </div>
                </form>
              </div>
            ";
          }
        ?>
      </div>
    </div>
  </div>

</div>

<?php include 'footer.php'; // Include footer ?>

</body>
</html>
