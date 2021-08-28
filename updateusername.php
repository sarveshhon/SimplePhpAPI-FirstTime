<?php

    require 'connection.php';

    if(isset($_REQUEST['id']) && isset($_POST['name']) && isset($_POST['password'])) {
        $id = $_REQUEST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        $qUpdate = "UPDATE user SET name='$name' WHERE id='$id'";

        $qCheckIdExists = "SELECT * FROM user WHERE id='$id'";

        $result = mysqli_query($connect,$qUpdate);

        $status = mysqli_query($connect,$qCheckIdExists);

        if(mysqli_num_rows($status) > 0) {

            if($result > 0) {

                $res['code'] = '201';
                $res['message'] = 'Updated Successfully';
    
            } else {
    
                $res['code'] = '422';
                $res['message'] = 'Updated Failed';
    
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