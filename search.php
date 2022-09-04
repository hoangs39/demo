<?php



function s_search($s_product_name){
extract($_POST);
if(isset($_POST['search'])){
    $search_name = $_POST['search_name'];
    $pattern = "/".$search_name."/";
    return preg_match($pattern,$s_product_name);
}
}


function s_filter($s_price){
    extract($_POST);
    if(isset($_POST['filter'])){
        if(isset($_POST['max'])){
            $max_price = $_POST['max'];
        }else{
            $max_price = 0;
        }
        if(isset($_POST['min'])){
            $min_price = $_POST['min'];
        }else{
            $min_price = 0;
        }
        $price = 1;
        if($s_price >= $min_price && $s_price <= $max_price){
            return true;
        }
        else return false;
    }
    return false;
}
?>