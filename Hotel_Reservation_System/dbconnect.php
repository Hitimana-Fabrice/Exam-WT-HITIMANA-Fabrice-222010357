<?php
//<!-----HITIMANA FABRICE 222010357---->
$servername = "localhost";
$username = "Fabrice";
$password = "Fabrice@123";
$dbname = "hotel_reservation_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
