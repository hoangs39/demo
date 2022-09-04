<?php
    require('login_check.php');
    if(isset($_POST['act'])){
        if(isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == UPLOAD_ERR_OK){
            $newlocation = '#';
            move_uploaded_file($_FILES['profile_img']['tmp_name'], $newlocation);
            // + luu file vao database
            // cach sua 1 phan tu cua array trong file ma k bi xao hay ghi de
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP My Account Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--bootstrap5 library linked-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/my-account.css">
<body>
<?php
  session_start();
  if (isset($_SESSION['userdata']['username'])){
    require('logedinheader.php');
  }
?>
    <div class="container-fluid">
        <h2 class="text-center">My Account Page</h2>

        <div class="row">
            <img src="deal-img.jpg" alt="Profile's Image"/>
            <form action="#" method="post" name="act">
                <input type="file" name="product_img" enctype='multipart/form-data'>
                <button type ="submit">Change Image</button>
            </form>
        </div>

        <table class="table table-primary table-hover table-responsive table-bordered">
            <tr>
                <th><p class="text-center">My Information:</p></th>
            </tr>
            <tr>
                <td>Name: <?php if(!(strcmp($name,"")==0)){
                    echo $name;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
            <tr>
                <td>Address: <?php if(!(strcmp($name,"")==0)){
                    echo $address;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
            <tr>
                <td>User's Name: <?php if(!(strcmp($name,"")==0)){
                    echo $user_name;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
            <tr>
                <td>Business's Name: <?php if(!(strcmp($name,"")==0)){
                    echo $bName;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
            <tr>
                <td>Business's Address: <?php if(!(strcmp($name,"")==0)){
                    echo $bAddress;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
            <tr>
                <td>Registered Distribution Hub: <?php if(!(strcmp($name,"")==0)){
                    echo $distribution;
                }else {
                    echo "Empty.";
                }
                 ?></td>
            </tr>
        </table>
        <div class="row">
            <div class="btn btn-danger">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
<?php
    require('footer.php')
?>
</body>
</html>

