<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $room_id = $_POST['room_id'];
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $capacity = $_POST['capacity'];
    $price_per_night = $_POST['price_per_night'];
    $description = $_POST['description'];

    // Update query
    $sql = "UPDATE rooms SET room_number='$room_number', room_type='$room_type', capacity='$capacity', price_per_night='$price_per_night',description='$description' WHERE room_id='$room_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
