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
  <title>Contact page</title>

  <!------ bootstrap CSS link ------>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!------ font awesome link ------>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!------ css file ------->

  <link rel="stylesheet" href="./style.css">

  <style>

  body{
    overflow-x: hidden;
  }
  .container {
      margin-top: 50px;
    }
    .contact{
      width: 100%;
      object-fit: contain;
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
    
      </ul>
    </div>
  </div>
</nav>

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

<div class="container">
  <h1 class="text-center">Contact Us</h1>
  <p class="text-center mb-5">If you have any questions or concerns, please feel free to reach out to us.</p>

  <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
          
          <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank"><h2 class="text-info">Redstore@gmail.com</h2>
          </a>
          <p>We will try to contact as soon as possible</p>
        </div>
        <div class="col-md-6">
          <a href="" target="_blank"><img src="Images/contact.jpg" class="contact" alt="">
          </a>
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