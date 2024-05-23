<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $names = $_POST['names'];
    $position = $_POST['position'];
    $contact_number = $_POST['contact_number'];
    $hire_date = $_POST['hire_date'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO staff (names,position, contact_number,hire_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $names, $position, $contact_number, $hire_date);

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
