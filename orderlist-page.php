
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cart-and-orderlists.css">
<body>
  <?php
        session_start();
        $file_name = 'users.csv';
        $dis_link = "distribution-a";
        $fp = fopen($file_name, 'r');
        // first row => field names
        $first = fgetcsv($fp);
        $users = [];
        while ($row = fgetcsv($fp)) {
          $i = 0;
          $user = [];
          foreach ($first as $col_name) {
          $user[$col_name] =  $row[$i];
          if($user['distribution'] == 'distribution-a'){
              $dis_link = "distribution-a.csv";
          }
          if($user['distribution'] == 'distribution-b'){
              $dis_link = "distribution-b.csv";
          }
          if($user['distribution'] == 'distribution-c'){
              $dis_link = "distribution-c.csv";
          }
          $i++;
          }
          }
?>
<?php 
          $dis_link = "distribution-a.csv";
          $f = fopen($dis_link, 'r');
          $first = fgetcsv($fp);
          $distribution_hubs = [];
          while ($row = fgetcsv($fp)) {
            $i = 0;
            $distribution_hub = [];
            foreach ($first as $col_name) {
              $distribution_hub[$col_name] =  $row[$i];
              $i++;
            }
              $distribution_hubs [] = $distribution_hub;
          }
            // overwrite the session variable
            $_SESSION['orders'] = $distribution_hubs;
?>
<?php
            if(isset($_POST['update'])){
              if($_POST['status'] == 'canceled'){
              $delProductName = $_GET['choice'];
              $length = count($distribution_hubs);
              for($i = 0 ; $i <= $length; $i++){
                if($distribution_hubs[$i]['productname'] == $delProductName){
                  unset($distribution_hubs[$i]);
                  break;
                }
              }
              }
            }
?>
    <div class="container-fluid">
        <h2>Active Orders!</h2>
        <div class="container_c">
          <div class="container_l" id="container_l">
            <!-- cho php chen vao vaf for de in ra cac oct tu file distribution hub php vaf db cua no -->
            <?php
                $orders = [];
                $orders = $_SESSION['orders'];
                $length = count($orders);
                for($i = 0 ; $i <= $length; $i++){
                  $product_name = '';
                  $price = 0;
                  $product_img_src = "#";
                  $quantity = 1;
                  $price = 1;
                  $name = '';
                  $address = '';
                  $name = $orders[$i]['name'];
                  $address = $orders[$i]['address'];
                  $price = $orders[$i]['price'];
                  $product_img_src = $orders[$i]['product_img_src'];
                  $product_name = $orders[$i]['product_name'];
                  $price = $orders[$i]['quantity'];
                  require('oder-rows.php');
                }
            ?>
          </div>   
    </div>
</body>
</html>

