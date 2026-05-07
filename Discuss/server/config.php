<?php 
    $host = "localhost";
    $username = "root";
    $password = 1234;

    $conn = new PDO("mysql:host=$host; dbname=discuss", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>