<?php 
$host = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'reg_sys';
// Create connection
$conn = new mysqli($host, $user_name, $password, $db_name);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }else{
//     echo "Connected successfully";
// }