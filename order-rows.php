<div class="row" id="row">
    <div class="shop-title">
        <h4>Customer's Name: <?php echo $name;?></h4>
        <p>Address: <?php echo $address;?></p>
    </div>

    <div class="product-item">
        <div class="product-item-inner">
            <div class="product-item-left">
                <div class="product-img">
                    <a href="">
                        <img src="<?php echo $product_img_src?>" alt="<?php echo $product_name;?>">
                    </a>
                </div>
                <div class="product-detail">
                    <a href="orderdetail-page.php?choice=<?php echo $product_name?>">
                        <span>Product's Name: <?php echo $product_name;?></span>
                    </a>
                </div>
            </div>
            <div class="product-item-middle">
                <div class="price">
                    <p>Price: <?php echo $price;?></p>
                </div>
            </div>
            <div class="product-item-right">
                <div class="quantity">
                    <label for="amount">Amount</label>
                        <p class="text-left"><?php echo $quantity;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
