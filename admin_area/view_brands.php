<h3 class="text-center text-success">Brands</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-warning text-center">
    <tr>
      <th>Sl.no</th>
      <th>Brand Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody class="text-center">
    
    <?php 
      $select_brand="Select * from `brands`";
      $result=mysqli_query($con,$select_brand);
      $number=0;
      while($row=mysqli_fetch_assoc($result)){
        $brand_id=$row['brand_id'];
        $brand_title=$row['brand_title'];
        $number++;
    ?>
    <tr>
      <td><?php echo $number;?></td>
      <td><?php echo $brand_title;?></td>

      <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>

      <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <?php 
    //closing while loop
      } 
    ?> 
  </tbody>
</table>

<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Please Confirm</h4>
      </div>
      <div class="modal-footer">
        <!-- NO button Model bootstrap -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_brands" class="text-dark text-decoration-none"></a>No</button>
         <!-- Yes button Model bootstrap -->
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>