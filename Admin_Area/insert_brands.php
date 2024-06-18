<?php
   include('../includes/connect.php');
   if(isset($_POST['Insert_brand'])){
        $brand_title=$_POST['brand_title'];
        //SELECT DATA FROM DATABASE
        $select_query="SELECT* FROM `brands` WHERE `brand_title`='$brand_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if ($number>0){
            echo"<script>alert('this brand is present inside the database')</script>";
        } else{
        $insert_query="INSERT INTO brands(brand_title) VALUES ('$brand_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
           echo "<script>alert('brand has been inserted Successfully')</script>";
        }
       }
    }
   ?>
<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2 flex-nowrap">
  <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" 
  aria-label="brands" aria-describedby="addon-wrapping">
</div>

<div class="input-group  w-10 mb-2 flex-nowrap m-auto">
 <input type="submit" class="bg-info border-0 p-2 my-3" name="Insert_brand" value="Insert Brands" >
</div>
</form>