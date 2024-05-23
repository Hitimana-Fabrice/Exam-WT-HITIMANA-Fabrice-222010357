<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $reservation_id = $_POST["reservation_id"]; 
    $payment_method = $_POST["payment_method"];
    $payment_amount = $_POST["payment_amount"]; 
    $payment_date = $_POST["payment_date"];

    // Prepare and bind parameters
    $sql = "INSERT INTO payment (reservation_id, payment_method, payment_amount, payment_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $reservation_id, $payment_method, $payment_amount, $payment_date);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

// Close connection
$conn->close();
?>
