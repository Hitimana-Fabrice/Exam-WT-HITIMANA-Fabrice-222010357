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
    $rating = $_POST["rating"];
    $review_text = $_POST["review_text"]; // Note: You should hash review_texts for security

    // Validate form data (you may add more validation as needed)
    if (empty($customer_id) || empty($room_id) || empty($rating) || empty($review_text)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Prepare SQL statement to insert data into the user table
        $sql = "INSERT INTO reviews (customer_id, room_id,rating, review_text) VALUES (?,?, ?,?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssss",$customer_id,$room_id, $rating, $review_text);

            // Execute the statement
            if ($stmt->execute()) {
                // Data inserted successfully
                echo "reviews registered successfully.";
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
