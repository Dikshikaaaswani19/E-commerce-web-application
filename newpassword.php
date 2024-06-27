<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

   <form action="newpassworddb.php" method="post">
      <h3>New Password</h3>
     

      <input type="email" name="email" placeholder="Enter Email" required class="box"><br>
      <input type="password" name="password" placeholder="Enter New Password" required class="box"/>
      <input type="submit" name="submit" value="Change Password"  class="btn" />
      <!-- <p>don't have an account? <a href="login.php">login now</a></p> -->
      
   </form>

</div>
</body>
