<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $names = $_POST['names'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO customers (names, contact_number, email, nationality) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $names, $contact_number, $email, $nationality);

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
