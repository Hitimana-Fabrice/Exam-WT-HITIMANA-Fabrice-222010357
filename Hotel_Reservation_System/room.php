<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $capacity = $_POST['capacity'];
    $price_per_night = $_POST['price_per_night'];
    $description = $_POST['description'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO rooms (room_number, room_type, capacity, price_per_night,description) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss",$room_number, $room_type, $capacity, $price_per_night,$description);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
