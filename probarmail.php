<?php
$servername = "127.0.0.1";
$username = "terranoc_mateo";
$password = "3647033";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
{
echo "cohesion OK";
}
?>