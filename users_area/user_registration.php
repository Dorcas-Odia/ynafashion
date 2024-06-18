<?php include('../includes/connect.php');
include('../functions/common_function.php');?>

<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>user -registration</title>

      <link rel="stylesheet" href="../style.css">
      
      
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
<body>
    <div class="container-fluid my-1 mt-2">
        <h2 class="text-center mb-4">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_username" class="form-label">Username  </label>
                        <input type="text" id="user_username" class="form_control" 
                        placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                 <!-- email field -->
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_email" class="form-label">Email   </label>
                        <input type="email" id="user_email" class="form_control" 
                        placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                    </div>

                <!--  image field -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="user_image" class="form-label">User Image  </label>
                <input type="file" name="user_image" id="user_image" class="form_control"
                 required="required">
            </div>
                         <!-- Password field -->
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_password" class="form-label">User Password  </label>
                        <input type="password" id="user_password" class="form_control" 
                        placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                     <!-- confirm Password field -->
                     <div class="form-outline mb-2 w-50 m-auto">
                        <label for="confirm_user_password" class="form-label">Confirm Password  </label>
                        <input type="password" id="confirm_user_password" class="form_control" 
                        placeholder="confirm your password" autocomplete="off" required="required" name="confirm_user_password"/>
                    </div>

                 <!-- Address field -->
                 <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_address" class="form-label">Address   </label>
                        <input type="text" id="user_address" class="form_control" 
                        placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                    </div>

                    <!-- contact field -->
                 <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_contact" class="form-label">Contact   </label>
                        <input type="text" id="user_contact" class="form_control" 
                        placeholder="Enter your contact number" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="mt-3 pt-2">
                        <input type="submit" value="Register"class="bg-info px-3 py-2 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">already have an account ? <a href="user_login.php" 
                        class="text-danger"> login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

</body>
</html>
<!-- php code -->
 <?php 
 if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
   
    //select query
    $select_query="SELECT * FROM `user_table` WHERE `username`='$user_username' OR `user_email`='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if( $row_count>0){
        echo"<script>alert('Username and Email already exist')</script>";
    } else if( $user_password != $confirm_user_password){
        echo"<script>alert('Passwords do not match')</script>";
    }


    else{
            //insert query
    move_uploaded_file($user_image_tmp,"user_images/$user_image");

    $insert_query="INSERT INTO `user_table`( `username`, `user_email`, `user_password`, `user_image`, `user_ip`, 
    `user_address`, `user_mobile`) VALUES ('$user_username','$user_email','$hash_password',' $user_image','$user_ip','$user_address',$user_contact)";
     $sql_execute=mysqli_query($con,$insert_query);
    
}

// selecting cart items
$select_cart_items="SELECT * FROM `cart_details` WHERE  `ip_address`='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$row_count=mysqli_num_rows($result_cart);
if( $row_count>0){
    $_SESSION['username']= $user_username;
    echo"<script>alert('You have items in your card')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
}else{
    echo"<script>window.open('../index.php','_self')</script>";
}
}
 
 ?>