<?php
// Database connection parameters
// Include database connection file
//v
require_once "dbconnect.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $review_id = $_POST['review_id'];
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    // Update query
    $sql = "UPDATE reviews SET customer_id='$customer_id', room_id='$room_id', rating='$rating', review_text='$review_text' WHERE review_id='$review_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " .$conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
 