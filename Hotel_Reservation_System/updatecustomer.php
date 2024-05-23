<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $customer_id = $_POST['customer_id'];
    $names = $_POST['names'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];

    // Update query
    $sql = "UPDATE customers SET names='$names', contact_number='$contact_number', email='$email', nationality='$nationality' WHERE customer_id='$customer_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
