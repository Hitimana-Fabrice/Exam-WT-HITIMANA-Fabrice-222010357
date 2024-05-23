<?php
// Database connection parameters
// Include database connection file
//<!-----HITIMANA FABRICE 222010357---->
require_once "dbconnect.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $amenity_id = $_POST['amenity_id'];
    $amenity_name = $_POST['amenity_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    

    // Update query
    $sql = "UPDATE amenities SET amenity_name='$amenity_name', description='$description', category='$category', price='$price' WHERE amenity_id='$amenity_id'";

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
 