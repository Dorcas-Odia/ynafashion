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
      <title>YnaFashion | Ecommerce-cart_deatils</title>
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
            .cart_img{
               width: 80px;
                height: 80px;
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
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
        </li>
        
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
<div class="text-center">
  <h2>Cart details</h2>
  <p class="text-center"> You may choose what you want at the affordable price with YnaFashion</p>
</div>
<!-- third child_table -->
 <form action="" method="post">
  <div class="container">
    <div class="row">
       <table class="table table-bordered text-center">
         
      <!-- php code to display dynamic data -->
       <?php
   global $con;
       $get_ip_address = getIPAddress();
       $total_price=0;
       $cart_query="SELECT * FROM `cart_details` WHERE `ip_address`='$get_ip_address'";
       $result=mysqli_query($con,$cart_query);
       $result_count=mysqli_num_rows($result);
       if($result_count>0){
         echo" <thead>
            <tr>
              <th>Product title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th colspan='2'>Opreations</th>
            </tr>
          </thead>";
       
       while($row=mysqli_fetch_array($result)){
           $product_id=$row['product_id'];
           $select_products="SELECT * FROM `products` WHERE `product_id`='$product_id'";
           $result_products=mysqli_query($con,$select_products);
           while($row_product_price=mysqli_fetch_array($result_products)){
       $product_price=array($row_product_price['product_price']);
       $price_table=$row_product_price['product_price'];
       $product_title=$row_product_price['product_title'];
       $product_image1=$row_product_price['product_image1'];
       $product_values=array_sum($product_price);
       $total_price+=$product_values;
       
       
       ?>
      <tbody>
        <tr>
          <td><?php echo $product_title; ?></td>
          <td><img src="./images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
          <td><input type="text" name="qty"class="form-input w-50"></td>
          <?php
           $get_ip_address = getIPAddress();
           if(isset($_POST['update_cart'])){
            $quantities=$_POST['qty'];
            $update_cart="UPDATE `cart_details` SET `quantity`=$quantities WHERE `ip_address`='$get_ip_address'";
            $result_products_quantity=mysqli_query($con,$update_cart);
            $total_price=$total_price*$quantities;
           }
          ?>
          <td>$ <?php echo $price_table; ?></td>
          <td><input type="checkbox" name="removeitem[]" value=<?php echo $product_id?>/></td>
          <td>
            <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Update</button> -->
            <input type="submit" value="Update Cart" class="bg-info px-2 py-1 mx-1 border-0" 
            name="update_cart">
            
            <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Remove</button> -->
            <input type="submit" value="Remove Cart" class="bg-info px-2 py-1 mx-1 border-0" 
            name="remove_cart">
          </td>
        </tr>
        <?php
         }} }
         else{
          echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
         }
         ?>
      </tbody>
    </table>
    <!-- subtotal -->
     <div class="d-flex mb-5">
      <?php
        $get_ip_address = getIPAddress();
        $cart_query="SELECT * FROM `cart_details` WHERE `ip_address`='$get_ip_address'";
        $result=mysqli_query($con,$cart_query);
        $result_count=mysqli_num_rows($result);
        if($result_count>0){
          echo"<h4 class='px-3'>Subtotal:<strong class='text-info'>$  $total_price </strong></h4>
             <input type='submit' value='Continue Shopping' class='bg-info px-5 py-2 mx-3 border-0' 
            name='continue_shopping'>
            <button class='bg-secondary px-3 py-2 border-0 text-light'> 
            <a href='users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
        }else{
          echo"<input type='submit' value='Continue Shopping' class='bg-info px-5 py-2 mx-3 border-0' 
            name='continue_shopping'>";
        }
        if(isset($_POST['continue_shopping'])){
          echo"<script>window.open('index.php','_self')</script>";
        }
      ?>
      
     </div>
     </div>
 </div>
</form>

  <!-- function to remove item -->

  <?php 
  function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="DELETE FROM `cart_details` WHERE `product_id`='$remove_id'";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
          echo"<script> window.open('cart.php','_self')</script>";
        }
      }
    }
  }
  echo $remove_item=remove_cart_item();
  ?>

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