<?php
require('login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP Login Form</title>
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
      <h4 class="text-center">Welcome To Lazada! Please Login</h4>
      <?php if(isset($msg)){?>
        <p class="text-success text-center"><?php echo $msg; ?></p> 
      <?php } ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!--//User's name//-->
        <div class="form-group">
          <label for="uname">User Name</label>
            <input type="text" class="form-control" placeholder="Enter User Name" name="user_name" value="<?php echo $_userName;?>">
        </div>
        <!--//Password//-->
        <div class="form-group">
          <label for="pwd">Password:</label>
            <input type="password" class="form-control"  placeholder="Enter password" name="password">
        </div>
        <!--//User role//-->
        <div class="form-group">
            <label for="role">You are: </label>
            <select name="role" id="role">
              <option value="customers">Customers</option>
              <option value="vendors">Vendors</option>
              <option value="shippers">Shippers</option>
            </select>
          </div>

        <button type="submit" class="btn btn-info" name="submit">Sign in</button>
      </form>
      <div class="login-link">
        Not a member? <a href="reg-c-page.html">Register now!</a>
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

