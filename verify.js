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

function verify(event) {
    let button = event.target;
    let formItem = button.parentElement;
    let pass = formItem.getElementById('password').value;
    let uname = formItem.getElementById('uname').value;
    let name = formItem.getElementById('name').value;
    let address = formItem.getElementById('address').value;
    let bName = formItem.getElementById('b_name').value;
    let bAddress = formItem.getElementById('b_address').value;
    let err = "";

    //input fields are Validated with regular expression
   let validUserName= /^[a-zA-Z0-9]*$/;
   let uppercasePassword = /(?=.*?[A-Z])/;
   let lowercasePassword = /(?=.*?[a-z])/;
   let digitPassword = /(?=.*?[0-9])/;
   let spacesPassword = /^$|\s+/;
   let symbolPassword = /(?=.*?[#?!@$%^&*-])/;
   let minMaxUserName = /.{8,15}/;
   let minFiveChar = /.{5,}/;
   let minAndMaxPass = /.{8,20}/;

  // length
   if(!minAndMaxPass.test(pass) || !uppercasePassword.test(pass) || !lowercasePassword.test(pass) || !digitPassword.test(pass) || !symbolPassword.test(pass) || spacesPassword.test(pass)){
      alert("Wrong Password format!")
   } 
   if(!validUserName.test(uname) || !minMaxUserName.test(uname)){
    alert("Wrong UserName format!")
   }
   if(!minFiveChar.test(name) || !minFiveChar.test(address)){
    alert("Wrong length format in name or address!")
   }
   if(!minFiveChar.test(bName) || !minFiveChar.test(bAddress)){
    alert("Wrong length format in business name or business address!")
   }  
}
