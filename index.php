<!-- connect file -->

<?php 
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website</title>

  <!------ bootstrap CSS link ------>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!------ font awesome link ------>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!------ css file ------->

  <link rel="stylesheet" href="./style.css">

  <style>
    .card-img-top{
      width:100%;
      height:200px;
      object-fit: contain;
      }
  body{
    overflow-x: hidden;
  }
  </style>

</head>
<body>

  <!------ navbar ------>

  <div class="container-fluid p-0">

  <!------ First Child ------->

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <img src="./Images/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php 
           if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
          </li>";
           }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
          </li>";
           }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <!-- Search Button -->
      <form class="d-flex" action="search_product.php" method="get">
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
<div class="row px-1">

  <div class="div col-md-10">

   <!-- Products -->

    <div class="row">

    <!------ Fetching products using php  ------>

      <?php 

      //calling function
        getproducts();  
        get_unique_categories();
        get_unique_brands();
        
        //$ip = getIPAddress();  
        //echo 'User Real IP Address - '.$ip;

      ?>

      <!-- row end -->
    </div>
   <!-- column end -->
  </div>

  <div class="div col-md-2 bg-secondary p-0">
  <!-- brands to be displayed -->
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-dark"><h4>Brands</h4></a>
      </li>

      <!-- Displaying on brand navbar -->
      <?php 

        //calling function
        getbrands();
        

      ?>
    </ul>

  <!--- Categories to be displayed --->

  <ul class="navbar-nav me-auto text-center">
  <li class="nav-item bg-warning">
        <a href="#" class="nav-link text-dark"><h4>Categories</h4></a>
      </li>

  <?php 

  //calling function
    getcategories();

  ?>

    </ul>
  </div>
</div>
</div>

<!------ last child, include footer------>
  <?php 
    include("./includes/footer.php")
  ?>


  <!------- bootstrap js link ------>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>