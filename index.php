<?php
require('search.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/list-of-products.css">
<body>
<?php
  session_start();
  if (isset($_SESSION['userdata']['username'])){
    require('full-logedinheader.php');
  }else{
    require('fullheader.php');
  }
?>
<?php
  if (isset($_SESSION['userdata']['username'])){
  require('index-breadcumbs-logedin.php');
  }else{
  require('index-breadcumbs.php');
  }
?>
<!-- price-filter -->
<section class="price-filter">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row" method="post">
          <div class="col">
              <label for="">Max Price</label>
              <input type="number" name="max">
          </div>
          <div class="col">
              <label for="">Min Price</label>
              <input type="number" name="min">
          </div> 
          <button type="submit" name="filter"><i class="fa fa-search"></i></button>
      </form>
  </section>
<!----------------featured categories -------------------->
<?php
  require('promotion.php');
?>
<!----------------featured products -------------------->
  <div class="small-container-fluid">
    <h2 class="title">Featured Titles</h2>
      <div class="row">
        <!-- in het nhung gi trong file ra -->
        <?php
            $file_name = 'products.csv';
            $fp = fopen($file_name, 'r');
            // first row => field names
            $first = fgetcsv($fp);
            $products = [];
            // start - second line because the pointer is in the second
            while ($row = fgetcsv($fp)) {
              $i = 0;
              $product = [];
              $price = 0;
              $product_img_src = "#";
              $product_name = '';
              // each col in the row
              foreach ($first as $col_name) {
                $product[$col_name] =  $row[$i];
                if ($col_name == 'productname') {
                  $product_name = $product[$col_name];
                }
                if ($col_name == 'price') {
                  $price = $product[$col_name];
                }
                if ($col_name == 'product_img_src') {
                  $product_img_src = $product[$col_name];
                }
                $i++;
              }
              if (isset($_SESSION['userdata']['username'])){
                require('product-cols-logedin.php');
              }
              else{
                require('product-cols.php');
              }
              $products[] = $product;
            }
            // overwrite the session variable
            $_SESSION['products'] = $products;
            fclose($fp);
            // check search yet ???
            if(isset($_POST['search']) ||isset($_POST['filter']) ){
              $products = [];
              $products = $_SESSION['products'];
              $length = count($product);
              for($i = 0 ; $i <= $length; $i++){
                $product_name = '';
                $price = 0;
                $product_img_src = "#";
                if(s_search($products[$i]['productname']) === true){
                  $product_name = '';
                  $price = 0;
                  $product_img_src = "#";
                  $product_name = $products[$i]['productname'];
                  $price = $products[$i]['price'];
                  $product_img_src = $products[$i]['product_img_src'];
                  if (isset($_SESSION['userdata']['username'])){
                    require('product-cols-logedin.php');
                  }
                  else{
                    require('product-cols.php');
                  }
                }
                if(s_filter($products[$i]['price']) === true){
                  $product_name = '';
                  $price = 0;
                  $product_img_src = "#";
                  $product_name = $products[$i]['productname'];
                  $price = $products[$i]['price'];
                  $product_img_src = $products[$i]['product_img_src'];
                  if (isset($_SESSION['userdata']['username'])){
                    require('product-cols-logedin.php');
                  }
                  else{
                    require('product-cols.php');
                  }
                }
                if(s_search($products[$i]['productname']) === true && s_filter($products[$i]['price']) === true){
                  $product_name = '';
                  $price = 0;
                  $product_img_src = "#";
                  $product_name = $products[$i]['productname'];
                  $price = $products[$i]['price'];
                  $product_img_src = $products[$i]['product_img_src'];
                  if (isset($_SESSION['userdata']['username'])){
                    require('product-cols-logedin.php');
                  }
                  else{
                    require('product-cols.php');
                  }
                }
              }
          }else{
            $products = [];
            $products = $_SESSION['products'];
            $length = count($product);
            for($i = 0 ; $i <= $length; $i++){
            $product_name = '';
            $price = 0;
            $product_img_src = "#";
            $product_name = $products[$i]['productname'];
            $price = $products[$i]['price'];
            $product_img_src = $products[$i]['product_img_src'];
            if (isset($_SESSION['userdata']['username'])){
              require('product-cols-logedin.php');
            }
            else{
              require('product-cols.php');
            }
          }
          }
            ?>
      </div>

      <h2 class="title">Bestsellers</h2>
      <div class="row">
        <!-- xu lys data o day voi viec luu trong db distribution number of buyers => count => xep loai -->
        <?php
            if( !isset($_POST['search']) || !isset($_POST['filter']) ){
              $products = [];
              $products = $_SESSION['products'];
              $ran = rand(0,count($product) - 3);
              $ran3 = $ran + 3;
              for($i = $ran ; $i <= $ran3; $i++){
                $product_name = '';
                $price = 0;
                $product_img_src = "#";
                $product_name = $products[$i]['productname'];
                $price = $products[$i]['price'];
                $product_img_src = $products[$i]['product_img_src'];
                if (isset($_SESSION['userdata']['username'])){
                  require('product-cols-logedin.php');
                }
                else{
                  require('product-cols.php');
                }
              }
          }
        ?>
      </div>
  </div>
<?php
  require('footer.php');
?>
</body>
</html>

