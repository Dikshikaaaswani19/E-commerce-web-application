<?php

// echo "Hello";

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
       <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style1.css">
</head>

<body>
<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
      <a href="home.php" class="logo">   <img src="./images/trinity-logo.png" height="80px" width="150px" alt="logo" class="logo" >  </a>

         <nav class="navbar">
            <a href="home.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="shop.php">SHOP</a>
            <a href="contact.php">CONTACT</a>
            <a href="orders.php">ORDERS</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>
<section class="products">
<?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         mysqli_num_rows($select_products);
         $row = mysqli_fetch_array($select_products);

      ?>
   <!-- <h1 class="title"><?php echo $row['name']; ?></h1> -->
   <div class="box-container">
      <?php
         $id = $_GET['id']; 
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where id='$id' ") or die('query failed');
         $row = mysqli_fetch_array($select_products);
      ?>
         <img src="<?php echo "uploaded_img/".$row['image']; ?>" class="border-5 img-thumbnail "  alt='Product $id'  >";
      <?php
         // echo $row['name'] ."<br> <br>"; 

         echo '
			<div class="container">
				<h1>'.$row['name'].' </h1>
				<div class="row">
					
					<div class="col-md">
               <br>
               <br>
						<h4>'.$row['details'].'</h4>
					</div>
              
				</div>
            <div class="col-md">
            <br>
            <br>
               <h3>RS. '.$row['price'].'</h3>
            </div>
			</div>
			';
         // echo $row['details'] ."<br>";
         mysqli_close($conn);

      ?>

    
    </div>
</section>
<?php include 'footer.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
