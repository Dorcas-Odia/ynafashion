<!-- connect file-->
<?php  
   include('includes/connect.php');
   include('functions/common_function.php');
   session_start();
 ?>
<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>YnaFashion | Ecommerce Website Design</title>
      <link rel="stylesheet" href="style.css">
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
    </style>
 
    </head>

<body>
<div class="header">
<!-- Navbar -->
<div class="containor-fluid "></div>
<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.html"><img src="images/logo.png (2).png" 
  alt="Logo" width="150px" class="d-inline-block align-text-top"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <img src="images/burger-menu.png" width="30px" height="30px">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <?php
         if(isset($_SESSION['username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
         }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
         }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:$<?php total_cart_price();?></a>
        </li>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-1" type="search" placeholder="Search" 
        aria-label="Search" name="search_data" width="150px">
         <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
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

<!--third child-->
<div class="container">
<div class="row" > 
        <div class="col-md-6 ">
            <h1 class="text-center"> Welcome to YnaFashion!!</h1>
              <p class="text-center"> we are Open 24/24 <br>
                and we are here at your service</br>you do your 
                choice we make it happen</p>
                 <button class="btn btn-outline-info px-4 ml-4" type="submit"><a class="nav-link"href="product.php" >Explore Now &#8594;</a></button>
            
        </div>
        <div class="col-md-6">
           <img id="image" class="img-fluid" src="images/coupleshoping (2).png"  >

        <script> 
            const imageUrls = ['images/coupleshoping (2).png','images/coupleshoping1 (2).png']; 
           
            let index = 0; 
            function changeImage()
             { 
              document.getElementById('image').src = imageUrls[index]; 
              index = (index + 1) % imageUrls.length; 
             } 
            setInterval(changeImage, 5000); 
        </script> 
        </div>
      </div>
</div>

</div>

<!------Featured Categories--------->
<div class="small-small-container">
      <h1 style="text-align: center;">Shop with us</h1>
      <p style="text-align: center;">Handpicked Favourites just for you</p>
  </div>
<div class="row ">
   <div class="col mr-2">
       <a href="#" ><img src="images/womenwatch.PNG" alt="Watch" width="280px" height="280px" class="wdn-stretch rounded-corners"> </a>
      <!--<a href="#" class="btn btn-outline-dark"> Watches </a>-->
    </div>
    <div class="col mr-2">
      <a href="#" ><img src="images/ladydress1.PNG" alt="Dresse" width="280px" height="280px" class="wdn-stretch rounded-corners"></a>
     <!--<a href="#" class="btn btn-outline-info" > Dresses </a>-->
    </div>

    <div class="col mr-2">
      <a href="#" ><img src="images/ladyshoes2.PNG" alt="Lady Shoes" width="280px" height="280px" class="wdn-stretch rounded-corners"></a>
     <!-- <a href="#" class="btn btn-outline-info"> Shoes </a>-->
    </div>
    <div class="col mr-2">
        <a href="#" ><img src="images/mensuite1.PNG" alt="Suite" width="280px" height="280px" class="wdn-stretch rounded-corners"></a>
    </div>
</div>
           
 <div class="row">
  
     <?php 
      getcaterogies();
       ?>
 </div>
    

<!------- Products ------>
<div class="row" >
  <!-- Fourth child-->
<?php
//calling function
   getproducts();
   get_unique_categories();
   //$ip = getIPAddress();  
  //echo 'User Real IP Address - '.$ip; 
?>

</div>

<!---------- Offer ------>

<div class="offer">
     <div class="small-container">
         <div class="row">
             <div class="col-2">
                <img src="images/exclusiveitems-removebg-preview.png" class="offer-img">
             </div>
             <div class="col-2">
                <p>Exclusively Available on YnaFashion</p>
                 <h2 class="text-center">Smart Band 4</h2>
                 <small>The best product we have in the our shop and at only 30% discount you will not be disappoint.
                 </br>
                 </small>
                 <button class="btn btn-outline-info" type="submit">Buy Now &#8594;</button>
                 <!--<a href="" class="btn"> Buy Now &#8594;</a>-->
            </div>
         </div>
      </div>
</div>
<!---------- testimonial ---------->
<div class="testimonial">
  <div class="small-container">
      <div class="row">
         <div class="col-3"> 
              <i class="fa fa-quote-left"></i>
              <p class="text-center">“I just wanted to share a quick note and let </br>
                 you know that you guys do a really good job.</br>
                  I am glad I decided to buy here.</br>
                  I never have any problem at all.</br>
              </p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user1.PNG">
            <h3>Sion Kalenga</h3>
        </div>
       <div class="col-3">
          <i class="fa fa-quote-left"></i>
           <p class="text-center">“I am glad I decided to buy here.</br>
               I never have any problem at all.</br>
               I am glad I decided to buy here.</br>
               I never have any problem at all.</br>
            </p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user2.PNG">
            <h3>Aniel Odia</h3>
        </div>
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p class="text-center">“ I never have any problem at all ordering</br>
              here the services are always good </br>
              and ready to serve.</br>
              Ihave never got disappointed.
            </p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user3.PNG">
            <h3>Joseph Kazadi</h3>
        </div>
    </div>
  </div>
</div>
<!---------------- footer --------------->
<?php 
 include("./includes/footer.php");
?>
  
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>

</body>
</html>
