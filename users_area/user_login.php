<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
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
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3 mt-5">
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-2">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="user_username" class="form-label">Username  </label>
                        <input type="text" id="user_username" class="form_control" 
                        placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                 

                    <!-- Password field -->
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="user_password" class="form-label">User Password  </label>
                        <input type="password" id="user_password" class="form_control" 
                        placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login"class="bg-info px-3 py-2 border-0" 
                        name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">You do not have an account ? <a href="user_registration.php" 
                        class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="SELECT * FROM `user_table` WHERE `username`='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

  //cart items
  $select_query_cart="SELECT * FROM `cart_details` WHERE `ip_address`='$user_ip'";
  $select_cart=mysqli_query($con,$select_query_cart);
  $row_count_cart=mysqli_num_rows( $select_cart);
    if($row_count>0){
        $_SESSION['username']= $user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo"<script>alert('You have login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']= $user_username;
                echo"<script>alert('You have login successful')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']= $user_username;
                echo"<script>alert('You have login successful')</script>";
                echo"<script>window.open('payment.php','_self')</script>";
            }
        } else{
            echo"<script>alert('Invalid credentials')</script>";
        }

    }else{
        echo"<script>alert('Invalid credentials')</script>";
    }
}

?>