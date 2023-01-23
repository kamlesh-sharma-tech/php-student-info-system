<?php
    session_start();
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "crud_operation_db";

    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

    if(!$con){
        die("Connection Failed".mysqli_connect_error());
    }
    //else{
    //     echo 'connected';
    // }

?>