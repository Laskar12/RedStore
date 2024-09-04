<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User -Login</title>

   <!------ bootstrap CSS link ------>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
    .logo{
      width: 7%;
      height: 7%;
    }

    body{
      overflow-x:hidden;
    }
   </style>

</head>
<body>

<div class="container-fluid p-0">

<!------ First Child ------->

  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid">
  <img src="../Images/logo.png" class="logo">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact.php">Contact</a>
      </li>
    </ul>
  </div>
</div>
</nav>


  <div class="container my-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post">
          <!-- Username field -->
          <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off" required="required" name="user_username">
          </div>
          <!-- password field -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password">
          </div>

          
          <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="bg-warning py-2 px-3 border-0" name="user_login">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
              <a href="user_registration.php" class="text-danger">
                Register</a></p>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php 
  if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    //select the username from the user table.
    $select_query="Select * from `user_table` where user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart items
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if($row_count>0){
      $_SESSION['username']= $user_username;
      if(password_verify($user_password,$row_data['user_password'])){
        if($row_count==1 and $row_count_cart==0){
          $_SESSION['username']= $user_username;
          echo "<script>alert('Login Successful')</script>";
          echo "<script>window.open('profile.php','_self')</script>";
        }else{
          $_SESSION['username']= $user_username;
          echo "<script>alert('Login Successful')</script>";
          echo "<script>window.open('payment.php','_self')</script>";
        }
      }else{
        echo "<script>alert('Invalid Credential')</script>";
      }
    }else{
      echo "<script>alert('Invalid Credential')</script>";
    }
  }
?>