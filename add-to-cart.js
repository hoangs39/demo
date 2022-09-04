
if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded',ready);
}
else{
    ready();
}
function ready(){
    let remove = document.getElementsByClassName('btn-danger');
    console.log(remove);
    for (let i = 0; i < remove.length ; i++){
        let button = remove[i];
        button.addEventListener('click',remove_items);
    }

    let quantityInputs = document.getElementsByClassName('quantity-input');
    for (let i = 0; i < quantityInputs.length ; i++){
        let input = quantityInputs[i];
        input.addEventListener('change',quantity_changed);
    }
    read_and_add();
    document.getElementsByClassName("btn-purchase")[0].addEventListener('click',purchase_clicked)
}
function purchase_clicked(){
    alert("Thank you for your purchase");
    let cartItems = document.getElementById('container_l')[0];
    while(cartItems.hasChildNodes()){
        cartItems.remove(cartItems.firstChild);
    }
    update_total();
}

function quantity_changed(event){
    let input = event.target;
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1;
    }
    update_total();
}
function remove_items(event){
    let buttonClicked = event.target;
    let productItem = buttonClicked.parentElement.parentElement;
    let title = productItem.getElementsByClassName('product-detail')[0].innerText;
    let productName = JSON.parse(window.localStorage.getItem('product'))['name'];
    if(title == productName){
        window.localStorage.removeItem('product');
    }
    productItem.remove();
    update_total();
}

function update_total(){
    let cartItemContainer = document.getElementById('container_l')[0];
    let cartRows = cartItemContainer.getElementsByClassName('row');
    let total = 0;
    for (let i = 0; i < cartRows.length ; i++){
        let cartRow = cartRows[i];
        let priceElement = cartRow.getElementsByClassName('price')[0];
        let quatityElement = cartRow.getElementsByClassName('quantity')[0];
        // console.log(priceElement,quatityElement);
        let price = parse.Float(priceElement.innerText.replace('$',''));
        let quantity = quatityElement.value;
        console.log(price * quantity);
        console.log(price);
        total = total + (price * amount);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsById('total')[0].innerText = '$' + total;

}

// file read here => add component to function shopping cart
function read_and_add(){
    let title = JSON.parse(window.localStorage.getItem('product'))['name'];
    let price = JSON.parse(window.localStorage.getItem('product'))['productPrice'];
    let imgSrc = JSON.parse(window.localStorage.getItem('product'))['src'];
    add_to_shopping_cart(title,price,imgSrc);
}

function add_to_shopping_cart(title,price,imgSrc){
    let cartItems = document.getElementsById('container_l')[0];
    let cartRow = document.createElement('div');
    cartRow.classList.add('row');

    // check the name of product in the array
    let cartItemsNames = document.getElementsByClassName('product-detail');
    for (let i = 0; i < cartItemsNames.length ; i++){
        if(cartItemsNames[i].innerText == title){
            alert("this item is already added to the cart!");
            return;
        }
    }

    let cartRowContents = `
    <div class="product-item">
        <div class="product-item-inner">
            <div class="product-item-left">
                <label for="checkbox">
                    <input type="checkbox" value="on" aria-checked="false">
                </label>
                <div class="product-img">
                    <img src="${imgSrc}" alt="Product-1">
                </div>
                <div class="product-detail">
                    ${title}
                </div>
            </div>
            <div class="product-item-middle">
                <div class="price">
                    ${price}
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
    `
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click',remove_items);
    cartRow.getElementsByClassName('quantity')[0].addEventListener('change',quantity_changed);
}