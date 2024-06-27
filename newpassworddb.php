<?php
    if(isset($_POST['submit']))
    {
        $email= $_POST['email'];
        $password= $_POST['password'];  
        $password = md5($password);
        $ip = $_SERVER['REMOTE_ADDR'];

        $conn = mysqli_connect("localhost","root","","shop_db1");

        $query1 = "select * from users where email='$email'";
        $record1 =mysqli_query($conn,$query1);

        $userdata = mysqli_fetch_array ($record1);
        $username = $userdata ['name'];
        $token = $userdata ['token'];

        $query = "update users set password='$password' where token='$token'";
        $record =mysqli_query($conn,$query);
        if($record == true)
        {
            echo "password change";
            include "login.php";
        }
        else
        {
            echo "Password does not change";
        }
        mysqli_close($conn);
    }

    else
    {
        header("Location: ./login.php");
    }


?>