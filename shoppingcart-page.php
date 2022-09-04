
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
    <div class="container-fluid">
        <h2>Your Shopping Cart!</h2>
        <form action="" method="post">
          <div class="container" id="container_l">
            <!-- xu ly voi js va chot gui data len db voi php -->
            <!-- tu day  -->
            <div class="row" id="row">
                <!-- <div class="shop-title">
                    <h4>Shop Name</h4>
                </div> -->
                <div class="product-item">
                    <div class="product-item-inner">
                        <div class="product-item-left">
                            <label for="checkbox">
                                <input type="checkbox" value="on" aria-checked="false">
                            </label>
                            <div class="product-img">
                                <img src="deal-img.jpg" alt="Product-1">
                            </div>
                            <div class="product-detail">
                                Name: 
                            </div>
                      </div>
                      <div class="product-item-middle">
                          <div class="price">
                              $300
                          </div>
                          <div class="operation">
                              <button type="button" class="btn btn-danger">Remove</button>
                          </div>
                      </div>
                      <div class="product-item-right">
                        <label for="amount">Amount</label>
                            <div class="quantity">
                                <input type="number" value="1" class="quantity-input">
                            </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- den day -->
          </div>

            <div class="row" id="container_r">
                <label for="total-price">Total Price:</label>
                <h5 class="text-left" id="total">$4678</h5>
                <button type="submit" name="buy" class="btn-purchase">Confirm to Buy</button>
            </div>
        </form>
    </div>

</body>
</html>

