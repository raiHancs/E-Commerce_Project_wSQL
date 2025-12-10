<!DOCTYPE html><html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Your Cart</title><?php include ("header.php"); ?></head>
<body><div class="container"><div class="row">
    <div class="col-lg-12 col-sm-6 text-center bg-light mb-5 rounded "><h1 class="text-warning">My cart</h1>
</div></div></div><div class="container-fluid"><div class="row justify-content-center ">
<div class="col-md-6 col-lg-7 col-sm-12"><table class="table table-bordered text-center table-hover ">
<thead class="bg-danger-subtle text-white fs-5"><th>Serial No:</th><th>Product name</th><th>Product Price</th>
<th>Product Quantity</th><th>Total Price</th><th>Update</th><th>Delete</th></thead>
<tbody><?php $total=0;$ctotal=0;$i=0;if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $key => $value){if (is_array($value)) {$total=$value['p_price']*$value['p_quantity'];
$ctotal+=$total;$i=$key+1;echo"<form method='POST' action='insertCart.php'><tr><td>$i</td>
    <td><input type='hidden' name='pname' value='$value[p_name]'>$value[p_name]</td>
    <td><input type='hidden' name='pprice' value='$value[p_price]'>$value[p_price]</td>
    <td><input type='number' name='pqtn' value='$value[p_quantity]' min='1' max='100'></td>
    <td>$total tk</td>
    <td><button name='update' class='btn btn-warning '>Update</button></td>
    <td><button name='remove' class='btn btn-danger '>Delete</button></td>
    <input type='hidden' name='item' value='$value[p_name]'></tr></form>";}}}?></tbody></table>
</div><!-- <div class="clearfix"></div> --><div class="col-lg-3 text-capitalize text-center w-auto "><h3 class="text-warning ">Total:</h3>
<h1 class="text-bg-warning  text-danger-emphasis border shadow rounded p-2"><?php echo number_format($ctotal,2);?> TK Only</h1>
</div></div></div><div class="container p-3 rounded-3 mt-5"><div class="row text-lg-center "><form action="checkOutCart.php" method="POST">
<button class="btn btn-primary " type="submit"><h1 class="text-warning ">Proceed to CheckOut</h1></button>
</form></div></div><?php include 'footer.php' ?></body></html>