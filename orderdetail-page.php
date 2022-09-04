<?php
require('login_check.php');
require('distribution.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/oderdetail.css">
<body>
<?php
session_start();
require('logedinheader.php');
?>
<?php
  $product_name = '';
  $product_name = $_GET['choice'];
  $price = 0;
  $product_img_src = "#";
  $bName = '';
  $quantity = 1;
  $price = 1;
  $name = '';
  $address = '';
  $orders = [];
  $orders = $_SESSION['distribution_hub'];
  $length = count($product);
  for($i = 0 ; $i <= $length; $i++){
    if($orders[$i]['productname'] == $product_name){
      $price = $orders[$i]['price'];
      $product_img_src = $orders[$i]['product_img_src'];
      $quantity = $orders[$i]['quantity'];
      $name = $orders[$i]['name'];
      $address = $orders[$i]['address'];
      break;
    }
  }
  $totalPrice = $price * $quantity;
?>
<h1 class="text-center">Order Detail</h1>
<div class="container-fluid">
    <!-- ----------single product details------------- -->
    <div class="small-container-fluid single-product" id="single-product">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <img src="<?php echo $product_img_src;?>" alt="<?php echo $product_name;?>" />
          </div>
          <div class="col-sm-6 col-md-3">
            <h4>Product Name: <?php echo $product_name;?>/h4>
            <p>Amount: <?php echo $quantity;?></p>
          </div>
        </div>
      </div>
  
      <!-- -------------Price----------------- -->
      <div class="small-container-fluid" id="price">
        <div class="row row-2">
            <div class="col-sm-6 col-md-3">
                <h2>Total Price:</h2>
            </div>
            <div class="col-sm-6 col-md-3" id="price-v">
                <h2><?php echo "$".$toTalprice;?></h2>
            </div>
        </div>
      </div>
      <!-- --------------User's Info-------------- -->
      <div class="small-container-fluid" id="u-info">
        <div class="row" id="info">
          <div class="col-sm-6 col-md-3">
            <h4>Name: <?php echo $name;?></h4>
            <p>Address: <?php echo $address;?></p>
          </div>
        </div>
      </div>

      <!-- --------------Status's form-------------- -->
      <div class="small-container-fluid" id="sta">
        <div class="row" id="status">
          <div class="col-sm-6 col-md-3">
            <!-- xu ly file handling data cho status -->
            <form action="" method="post">
                <label for="status"><span>STATUS:</span></label>
                <select name="status" id="status">
                    <option value="active">Active</option>
                    <option value="delivered">Delivered</option>
                    <option value="canceled">Canceled</option>
                </select>
                <button type="submit" class="btn btn-danger" name="submit">Update Now</button>
            </form>
          </div>
        </div>
      </div>
</div>

<?php
require('footer.php');
?>
</body>
</html>

