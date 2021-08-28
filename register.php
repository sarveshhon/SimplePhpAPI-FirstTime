<?php

    require 'connection.php';

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $qRegisterUser = "INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";

        $qCheckUserExist = "SELECT * FROM user WHERE email='$email'";
        
        $isUser = mysqli_query($connect,$qCheckUserExist);

        if(mysqli_num_rows($isUser)>0){

            $res['code'] = "409";
            $res['message'] = "User Already Exist";

        } else {

            $status = mysqli_query($connect,$qRegisterUser);

            if($status) {

                $res['code'] = "201";
                $res['message'] = "Registration Successful";

            } else {
                
                $res['code'] = "422";
                $res['message'] = "Registration Failed";
                
            }

        }


    }   else {

        $res['code'] = "301";
        $res['message'] = "Invalid Parameters";

    }

    
    echo json_encode($res);

?>