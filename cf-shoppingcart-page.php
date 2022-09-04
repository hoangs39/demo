
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Shopping Cart Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/cart-and-orderlists.css">
<script src="add-to-cart.js" async></script>
<body>
<?php 
$distribution_hubs = [];
$distribution_hubs = $_SESSION['distribution_hub'];
if(isset($_POST['remove'])){
    $delProductName = $_GET['choice'];
    $length = count($distribution_hubs);
    for($i = 0 ; $i <= $length; $i++){
        if($distribution_hubs[$i]['productname'] == $delProductName){
            unset($distribution_hubs[$i]);
            break;
        }
    }
}

if(isset($_POST['purchase'])){
    $random = rand(1,3);
    if($random == 1){
        $distribution_link = "distribution-c.csv";
    } else if($random == 2){
        $distribution_link = "distribution-b.csv";
    } else{
        $distribution_link = "distribution-a.csv";
    }
      $f = fopen($distribution_link, 'w');
      flock($f, LOCK_EX);
      $fields = ['product_name','price','quantity','name', 'address', 'img_src', 'distribution_address'];
      fputcsv($f, $fields);
      if (is_array($distribution_hubs)) {
          foreach ($distribution_hubs as $distribution_hub) {
            fputcsv($f, $distribution_hub);
          }
      }
      flock($f, LOCK_UN);
      fclose($f);
}
?>
    <div class="container-fluid">
        <h2>Your Shopping Cart!</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="container" id="container_l">
            <!-- tu day  -->
            <?php
                  $distribution_hub = [];
                  $distribution_hub = $_SESSION['distribution_hub'];
                  $length = count($distribution_hub);
                  for($i = 0 ; $i <= $length; $i++){
                    $product_name = '';
                    $price = 0;
                    $quantity = 0;
                    $product_img_src = "#";
                    $price = $distribution_hub[$i]['price'];
                    $product_img_src = $distribution_hub[$i]['product_img_src'];
                    $product_name = $distribution_hub[$i]['product_name'];
                    $price = $distribution_hub[$i]['quantity'];
                    require('shopping-cart-rows.php');
                  }
            ?>
            <!-- den day -->
          </div>

            <div class="row" id="container_r">
                <h5 class="text-left" id="total">Click the button to buy!</h5>
                <button type="submit" name="buy" class="btn-purchase">Confirm to Buy</button>
            </div>
        </form>
    </div>

</body>
</html>

