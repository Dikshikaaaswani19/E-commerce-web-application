<?php

include 'config.php';
session_start();

if(isset($_POST['order_btn'])){

    header('location:main.php');
}
else{
    $message[] = 'Please Fill The Form...';
}
