<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>Admin Dashboard</title>

      <link rel="stylesheet" href="./style.css">
      
      
      <!--Bootstrap CSS link-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet" 
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous">
    <style>
        .Admin_image{
    width: 100px;
    object-fit: contain;
}
    </style>
     <!-- font awesome link-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" 
          referrerpolicy="no-referrer"/>
 
    </head>
    <body>
      <!-- navbar -->
      <div class="container-fluid p-0 ">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                    <img src="images/logo.png (2).png" alt="" width="150px">
                    <nav class="navbar navbar-expand-lg navbar-light bg-info">
                        <ul class="navbar-nav">
                            <li class="nav-items">
                                <a href="#" class="nav-link">Welcome Guest</a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </nav>
         <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center" p-2>Manage Details</h3>
         </div>
         <!-- third child -->
         <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href=""> <img src="../images/Adminimage.PNG" alt="" class="Admin_image"></a>
                    <p class="text-light text-center"> Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1 border-0">Insert Product</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">View Product</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 border-0">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 border-0">Insert brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">View brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">list users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 border-0">logouts</a></button>
                </div>
            </div>
         </div>
      </div>

<!-- forth child -->
<div class="container my-3">
    <?php 
    
    if (isset($_GET['insert_category'])) 
    {
        include('insert_categories.php');
    }
    if (isset($_GET['insert_brand'])) 
    {
        include('insert_brands.php');
    }
    ?>
</div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous"></script>
</body>
</html>