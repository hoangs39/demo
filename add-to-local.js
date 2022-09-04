if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded',ready);
}
else{
    ready();
}

function ready(){
    let addToCart = document.getElementsById('to-cart');
    for (let i = 0; i < addToCart.length ; i++){
        let button = addToCart[i];
        button.addEventListener('click',add_clicked);
    }
}

// file write to local storage
function add_clicked(event){
    let button = event.target;
    let productItem = button.parentElement.parentElement;
    let title = productItem.getElementsByClassName('title')[0].innerText;
    let price = productItem.getElementsByClassName('product-price')[0].innerText;
    let imgSrc = productItem.getElementsByClassName('img-src')[0].src;
    // replace by file write;
    let product = {
        name: `${title}`,
        productPrice: `${price}`,
        src: `${imgSrc}`
    }
    window.localStorage.setItem('product',JSON.stringify(product));
}