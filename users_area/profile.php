
<!-- connect file-->
<?php  
   include('../includes/connect.php');
   include('../functions/common_function.php');
   session_start();
 ?>
<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>YnaFashion | Ecommerce Website Design</title>
      <link rel="stylesheet" href="../style.css">
      <link href="https://fonts.goolgeapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" 
       rel="stylesheet">
      
      <!--Bootstrap CSS link-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet" 
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous">
      <!-- font awesome link-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" 
          referrerpolicy="no-referrer"/>


          <style>
        body{
            overflow-x: hidden;
        }
        .profile_img{
                width:50%;
                margin:auto;
                display:block;
                height: 50%;
                object-fit: contain;

         }
    </style>
 
    </head>

<body>
<div class="header">
<!-- Navbar -->
<div class="containor-fluid "></div>
<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.html"><img src="../images/logo.png (2).png" 
  alt="Logo" width="150px" class="d-inline-block align-text-top"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="images/burger-menu.png" width="30px" height="30px">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:$<?php total_cart_price();?></a>
        </li>
        <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" 
        aria-label="Search" name="search_data" width="250px">
         <input type="submit" value="search" class="btn btn-outline-light text_center" name="seach_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php
 cart(); 
 ?>

<!--second child-->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
   <ul class="navbar.nav me-auto">
    
    <?php


if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
        <a class='nav-link' href='#'> Welcome Guest</a>
    </li>";
}else{
  echo"<li class='nav-item'>
        <a class='nav-link' href='#'> Welcome  ". $_SESSION['username']."</a>
    </li>";
}

    if(!isset($_SESSION['username'])){
      echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
    </li>";
    }else{
      echo"<li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
    </li>";
    }
    ?>
   </ul>
</nav>
<!-- third child -->

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center " style="height:100vh">
           <li class="nav-item bg-info">
              <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
           </li>
<?php
$username=$_SESSION['username'];
$user_image="SELECT * FROM `user_table` WHERE `username`='$username'";
$user_image=mysqli_query($con, $user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo"<li class='nav-item'>
               <img src='user_images/$user_image' class='profile_img' alt='' >
           </li>";
?>
           <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php">Pending Orders</a>
           </li>
           <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
           </li>
           <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
           </li>
           <li class="nav-item">
              <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
           </li>
           <li class="nav-item">
              <a class="nav-link text-light" href="logout.php">Logout</a>
           </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php
      get_user_order_details();
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
<!---------------- footer --------------->
<?php 
 include("../includes/footer.php");
?>

     <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>


 </body>
</html>