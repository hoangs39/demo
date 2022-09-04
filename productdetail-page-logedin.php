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


    if(isset($_POST['add'])){
    $random = rand(1,3);
    if($random == 1){
        $distribution_address = "SG";
    } else if($random == 2){
        $distribution_address = "DN";
    } else{
        $distribution_address = "HN";
    }

    $file_name = 'users.csv';
    $fp = fopen($file_name, 'r');
    // first row => field names
    $first = fgetcsv($fp);
    // start - second line because the pointer is in the second
    while ($row = fgetcsv($fp)) {
      $i = 0;
      $user = [];
      foreach ($first as $col_name) {
        $user[$col_name] =  $row[$i];
        if(strcmp($user['user_name'],$_SESSION['userdata']['username']) == 0){
            $name = $user['name'];
            $address = $address['address'];
            fclose($fp);
            break;
        }
        $i++;
      }
    }
    $distribution_hub = [
        'productname' => $productname,
        'price' => $price,
        'quantity' => $quantity,
        'name' => $name,
        'address' => $address,
        'img_src' => $img_src,
        'distribution_address' => $distribution_address
    ];
    $_SESSION['distribution_hubs'][] = $distribution_hub;
  }
?>
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
  require('index-breadcumbs-logedin.php');
?>  

    <!-- ----------single product details------------- -->
    <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="small-container-fluid single-product">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <img class="img-src" src="<?php echo $product_img_src;?>" alt="<?php echo $product_name;?>" />
          </div>
          <div class="col-sm-6 col-md-3">
            <h1 class="title"><?php echo $product_name;?></h1>
            <h4 class="product-price"><?php echo $price;?></h4>
            <input type="number" name="quantity" value="1">
            <button type="submit" name="add">Add To Cart</button>
            <h3>Book Details</h3>
            <br />
            <p>
              <?php echo $product_detail;?>
            </p>
          </div>
        </div>
      </form>

<?php
  require('footer.php');
?> 
</body>
</html>

