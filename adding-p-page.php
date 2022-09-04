<?php
require('login_check.php');
require('adding.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Adding product page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap5 library linked-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body>
<?php
require('logedinheader.php');
require('vendors-breadcumbs.php');
?>

    <!-- ----------adding single product------------- -->
    <div class="small-container-fluid single-product">
        <div class="registration-form">
            <h3 class="text-center">Adding New Product</h3>
      
            <form action="#" method="post" class = "row" id="col">
              <h4>Product's Information:</h4>
              <div class="col-sm-6 col-md-3" id="r">
                <div class="form-group">
                    <label for="uname">Product's Name:</label>
                    <input type="text" class="form-control" id="product_name" placeholder="Enter Product's Name" name="product_name" value="">
                    <p class="err-msg"><?php if($productnameErr!=1){ echo $productnameErr; } ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" placeholder="Enter Product's Price" name="price" value="" />
                    <p class="err-msg"><?php if($priceErr!=1){ echo $priceErr; } ?></p>
                </div>
                <div class="form-group">
                    <label for="product_img">Product's Images:</label>
                    <input type="file" name="product_img" enctype='multipart/form-data'>
                </div>
              </div>
              <div class="col-sm-6 col-md-3" id="r1">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class ="form-control" cols="10" rows="5"></textarea>
                    <p class="err-msg"><?php if($descriptionErr!=1){ echo $descriptionErr; } ?></p>
                </div>
                <button type="submit" class="btn btn-danger" name="submit">Submit Now</button>
              </div>  
            </form>
          </div>
      </div>
<?php
require('footer.php')
?>
</body>
</html>

