<?php
session_start();
//<!-----HITIMANA FABRICE 222010357---->
// Include database connection file
require_once "dbconnect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_id = $_POST["customer_id"];
    $check_in_date = $_POST["check_in_date"];
    $check_out_date = $_POST["check_out_date"]; // Note: You should hash check_out_dates for security
    $total_cost = $_POST["total_cost"];
    $guest_number = $_POST["guest_number"];

    // Validate form data (you may add more validation as needed)
    if (empty($customer_id) || empty($check_in_date) || empty($check_out_date) || empty($total_cost) || empty($guest_number)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Prepare SQL statement to insert data into the user table
        $sql = "INSERT INTO housebooking (customer_id,check_in_date, check_out_date, total_cost, guest_number) VALUES (?,?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("sssss",$customer_id, $check_in_date, $check_out_date, $total_cost, $guest_number);

            // Execute the statement
            if ($stmt->execute()) {
                // Data inserted successfully
                echo "User registered successfully.";
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
