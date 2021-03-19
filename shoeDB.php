<?php
    $servername = "localhost";
    $username = "X32195986";
    $password = "X32195986";
    $dbname = "X32195986";

    //Create connection
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }
?>