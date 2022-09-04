<div class="row" id="row">
    <div class="product-item">
        <div class="product-item-inner">
            <div class="product-item-left">
                <label for="checkbox">
                    <input type="checkbox" value="on" aria-checked="false">
                </label>
                <div class="<?php echo $product_img_src?>">
                    <img src="<?php echo $product_img_src?>" alt="<?php echo $product_name?>">
                </div>
                <div class="product-detail">
                    Name: <?php echo $product_name?>
                </div>
            </div>
            <div class="product-item-middle">
                <div class="price">
                    <?php echo $price?>
                </div>
                <div class="operation">
                    <button type="button" name="remove" class="btn btn-danger"><a href="cf-shoppingcart-page.php?choice=<?php echo $product_name?>">Remove it</a></button>
                </div>
            </div>
            <div class="product-item-right">
                <label for="amount">Amount</label>
                    <div class="quantity">
                <p><?php echo $quantity?></p>
            </div>
        </div>
    </div>
</div>