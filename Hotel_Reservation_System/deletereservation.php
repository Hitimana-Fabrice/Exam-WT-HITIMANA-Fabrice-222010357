<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reservation_id'])) {
    // Sanitize the input
    $reservation_id = $conn->real_escape_string($_POST['reservation_id']);

    // Delete query
    $sql = "DELETE FROM reservation WHERE reservation_id='$reservation_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method or reservation_id is not set, redirect or show an error message
    echo "Invalid request.";
}
?>
