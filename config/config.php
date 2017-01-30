<?php
    session_start();
    error_reporting(0);
    define('siteUrl', 'http://localhost/karsalaam');
    
    /*
     * DataBase Credentials
     */
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = 'lg';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>