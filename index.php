<!--Connect File -->
<?php
include('includes/connect.php');
include('functions/common_function.php');

?>


<html>
    <head>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Fruits & Juices shopping system(website)</title>
    <!--bootstrap CSSlink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
 <!-- font awsome cdn using content delivery Network --> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- css file -->
 <link rel="stylesheet" href="style.css">
</head>
 <body>
    <!-- nav bar --> 
    <div class="container-fluid p-0">
      <!-- first page home,register,etc -->
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
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:-<?php total_cart_price(); ?> /-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
    
     <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!--calling cart function-->
<?php
cart();
?>
<!--welcome and login-->
<nav class="navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me auto">
  <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li>
</nav>

<!--store name-->
<div class="bg-light">
  <h3 class="text-center">MH-15 Fruits & Juice Center</h3>
  <p class="text-center">Love your Body,Feel your Soul,Drink your Juice!</p>
</div>

<!--cards-->
<div class="row px-3">
<div class="col-md-10">
<!--products to be displayed-->
<div class="row">
  <!--fetching products-->
       
         <?php
         //calling function
         getproducts();
             get_unique_categories();
             get_unique_brands();
           //  $ip = getIPAddress();  
           //  echo 'User Real IP Address - '.$ip; 

         ?>

<!--row end-->
</div>
<!--col end-->
</div>
<!--brands to br displayed-->
<div class="col md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="a" class="nav-link text-light"><h4>Delivery Brands</h4></a>
    </li>
   <?php
   //calling brands
    getbrands();
   ?>

  </ul>
  <!--categories-->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="a" class="nav-link text-light"><h4>Categories</h4></a>
    </li>
    <?php
      //calling the categories
      getcategories();
   ?>
  </ul>
</div>
</div>
<!--include footer-->
<?php
include('./includes/footer.php');
?>
</div>

    <!-- boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>