<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-warning text-center">

    <?php 
      $get_users="Select * from `user_table`";
      $result=mysqli_query($con,$get_users);
      $row_count=mysqli_num_rows($result);
      
    if($row_count==0){
      echo "<h2 class='text-danger text-center mt-5'>No User Record</h2>";
    }else{
      echo "<tr>
      <th>Sl.no</th>
      <th>Username</th>
      <th>User email</th>
      <th>User Image</th>
      <th>User address</th>
      <th>User mobile</th>
      <th>Delete</th>
    </tr>
    <tbody class='text-center'>";
      $number=0;
      while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$user_name</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='product_img'></td>
        <td>$user_address</td>
        <td>$user_mobile</td>

        <td><a href='index.php?delete_users=$user_id' type='button' class='text-dark' data-toggle='modal' data-target='#exampleModal' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
      </tr>";
      }
    }
    ?>
    </tbody>
  </thead>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Please Confirm</h4>
      </div>
      <div class="modal-footer">
        <!-- NO button Model bootstrap -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?list_user" class="text-dark text-decoration-none"></a>No</button>
         <!-- Yes button Model bootstrap -->
        <button type="button" class="btn btn-primary"><a href='index.php?delete_users=<?php echo $user_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>