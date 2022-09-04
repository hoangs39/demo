<?php
require('login_check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Product list Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/list-of-products.css">
<body>
<?php
require('logedinheader.php');
require('vendors-breadcumbs.php');
?>
<!----------------featured Books -------------------->
    <div class="small-container-fluid">
      <h2 class="title">All Your Products</h2>
      <div class="row">
        <!-- in het ra voi dk: dung ten bname! -->
        <?php
            $file_name = 'products.csv';
            $fp = fopen($file_name, 'r');
            // first row => field names
            $first = fgetcsv($fp);
            $products = [];
            $username = $_SESSION['userdata']['username'];
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
              if($col_name == 'owner'){
                  if($product[$col_name] == $username){
                  if ($col_name == 'product_img_src') {
                    $product_img_src = $product[$col_name];
                  }
                  if ($col_name == 'price') {
                    $price = $product[$col_name];
                  }
                  if ($col_name == 'productname') {
                    $product_name = $product[$col_name];
                  }
                }
              }

                $i++;

              }
              if($product_name != ''){
                require('product-cols');
              }
              $products[] = $product;
            }
            // overwrite the session variable
            $_SESSION['products'] = $products;
            fclose($fp);
            ?>
      </div>

    </div>
<?php
require('footer.php');
?>
</body>
</html>

