
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Product detail page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/productdetail-add.css">
  <script src="add-to-local.js" async></script>
<body>
<?php
  session_start();
  require('fullheader.php');
?>
<?php
  require('index-breadcumbs.php');
?>  
<?php
  $product_name = '';
  $product_name = $_GET['choice'];
  $price = 0;
  $product_img_src = "#";
  $product_detail = '';
  $products = [];
  $products = $_SESSION['products'];
  $length = count($product);
  for($i = 0 ; $i <= $length; $i++){
    if($products[$i]['productname'] == $product_name){
      $price = $products[$i]['price'];
      $product_img_src = $products[$i]['product_img_src'];
      $product_detail = $products[$i]['description'];
      break;
    }
  }
?>

    <!-- ----------single product details------------- -->
    <div class="small-container-fluid single-product">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <img class="img-src" src="deal-img.jpg" alt="Book" />
          </div>
          <div class="col-sm-6 col-md-3">
            <h1 class="title"><?php echo $product_name;?></h1>
            <h4 class="product-price"><?php echo $price;?></h4>
            <a href="cf-shopoingcart-page.php?choice=<?php echo $product_name;?>" class="btn" id="to-cart">Add To Cart</a>
            <h3>Book Details</h3>
            <br />
            <p>
              <?php echo $product_detail;?>
            </p>
          </div>
        </div>
      </div>

<?php
  require('footer.php');
?> 
</body>
</html>

