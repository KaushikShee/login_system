<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "users_login";

    $connect = mysqli_connect($server, $username, $password, $database);

    if(!$connect) echo "failed";
?>