if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded',ready);
  }
  else{
    ready();
  }
  
  function ready(){
    let submit = document.getElementsById('btn-danger');
    for (let i = 0; i < submit.length ; i++){
        let button = submit[i];
        button.addEventListener('click',verify);
    }
}

function verify(event){
    let button = event.target;
    let formItems = button.parentElement.parentElement;
    let formItem = formItems.getElementsById('r');
    let formItem1 = formItems.getElementsById('r1');
    let productName = formItem.getElementsById('product_name').value;
    let price = formItem.getElementsById('price').value;
    let description = formItem1.getElementsById('description').value;


    //input fields are Validated with regular expression
   $minMaxProductName = "/.{10,20}/";
   $maxFiveHundredChar = "/.{0,500}/";

   if(isNaN(price) || price <= 0){
        alert("Wrong Number!")
    }

    if(!$minMaxProductName.test(productName) || !$maxFiveHundredChar.test(description)){
        alert("Be careful about the length of product name or description!")
    }
}