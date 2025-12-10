<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Trade'sHome</title>
  <?php
  include "header.php";
  ?>
</head>

<body>
  <div class="container-fluid ">
    <div class="col-md-12 ">
      <div class="row ">
        <h1 class="text-warning font-monospace text-center my-3 ">Accessories Show-Off</h1>
        <?php
          include "config.php";
          $record = mysqli_query($conn, "SELECT * FROM `product`");
          while ($row = mysqli_fetch_array($record)) {
            $check_page=$row['pcategory'];
            if ($check_page==='accessories') {
            echo "
              <div class='col-md-6 col-lg-3 m-auto mb-5 '>
                <form action='insertCart.php' method='POST'>
                  <div class='card m-auto shadow-lg' style=' height:40rem'>
                    <img src='../Admin/products/$row[pimage]' class='card-img-top m-auto ' alt='Product Image' style='height: 25rem;'>
                    <div class='card-body text-center '>
                      <h5 class='card-title fw-bold '><span style='color: chartreuse; font-size:xx-large; padding-right:0.4rem;'>$row[pname]</span></h5>
                      <p class='card-text fw-bold'><span style='color: chartreuse; font-size:x-large; padding-right:0.4rem;'>TK : "?><?php echo number_format($row['pprice'],2) ?><?php echo"</span></p>
                    </div>
                    <div class='card-footer text-center text-warning '> 
                      <input type='hidden' name='pname' value='$row[pname]'>
                      <input type='hidden' name='pprice' value='$row[pprice]'>
                      <input type='number' name='pqtn' class='' value='min='1' max='20'' placeholder='1'><br><br>
                      <input type='submit' name='addCart' class='btn btn-warning w-100' value='Add to Cart'>
                    </div>
                  </div>
                </form>
              </div>
            ";
            }
          }
        ?>
      </div>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>