<?php

session_start();

include 'conn.php';
if(isset($_GET['token'])){
    $token=$_GET['token'];
    $conn = mysqli_connect("localhost","root","","shop_db1");
    $update="update users set status='active' where token='$token'";
    $qurey=mysqli_query($conn,$update);
    if($qurey){
        if(isset($_SESSION['msg']))
        {
            $_SESSION['msg']="account success";
            header('location: ./login.php');
        }
        else{
            $_SESSION['msg']="account unsuccess";
            header('location: ./login.php');
        }
    }else{
        $_SESSION['msg']="not updated";
        header('location: ./register.php');
    }
  }
?>