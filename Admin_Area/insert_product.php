<?php 

   include('../includes/connect.php');

   if(isset($_POST['insert_product'])){
      $product_title=$_POST['product_title'];
      $product_description=$_POST['product_description'];
      $product_keywords=$_POST['product_keywords'];
      $product_category=$_POST['product_category'];
      $product_price=$_POST['product_price'];
      $product_status='true';
      // accesing images
      $product_image1=$_FILES['product_image1']['name'];
      $product_image2=$_FILES['product_image2']['name'];
      $product_image3=$_FILES['product_image3']['name'];

      //accessing images tmp name
      $temp_image1=$_FILES['product_image1']['tmp_name'];
      $temp_image2=$_FILES['product_image2']['tmp_name'];
      $temp_image3=$_FILES['product_image3']['tmp_name'];

      // checking empty condition
      if ($product_title=='' or $product_description=='' or $product_keywords==''or 
      $product_category=='' or $product_price='' or $product_image1=='' or
       $product_image2=='' or $product_image3=='' ){
                 echo"<script>alert('Please fill the available fields')</script>";
        exit();}
        else{
            move_uploaded_file($temp_image1,"product_images/$product_image1");
            move_uploaded_file($temp_image2,"product_images/$product_image2");
            move_uploaded_file($temp_image3,"product_images/$product_image3");

            // insert query
            $insert_products="INSERT INTO `products`(`product_title`, `product_description`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')"; 
            //"INSERT INTO products (product_title, product_description, product_keywords,category_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', $product_description','$product_keywords','$product_category','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";                
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo"<script>alert(successfully inserted the products)</script>";
            }
        }
   }
?>

<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>Insert Products-Admin Dashboard</title>

      <link rel="stylesheet" href="./style.css">
      
      
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
    
</head>
 <body class="bg-light">
    <div class="container mt-3 bg-info">
        <h1 class="text-center">Insert Products</h1>
        <!-- form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form_control" 
                placeholder="Enter product title" 
                autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form_control"
                 placeholder="Enter product description" 
                autocomplete="off" required="required">
            </div>

            <!--  keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form_control"
                 placeholder="Enter product keywords" 
                autocomplete="off" required="required">
            </div>

            <!--  categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query="SELECT* FROM categories";
                        $result_query=mysqli_query($con,$select_query);
                        while ($row=mysqli_fetch_assoc($result_query)) {
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo"<option value='$category_id'>$category_title</option>";
                        }
                    
                    ?>
                    
                </select>
            </div>
            <!--  image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form_control"
                 required="required">
            </div>

            <!--  image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form_control"
                 required="required">
            </div>
            <!--  image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form_control"
                 required="required">
            </div>

             <!--  Prices -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form_control"
                 placeholder="Enter Product Price" 
                autocomplete="off" required="required">
            </div>

            <!--  Prices -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-light mb-3 px-3"
                 value="Insert Product">
            </div>
        </form>
    </div>

</body>
</html>