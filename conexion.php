<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "terranoc_Terrano";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>