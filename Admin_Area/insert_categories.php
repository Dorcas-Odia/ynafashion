<?php
   include('../includes/connect.php');
   if(isset($_POST['Insert_cat'])){
        $category_title=$_POST['Cat_title'];
        //SELECT DATA FROM DATABASE
        $select_query="SELECT* FROM `categories` WHERE `category_title`='$category_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if ($number>0){
            echo"<script>alert('this categoty is present inside the database')</script>";
        } else{
        $insert_query="INSERT INTO categories(category_title) VALUES ('$category_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
           echo "<script>alert('Category has been inserted Successfully')</script>";
        }
       }
    }
   ?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2 flex-nowrap">
  <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="Cat_title" placeholder="Insert Categories" 
  aria-label="categories" aria-describedby="addon-wrapping">
</div>

<div class="input-group  w-10 mb-2 flex-nowrap m-auto">
 <input type="submit" class="bg-info border-0 p-2 my-3" name="Insert_cat" value="Insert Categories" > 
 
</div>
</form>