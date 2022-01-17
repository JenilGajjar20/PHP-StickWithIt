<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'stickwithit(foodapp)';

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check if connection is not successfully
    if(!$conn){
        die("<script>alert('Connection failed.')</script>");
    }
?>