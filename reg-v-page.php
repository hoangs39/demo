<?php
require('registration.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP Registration Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--bootstrap5 library linked-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php
  require('header.php');
?>
<!-- all -->
<div class="container-fluid">
  <div class="row">
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center">Create a New Vendor Account</h4>
      <p class="text-success text-center"><?php echo $register; ?></p> 

      <section>
        <ul class="pagination pagination-sm justify-content-center">
          <li class="page-item"><a href="reg-c-page.html" class="page-link">Customers</a></li>
          <li class="page-item"><a href="#" class="page-link">Vendors</a></li>
          <li class="page-item"><a href="reg-s-page.html" class="page-link">Shippers</a></li>
        </ul>
      </section>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!--//User's name//-->
        <div class="form-group">
          <label for="uname">User Name</label>
            <input type="text" class="form-control" id="user_name" placeholder="Enter User Name" name="user_name" value="<?php echo $_userName;?>">
            <p class="err-msg"><?php if($userNameErr!=1){ echo $userNameErr; }?></p>
        </div>
        <!--//Password//-->
        <div class="form-group">
          <label for="pwd">Password:</label>
            <input type="password" class="form-control"  id="password" placeholder="Enter password" name="password">
            <p class="err-msg"><?php if($passErr!=1){ echo $passErr; } ?></p>
        </div>
        <!--//Business name//-->
        <div class="form-group">
          <label for="name"> Business Name:</label>
          <input type="text" class="form-control" id="b_name" placeholder="Enter Your Name" name="b_name" value="<?php echo $_Name;?>">
          <p class="err-msg"><?php if($nameErr!=1){ echo $nameErr; } ?></p>
        </div>
        <!--// Business address//-->
        <div class="form-group">
          <label for="address">Business Address:</label>
          <input type="text" class="form-control" id="b_address" placeholder="Enter email" name="b_address" value="<?php echo $_address;?>">
          <p class="err-msg"><?php if($addressErr!=1){ echo $addressErr; } ?></p>
        </div>

        <!--//Profile img//-->
        <div class="form-group">
          <label for="img">Profile Image:</label>
          <input type="file" class="form-control" name="profile_img" enctype='multipart/form-data'>
        </div>

        <button type="submit" class="btn btn-danger" name="submit">Register Now</button>
      </form>

      <div class="login-link">
        Already a member? <a href="login-page.html">Login now!</a>
      </div>

      <div class="link">
        <a href="index.html">Back To Home Page!</a>
      </div>

    </div>
  </div>
</div>
<?php
require('footer.php')
?>
</body>
</html>

