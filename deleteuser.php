<?php

    require 'connection.php';

    if(isset($_REQUEST['id']) && isset($_POST['password'])){

        $id = $_REQUEST['id'];
        $password = md5($_POST['password']);

        $qDeleteUser = "DELETE FROM user WHERE id='$id'";
        
        $status = mysqli_query($connect,$qDeleteUser);

        if($status) {

            $res['code'] = '201';
            $res['message'] = 'Deleted Successfully';

        } else {
    
            $res['code'] = '422';
            $res['message'] = 'Deletion Failed';

        }

    } else {

        $res['code'] = "301";
        $res['message'] = "Invalid Parameters";
        
    }


    echo json_encode($res);


?>