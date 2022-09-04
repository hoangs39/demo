<?php
// by default, error messages are empty
$register1=$register=$valid=$usernameErr=$passErr=$addressErr=$nameErr=$bnameErr=$baddressErr='';


extract($_POST);
if(isset($_POST['submit'])){

    //input fields are Validated with regular expression
   $validUserName="/^[a-zA-Z0-9]*$/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minMaxUserName = "/.{8,15}/";
   $minFiveChar = "/.{5,}/";
   $minAndMaxPass = "/.{8,20}/";
   $user_name = $_POST['user_name'];
   $password = $_POST['password'];
   if(isset($_POST['name'])){
    $name = $_POST['name'];
   }else{
    $name = '';
   }
   if(isset($_POST['address'])){
    $address = $_POST['address'];
   }else{
    $address = '';
   }
   if(isset($_POST['bName'])){
    $bName = $_POST['bName'];
   }else{
    $bName = '';
   }
   if(isset($_POST['bAddress'])){
    $bAddress = $_POST['bAddress'];
   }else{
    $bAddress = '';
   }
   if(isset($_POST['distribution'])){
    $distribution = $_POST['distribution'];
   }else{
    $distribution = '';
   }
   if(isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == UPLOAD_ERR_OK){
    $img_src = $_FILES['profile_img']['tmp_name'];
    }else{
        $img_src="#";
    }
//  User Name Validation
if(empty($user_name)){
    $usernameErr="User Name is Required"; 
 }
 else if (!preg_match($validUserName,$user_name) || !preg_match($validUserName,$minMaxUserName)) {
    $usernameErr="Wrong format!";
 }else{
    $usernameErr=true;
 }
 // password validation 
if(empty($password)){
    $passErr="Password is Required"; 
  } 
  elseif (!preg_match($uppercasePassword,$password) || !preg_match($lowercasePassword,$password) || !preg_match($digitPassword,$password) || !preg_match($symbolPassword,$password) || !preg_match($minAndMaxPass,$password) || preg_match($spacesPassword,$password)) {
    $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no other kind of characters and minimum 8 length and maximum 20 lenght";
  }
  else{
     $passErr=true;
  }


//  customers
if (!preg_match($minFiveChar,$name) || !preg_match($minFiveChar,$address)) {
    $nameErr="Wrong format!";
    $addressErr="Wrong format!";
 }else{
    $nameErr=true;
    $addressErr=true;
}
//  vendors 
if (!preg_match($minFiveChar,$bName) || !preg_match($minFiveChar,$bAddress)) {
    $bnameErr="Wrong format!";
    $baddressErr="Wrong format!";
 }else{
    $bnameErr=true;
    $baddressErr=true;
}

if($usernameErr==1 && $passErr==1)
{
    if(($nameErr == 1 && $addressErr == 1)){
        $name =legal_input($name);
        $address =legal_input($address);
    }
    if(($bnameErr == 1 && $baddressErr == 1)){
        $bName =legal_input($bName);
        $bAddress =legal_input($bAddress);
    }
    $user_name =legal_input($user_name);
    $password  =legal_input($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // check unique email
    $checkUserName=unique_user_name($user_name); // false => k trung
    $checkBAdress=unique_b_address($user_name);
    $checkBName=unique_b_name($user_name);
        if($checkUserName)
        {
          $register=$user_name." is already exist";
        }else{
           if(strcmp($bAddress,'') == 0 && strcmp($bName,'') == 0){
            $register = register($user_name,$password,$name,$address,$bName,$bAddress,$distribution,$img_src);
           }else{
                if($checkBAdress || $checkBName){
                    $register1 = "Business Name or Business Address is already exist!";
                }
                else{
                    $register = register($user_name,$password,$name,$address,$bName,$bAddress,$distribution,$img_src);
                }
           }
        }

}else{
    $user_name = $password = "";
    if(($nameErr == 1 && $addressErr == 1)){
        $name = $address ="";
    }
    if(($bnameErr == 1 && $baddressErr == 1)){
        $bName = $bAddress = "";
    }
}
}
// convert illegal input value to legal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

// file handling functions
function unique_user_name($user_name){
    $file_name = 'users.csv';
    $fp = fopen($file_name, 'r');
    // first row => field names
    $first = fgetcsv($fp);
    // start - second line because the pointer is in the second
    while ($row = fgetcsv($fp)) {
      $i = 0;
      $user = [];
      foreach ($first as $col_name) {
        $user[$col_name] =  $row[$i];
        if(strcmp($user['username'],$user_name) == 0){
            fclose($fp);
            return true;
        }else{
            fclose($fp);
            return false;
        }
        $i++;
      }
    }
}
function unique_b_name($bName){
    $file_name = 'users.csv';
    $fp = fopen($file_name, 'r');
    // first row => field names
    $first = fgetcsv($fp);
    // start - second line because the pointer is in the second
    while ($row = fgetcsv($fp)) {
      $i = 0;
      $user = [];
      foreach ($first as $col_name) {
        $user[$col_name] =  $row[$i];
        if(strcmp($user['bname'],$bName) == 0){
            fclose($fp);
            return true;
        }else{
            fclose($fp);
            return false;
        }
        $i++;
      }
    }

}
function unique_b_address($bAddress){
    $file_name = 'users.csv';
    $fp = fopen($file_name, 'r');
    // first row => field names
    $first = fgetcsv($fp);
    // start - second line because the pointer is in the second
    while ($row = fgetcsv($fp)) {
      $i = 0;
      $user = [];
      foreach ($first as $col_name) {
        $user[$col_name] =  $row[$i];
        if(strcmp($user['baddress'],$bAddress) == 0){
                    fclose($fp);
                    return true;
                }else{
                    fclose($fp);
                    return false;
                }
        $i++;
      }
    }
}

function register($user_name,$password,$name,$address,$bName,$bAddress,$distribution,$img_src){
    session_start();
    $user = [
        'username' => $user_name,
        'password' => $password,
        'name' => $name,
        'address' => $address,
        'bname' => $bName,
        'baddress' => $bAddress,
        'distribution' => $distribution,
        'img_src' => $img_src
    ];
    $_SESSION['users'][] = $user;
    $file_name = 'users.csv';
    $f = fopen($file_name, 'w');
    flock($f, LOCK_EX);
    $fields = ['username', 'password', 'name', 'address', 'bname', 'baddress', 'distribution', 'img_src'];
    fputcsv($f, $fields);
    if (is_array($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
          // for the sizes, store them as a comma separated string
          fputcsv($f, $user);
        }
    }
    flock($f, LOCK_UN);
    fclose($f);
}

?>