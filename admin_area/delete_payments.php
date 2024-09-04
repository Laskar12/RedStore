<?php 
  if(isset($_GET['delete_payments'])){
    $delete_payments=$_GET['delete_payments'];
    
    //delete query
    $delete_payment="Delete from `user_payments` where payment_id =$delete_id";
    $result_payment=mysqli_query($con,$delete_payment);
    if($result_payment){
      echo "<script>alert('Successfully deleted')</script>";
      echo "<script>window.open('./index.php','_self')</script>";
    }
  }
?>