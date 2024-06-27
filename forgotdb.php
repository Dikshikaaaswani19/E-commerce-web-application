<?php

    if(isset($_POST['submit']))
    {
        
        $email= $_POST['email'];

        $conn = mysqli_connect("localhost","root","","shop_db1");
        
            $query = "select * from users where email='$email'";
            $record =mysqli_query($conn,$query);
            $emailcount = mysqli_num_rows($record);
            
            if($emailcount)
            {
                $userdata = mysqli_fetch_array ($record);
                $username = $userdata ['name'];
                $token = $userdata ['token'];

                $subject = "Reset password through PHP";
                $body= "Hi, $username . Click here to reset your account password http://localhost:800/CA323/newpassword.php?token=$token";
                $headers = "From: 20bca105@charusat.edu.in";

                if(mail($email, $subject, $body, $headers)) 
                {
                    print_r( "Email successfully sent to $email ...");
                    //$_SESSION['msg']="check your mail to reset your account password $email";
                    $message[] = 'check your mail to reset your account password';
                    header("Location: ./login.php");
                }
                else
                {
                    echo "Email sending failed...";
                }
            }
            else
            {
                echo "<h1> Record Not Found</h1>";
            } 
        
        mysqli_close($conn);
    }
    //}
    else
    {
        header("Location: ./login.php");
    }
    
?>