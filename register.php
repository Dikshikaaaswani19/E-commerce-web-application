<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $user_type = $_POST['user_type'];
   $token=bin2hex(random_bytes(15));

   // $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   // if(mysqli_num_rows($select_users) > 0){
   //    $message[] = 'user already exist!';
   // }else{
      $qurey="INSERT INTO `users`(name, email, password, user_type,token,status) VALUES('$name', '$email', '$pass', '$user_type' ,'$token','inactive')";

      if(mysqli_query($conn,$qurey)==true)
      {
         $message[] = 'registered successfully!';
         $subject = "Email Varification For login To our site";
         $body = "Hi, $name. click Here To activate your account http://localhost:8081/CA323/activate.php?token=$token";
         $headers = "From: 20bca105@charusat.edu.in";

        if (mail($email, $subject, $body, $headers)) {
            session_start();
            $_SESSION['msg']="check your mail $email";
            header("Location: ./login.php");
        
        } else {
            echo "Email sending failed...";
        }
         // header('location:login.php');
      }
   }

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Your Self</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <script>


   </script>
   
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

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" placeholder="Enter Your Name" required class="box">
      <input type="email" name="email" placeholder="Enter Your E-mail" required class="box">
      <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="enter your password" required class="box">
      <select name="user_type" class="box">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>Already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>