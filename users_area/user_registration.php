<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User -registration</title>

   <!------ bootstrap CSS link ------>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

   <link rel="stylesheet" href="../style.css">

   <style>
    .logo{
      width: 7%;
      height: 7%;
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

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  </ul>
</nav>

  <div class="container my-3">
    <h2 class="text-center">User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">
          <!-- Username field -->
          <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off" required="required" name="user_username">
          </div>
          <!-- email field -->
          <div class="form-outline mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="Enter Email" autocomplete="off" required="required" name="user_email">
          </div>
          <!-- image field -->
          <div class="form-outline mb-4">
            <label for="user_image" class="form-label">Image</label>
            <input type="file" id="user_image" class="form-control" required="required" name="user_image">
          </div>
          <!-- password field -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password">
          </div>
          <!-- confirm password field -->
          <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-label">Confirm Password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password">
          </div>
          <!-- Address field -->
          <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required" name="user_address">
          </div>
          <!-- Contact field -->
          <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact</label>
            <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Number" autocomplete="off" required="required" name="user_contact">
          </div>
          <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-warning py-2 px-3 border-0" name="user_register">
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
              <a href="user_login.php" class="text-danger">
                Login</a></p>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php 
  if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username']; 
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    //redundancy
    $select_query="Select * from `user_table` where user_name='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);

    if($rows_count>0){
      echo "<script>alert('Username/Email already exist')</script>";
    }
    else if($user_password!=$conf_user_password){
      echo "<script>alert('Password do not match')</script>";
    }
    
    else{
     //insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    $insert_query="insert into `user_table`(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";

    $sql_execute=mysqli_query($con,$insert_query);
    }

    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
      $_SESSION['username']= $user_username;
      echo "<script>alert('You have items in your cart')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }else{
      echo "<script>window.open('../index.php','_self')</script>";
    }
  }

?>