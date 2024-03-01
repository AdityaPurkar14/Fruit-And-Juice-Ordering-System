<!--Connect File -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>





<html>
    <head>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>fruits and juice-Cart Details</title>
    <!--bootstrap CSSlink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
 <!-- font awsomw cdn using content delivery Network --> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- css file -->
 <link rel="stylesheet" href="style.css">
 <style>
  .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
  }
 </style>
</head>
 <body>
    <!-- nav bar --> 
    <div class="container-fluid p-0">
      <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./admin_area/product_images/logo.jpeg" alt="" class="logo"/>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
          cart_item();?></sup></a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>
<!--Second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
  </li>
  <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
  </ul>
</nav>
<!--thrid child-->
<div class="bg-light"><!-- grey colored display-->
  <h3 class="text-center">MH-15 Fruits & Juice Center</h3>
  <p class="text-center">Love your Body,Feel your Soul,Drink your Juice!</p>
</div>


<!-- fourth child -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
            <tbody>
              <!-- php code to display dynamic data-->
                <?php
                
                $get_ip_add = getIPAddress();
                $total_price=0;
                $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo "<thead>
                  <tr>
                      <th>Product_title</th>
                      <th>Product_image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operations</th>
                  </tr>
              </thead>";

                
                while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="Select * from `products` where product_id='$product_id'";
                  $result_products=mysqli_query($con,$select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
              
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
      
                ?>
                

                <tr>
                    <td><?php
                      echo $product_title;
                    ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1;?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    
                    <?php
                      
                      $get_ip_add = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add' ";
                        $rest=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantities;
                      }

                    
                    ?>




                    <td><?php echo $price_table;?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id;?>"></td>
                    <td>
                      <!--<button for update-->
                      <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                      <!--<button for remove-->
                      <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">


                    </td>
                </tr>

                <?php
                }
                  
              }
            }
            else{
              echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
            }
              ?>   <!-- that multiple item should be present in database because we closing 2 curly bracket -->
            </tbody>
        </table>
        <!-- subtotal-->
        <div class="d-flex mb-5">
          <?php
          $get_ip_add = getIPAddress();
          
          $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
            <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
          }else{
            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          
          ?>
          
            
        </div>
    </div>
</div>
</form>


<!-- function to remove item-->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo  $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();

?>

<!-- last child-->
<!--include footer footer to here-->
<?php
include('./includes/footer.php');
?>

</div>




    <!-- boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>