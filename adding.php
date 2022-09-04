<?

// by default, error messages are empty
$adding=$valid=$productnameErr=$priceErr=$descriptionErr='';


extract($_POST);
if(isset($_POST['submit'])){

    //input fields are Validated with regular expression
   $minMaxProductName = "/.{10,20}/";
   $maxFiveHundredChar = "/.{0,500}/";

   if(isset($_POST['product_name'])){
    $product_name = $_POST['product_name'];
   }else{
    $product_name = '';
   }
   if(isset($_POST['price'])){
    $price = $_POST['price'];
   }else{
    $price = -1;
   }
   if(isset($_POST['description'])){
    $description = $_POST['description'];
   }else{
    $description = '';
   }
   if(isset($_FILES['product_img']) && $_FILES['product_img']['error'] == UPLOAD_ERR_OK){
    $img_src = $_FILES['product_img']['tmp_name'];
    }else{
        $img_src="#";
    }
//  Product Name Validation
if(empty($product_name)){
    $productnameErr="Product name Name is Required"; 
 }
 else if (!preg_match($minMaxProductName,$product_name)) {
    $productnameErr="Lenthg is not suitable!";
 }else{
    $productnameErr=true;
 }
 // price validation 
if(empty($price)){
    $price="Price is required!"; 
  } 
  elseif ($price < 0) {
    $priceErr="The price is not suitable!";}
  else{
     $priceErr=true;
}

 // description validation 
 if(empty($description)){
    $descriptionErr="No Created Description!"; 
  } 
  elseif (!preg_match($maxFiveHundredChar,$description)) {
    $descriptionErr="length is not suitable!";}
  else{
     $descriptionErr=true;
}


if($productnameErr==1 && $descriptionErr==1 && $priceErr ==1 )
{
    $product_name =legal_input($product_name);
    $price  =legal_input($price);
    $description = legal_input($description);
    $adding = adding($product_name,$price,$description,$img_src);

}else{
    $product_name = $description = "";
    $price = -1;
}
}
// convert illegal input value to legal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function adding($product_name,$price,$description,$img_src){
  session_start();
  $username = $_SESSION['userdata']['username'];
  $product = [
      'owner' => $username,
      'productname' => $product_name,
      'price' => $price,
      'product_img_src' => $img_src,
      'description' => $description
  ];
  $_SESSION['products'][] = $product;
  $file_name = 'products.csv';
  $f = fopen($file_name, 'w');
  flock($f, LOCK_EX);
  $fields = ['productname', 'price', 'product_img_src', 'description'];
  fputcsv($f, $fields);
  if (is_array($_SESSION['products'])) {
      foreach ($_SESSION['products'] as $product) {
        // for the sizes, store them as a comma separated string
        fputcsv($f, $product);
      }
  }
  flock($f, LOCK_UN);
  fclose($f);
}

?>