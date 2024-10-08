<!-- connect file -->
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
  <title>Welcome <?php echo $_SESSION['username']?></title>

  <!------ bootstrap CSS link ------>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!------ font awesome link ------>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!------ css file ------->

  <link rel="stylesheet" href="../style.css">

  <style>

  .card-img-top{
  width:100%;
  height:200px;
  object-fit: contain;
  }

  body{
    overflow-x: hidden;
  }

  .profile_img{
  width: 90%;
  margin:auto;
  display:block;
  height: 100%;
  object-fit:contain;
  }

  .edit_image{
    width:100px;
    height:100px;
    object-fit:contain;
  }

  </style>

</head>
<body>

  <!------ navbar ------>

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
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <!-- Search Button -->
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        
        <input type="submit" value="Search" class="btn btn-outline-light"name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php 
  cart();
?>

  
<!------ Second Child ------>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <?php 
    //displaying username
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
    //displaying login or logout
      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
      </li>";
      }
    ?>
  </ul>
</nav>

<!------ Third Child ------>

<div class="bg-light">
  <h3 class="text-center">RedStore</h3>
  <p class="text-center">Explore and Shop Your Favorites at Our Online Store!</p>
</div>

<!------ Fourth Child  ------>
      <div class="row">
        <div class="col-md-2">
          <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
            <li class="nav-item bg-warning">
              <a href="" class="nav-link text-light"><h4>My Account</h4></a>
            </li>

            <?php  
              $username=$_SESSION['username'];
              $user_image="Select * from `user_table` where user_name='$username'";
              $user_image=mysqli_query($con,$user_image);
              $row_image=mysqli_fetch_array($user_image);
              $user_image=$row_image['user_image'];
              echo "<li class='nav-item'>
              <img src='./user_images/$user_image' alt='' class='profile_img my-2'>
            </li>";
            ?>

            
            <li class="nav-item">
              <a href="profile.php" class="nav-link text-light">Pending</a>
            </li>
            <li class="nav-item">
              <a href="profile.php?edit_account" class="nav-link text-light">Edit</a>
            </li>
            <li class="nav-item">
              <a href="profile.php?my_orders" class="nav-link text-light">Orders</a>
            </li>
            <li class="nav-item">
              <a href="profile.php?delete_account" class="nav-link text-light">Delete</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link text-light">Logout</a>
            </li>
          </ul>
        </div>

        <div class="col-md-10 text-center">
        <?php
          get_details();

          if(isset($_GET['edit_account'])){
            include('edit_account.php');
          }
          
          if(isset($_GET['my_orders'])){
            include('user_orders.php');
          }
          if(isset($_GET['delete_account'])){
            include('delete_account.php');
          }
        ?>
        </div>
      </div>


<!------ last child, include footer------>
  <?php 
    include("../includes/footer.php")
  ?>


  <!------- bootstrap js link ------>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>