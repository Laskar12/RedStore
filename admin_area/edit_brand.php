<?php 
if(isset($_GET['edit_brand'])){
  $edit_brand=$_GET['edit_brand'];
  $get_brands="Select * from `brands` where brand_id=$edit_brand";
  $result=mysqli_query($con,$get_brands);
  $row=mysqli_fetch_assoc($result);
  $brand_title=$row['brand_title'];
}
  if(isset($_POST['edit_bad'])){
    $bad_title=$_POST['brand_title'];
    $update_query="update `brands` set brand_title='$bad_title' where brand_id=$edit_brand";
    $result_bad=mysqli_query($con,$update_query);
    if($result_bad){
      echo "<script>alert('Updated Successfully')</script>";
      echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
  }

?>

<div class="container mt-5">
  <h1 class="text-center">Edit Brands</h1>
  <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="brand_title" class="form-label">Category Title</label>
      <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title;?>">
    </div>
    <input type="submit" value="Update" class="btn btn-warning px-3 mb-3" name="edit_bad">
  </form>
</div>