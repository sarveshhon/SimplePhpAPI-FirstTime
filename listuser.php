<?php

    require 'connection.php';

    $qList = "SELECT name,email,password FROM user ORDER BY datetime DESC";
    
    $status = mysqli_query($connect,$qList);

    while( $row = mysqli_fetch_array($status, MYSQLI_ASSOC)) {
        $res['user'][] = $row;
    }

    echo json_encode($res);


?>