
<?php include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UFT-8">
      <meta http-equiv="X-UA-Compatible" content="EI=edge">
      <meta name="viewport" content="width= device-width, initial-scale=1.0">
      <title>Payment page</title>

      <link rel="stylesheet" href="../style.css">
      
       <!--Bootstrap CSS link-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet" 
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous">
      
      
      
    </head>
    <style>
        .payment_img{
            width:90%;
            margin:auto;
            display:block;
        }
    </style>

<body>
    <!-- php code to access user id -->
     <?php
     
     $user_ip=getIPAddress();
     $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
     $result=mysqli_query($con, $get_user);
     $run_query=mysqli_fetch_array($result);
     $user_id=$run_query['user_id'];

     
     ?>
   <div class="container">
    <h2 class="text-center text-info">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-6">
           <a href="https://www.paypal.com" target="_blank"><img class="payment_img"src="../images/paypal.PNG" alt=""></a>
        </div>
        <div class="col-md-6">
           <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
        </div>
        
    </div>
   </div>
</body>
</html>