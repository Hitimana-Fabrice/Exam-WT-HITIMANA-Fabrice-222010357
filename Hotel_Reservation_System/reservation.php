<?php
session_start();

// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_id = $_POST["customer_id"];
    $room_id = $_POST["room_id"];
    $check_in_date = $_POST["check_in_date"];
    $check_out_date = $_POST["check_out_date"]; // Note: You should hash check_out_dates for security

    // Validate form data (you may add more validation as needed)
    if (empty($customer_id) || empty($room_id) || empty($check_in_date) || empty($check_out_date)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Prepare SQL statement to insert data into the user table
        $sql = "INSERT INTO reservation (customer_id, room_id,check_in_date, check_out_date) VALUES (?,?, ?,?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssss",$customer_id,$room_id, $check_in_date, $check_out_date);

            // Execute the statement
            if ($stmt->execute()) {
                // Data inserted successfully
                echo "reservation registered successfully.";
            } else {
                // Handle execution error
                echo "Error: " . $conn->error;
            }

            // Close statement
            $stmt->close();
        } else {
            // Handle statement preparation error
            echo "Error preparing statement: " . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>
