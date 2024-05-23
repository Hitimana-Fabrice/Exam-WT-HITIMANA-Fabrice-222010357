<?php
// Database connection parameters
// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $amenity_name = $_POST['amenity_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO amenities (amenity_name, description, category, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $amenity_name, $description , $category, $price);

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
