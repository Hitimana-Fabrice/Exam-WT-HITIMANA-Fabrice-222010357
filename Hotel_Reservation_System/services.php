<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO services (service_name, description, price, availability) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $service_name, $description, $price, $availability);

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
