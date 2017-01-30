<?php
    session_start();
    error_reporting(0);
    define('siteUrl', 'http://www.adglobal360.co.uk');
    
    /*
     * DataBase Credentials
     */
//    $db_username = "root";
//    $db_password = "admin";
//    $hostname = "localhost";
//    $db_name = 'lg';
//    
//    $conn = mysql_connect($hostname, $db_username, $db_password);
//    mysql_select_db($db_name);
    
    $servername = "localhost";
    $username = "karsalaamdev";
    $password = "karsalaam@2017";
    $db = 'karsalaam';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  
    
   // mysqli_select_db($con, $db);
    
?>
