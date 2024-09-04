<?php 
  if(isset($_GET['delete_users'])){
    $delete_users=$_GET['delete_users'];
    
    //delete query
    $delete_query="Delete from `user_table` where user_id =$delete_users";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
      echo "<script>alert('Successfully deleted')</script>";
      echo "<script>window.open('./index.php','_self')</script>";
    }
  }
?>