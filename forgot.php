
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="./bootstrap-4.6.1/dist/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<div class="form-container">

   <form action="forgotdb.php" method="post">
      <h3>Forgot Password</h3>
      <input type="email" name="email" placeholder="Enter Your Email" required class="box">
      <span class="text-success">Link will be send on this Email</span><br>
      <input type="submit" name="submit" value="Generate New Password" class="btn">
      <!-- <p>Go to Login Page!! <a href="login.php">Login </a></p> -->
   </form>

</div>
    
</body>
</html>