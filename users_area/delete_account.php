<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Account</title>
</head>
<body>
  <h2 class="text-danger mb-4">Delete Account</h2>
  <form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
      <input type="submit" class="form-control w-50 m-auto" name="delete" value="Yes">
    </div>
    <div class="form-outline mb-4">
      <input type="submit" class="form-control w-50 m-auto" name="dont delete" value="No">
    </div>
  </form>
</body>
</html>

<?php 
  $username_session=$_SESSION['username'];
  if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where user_name='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
      session_destroy();
      echo "<script>alert('Account Deleted Successfully')</script>";
      echo "<script>window.open('../index.php','_self')</script>";
    }
  }
  if(isset($_POST['dont delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
  }

?>