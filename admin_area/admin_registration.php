<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration</title>

  <!-- bootstrap css link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  


   <!------ font awesome link ------>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
    body{
    
    }
   </style>
</head>
<body>
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 col-xl-5">
          <img src="../Images/admin6.jpg" alt="Admin Registration" class="img-fluid">
      </div>
      <div class="col-lg-6 col-xl-4">
          <form action="" method="post">
            <div class="form-outline mb-4">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter username" required="required" autocomplete="off"  class="form-control">
            </div>
            <div class="form-outline mb-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter password" required="required" autocomplete="off"  class="form-control">
            </div>
            <div class="form-outline mb-4">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter password" required="required" class="form-control">
            </div>
            <div>
              <input type="submit" class="bg-warning py-2 px-3 border-0" name="admin_registration" value="Register">
              <p class="small fw-bold mt-2 pt-1"> Account already exist? <a href="admin_login.php" class="link-danger">Login</a></p>
            </div>
          </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php 
  if(isset($_POST['admin_registration'])){
    $username=$_POST['username']; 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    //$user_ip=getIPAddress();

    //redundancy
    $select_query="Select * from `admin_table` where admin_name='$username' or admin_email='$email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);

    if($rows_count>0){
      echo "<script>alert('Admin/Email already exist')</script>";
    }
    else if($password!=$confirm_password){
      echo "<script>alert('Password do not match')</script>";
    }
    
    else{
      //insert query
      $insert_query="insert into `admin_table`(admin_name,admin_email,admin_password) values ('$username','$email','$hash_password')";

      $sql_execute=mysqli_query($con,$insert_query);
      if($sql_execute){
        echo "<script>alert('Welcome $username')</script>";
        echo "<script>window.open('/admin_area/index.php','_self')</script>";
      }else{
        echo "<script>alert('Invalid')</script>";
      }
    }

    /*$select_cart_items="Select * from `user_orders` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    
    if($rows_count>0){
      $_SESSION['username']=$username;
      echo "<script>alert('You have orders to fullfill')</script>";
      echo "<script>window.open('./list_orders.php','_self')</script>";
    }else{
      echo "<script>window.open('./index.php','_self')</script>";
    }*/
  }

?>