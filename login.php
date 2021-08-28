<?php

    require 'connection.php';

    if(isset($_POST['email']) && isset($_POST['password'])) {
        
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $qCheckEmail = "SELECT * FROM user WHERE email='$email'";

        $qCheckPassword = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        
        $statusUser = mysqli_query($connect,$qCheckEmail);

        $statusPassword = mysqli_query($connect,$qCheckPassword);

        if(mysqli_num_rows($statusUser) > 0) {

            if(mysqli_num_rows($statusPassword) > 0 ) {

                $res['code'] = "202";
                $res['message'] = "Login Successfull";
                
            } else {
    
                $res['code'] = "400";
                $res['message'] = "Wrong Password";
                
            }
            
        } else {
    
            $res['code'] = "404";
            $res['message'] = "User Not Found";
            
        }
        

    } else {
        
        $res['code'] = "301";
        $res['message'] = "Invalid Parameters";

    }

    echo json_encode($res);

?>