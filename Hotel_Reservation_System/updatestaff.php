<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $staff_id = $_POST['staff_id'];
   $names = $_POST['names'];
    $position = $_POST['position'];
    $contact_number = $_POST['contact_number'];
    $hire_date = $_POST['hire_date'];

    // Update query
    $sql = "UPDATE staff SET names='$names',position='$position', contact_number='$contact_number',  hire_date='$hire_date' WHERE staff_id='$staff_id'";

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
