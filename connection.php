<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mydb';

    $connect = mysqli_connect($hostname,$username,$password,$database);

    // if($connect) {
    //     echo 'Connection Sucessful';
    // } else {
    //     echo 'Connection Failed!';
    // }

?>