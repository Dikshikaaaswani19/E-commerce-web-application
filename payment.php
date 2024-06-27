<?php
 include  'db.php';
 if(isset($_POST['pay_id']) && isset($_POST['amount']) && isset($_POST['name'])){
    $pay_id=$_POST['pay_id'];
    $amount=$_POST['amount'];
    $name=$_POST['name'];
    $status="ok";

    echo "Hello";
    //$query="insert into razorpay('name','amount','pay_id','status') values('$name','$amount','$pay_id','$status')";
   // $query="insert into razorpay(``,`amount`,`pay_id`,`status`) values(`$name`,`$amount`,`$pay_id`,`$status`)";
  
  //  $query="INSERT INTO razorpay values (NULL'$name','$amount','$pay_id','Success',NULL)";
    // mysqli_query($conn,$query);
 }
 else{
   echo "sorry";
 }
?>  